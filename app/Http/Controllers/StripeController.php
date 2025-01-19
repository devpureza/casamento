<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
            \Illuminate\Support\Facades\Log::info('Iniciando checkout Stripe', [
                'produto_id' => $product->id,
                'quantidade' => $request->quantidade_cotas
            ]);
            
            $quantidade = $request->quantidade_cotas ?? 1;
            $valorTotal = $product->price * $quantidade;

            if ($product->quota < $quantidade) {
                return response()->json(['error' => 'Quantidade de cotas indisponível'], 400);
            }

            \Illuminate\Support\Facades\Log::info('Dados do checkout', [
                'produto' => $product->toArray(),
                'valor_total' => $valorTotal,
                'quantidade' => $quantidade
            ]);

            // Define os métodos de pagamento disponíveis
            $payment_methods = [
                'card',          // Cartão de crédito/débito padrão
                // 'apple_pay',     // Apple Pay
                // 'google_pay'     // Google Pay (no Stripe é chamado de 'payment_method_types' => ['card'] com wallet habilitado)
            ];

            $session = Session::create([
                'payment_method_types' => $payment_methods,
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'brl',
                        'unit_amount' => (int)($valorTotal * 100), // Stripe usa centavos
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