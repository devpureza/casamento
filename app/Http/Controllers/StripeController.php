<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Mensagem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function checkout(Request $request, Product $product)
    {
        try {
            // Log para debug
            \Illuminate\Support\Facades\Log::info('Dados recebidos:', $request->all());

            // Validar os dados recebidos
            $validated = $request->validate([
                'quantidade_cotas' => 'required|integer|min:1',
                'nome' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'mensagem' => 'required|string'
            ]);

            \Illuminate\Support\Facades\Log::info('Dados validados:', $validated);
            
            \Illuminate\Support\Facades\Log::info('Iniciando checkout Stripe', [
                'produto_id' => $product->id,
                'quantidade' => $request->quantidade_cotas,
                'nome' => $request->nome,
                'email' => $request->email
            ]);
            
            $quantidade = $request->quantidade_cotas ?? 1;
            $valorTotal = $product->price * $quantidade;

            if ($product->quota < $quantidade) {
                return response()->json(['error' => 'Quantidade de cotas indisponível'], 400);
            }

            // Criar a mensagem no banco
            $mensagem = Mensagem::create([
                'product_id' => $product->id,
                'nome' => $request->nome,
                'email' => $request->email,
                'mensagem' => $request->mensagem,
                'quantidade_cotas' => $quantidade
            ]);

            // Define os métodos de pagamento disponíveis
            $payment_methods = ['card'];

            $session = Session::create([
                'payment_method_types' => $payment_methods,
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'brl',
                        'unit_amount' => (int)($valorTotal * 100),
                        'product_data' => [
                            'name' => $product->name,
                            'description' => "Cota para presente de casamento - {$product->name}",
                            'images' => [$product->image_path ? url(Storage::url($product->image_path)) : null],
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'locale' => 'pt-BR',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel'),
                'metadata' => [
                    'product_id' => $product->id,
                    'quantidade_cotas' => $quantidade,
                    'mensagem_id' => $mensagem->id
                ],
            ]);

            return response()->json(['url' => $session->url]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Erro no checkout Stripe: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error($e->getTraceAsString());
            
            return response()->json(['error' => 'Erro na criação do checkout'], 500);
        }
    }

    public function success(Request $request)
    {
        try {
            $session = Session::retrieve($request->session_id);
            
            $product = Product::find($session->metadata->product_id);
            $product->quota -= $session->metadata->quantidade_cotas;
            $product->save();

            // Atualizar a mensagem com o ID da sessão
            if (isset($session->metadata->mensagem_id)) {
                $mensagem = Mensagem::find($session->metadata->mensagem_id);
                if ($mensagem) {
                    $mensagem->payment_intent_id = $session->payment_intent;
                    $mensagem->save();
                }
            }

            return view('checkout.success');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Erro ao processar pagamento.');
        }
    }

    public function cancel()
    {
        return redirect('/')->with('error', 'Pagamento cancelado.');
    }
}