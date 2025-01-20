@extends('layouts.admin')

@section('title', 'Detalhes da Mensagem')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-700">
                    <div class="mb-6">
                        <a href="{{ route('admin.mensagens.index') }}" 
                           class="text-blue-400 hover:text-blue-300">
                            ← Voltar para lista
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-300 mb-2">Informações do Remetente</h3>
                            <p><strong>Nome:</strong> {{ $mensagem->nome }}</p>
                            <p><strong>Email:</strong> {{ $mensagem->email }}</p>
                            <p><strong>Data:</strong> {{ $mensagem->created_at ? $mensagem->created_at->format('d/m/Y H:i') : 'Data não disponível' }}</p>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium text-gray-300 mb-2">Informações do Presente</h3>
                            <p><strong>Presente:</strong> {{ $mensagem->product ? $mensagem->product->name : 'Produto não disponível' }}</p>
                            <p><strong>Quantidade de Cotas:</strong> {{ $mensagem->quantidade_cotas }}</p>
                            <p><strong>Status Pagamento:</strong> 
                                @if($mensagem->payment_intent_id)
                                    <span class="text-green-400">Pago</span>
                                @else
                                    <span class="text-red-400">Pendente</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-300 mb-2">Mensagem</h3>
                        <div class="bg-slate-700 p-4 rounded-lg">
                            {{ $mensagem->mensagem }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection