@extends('layouts.admin')

@section('title', 'Produtos')

@section('content')
<div class="bg-slate-800 shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Produtos</h1>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Novo Produto
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-slate-700 rounded-lg">
            <thead>
                <tr class="text-left text-gray-200 bg-slate-600">
                    <th class="px-6 py-3">Imagem</th>
                    <th class="px-6 py-3">Nome</th>
                    <th class="px-6 py-3">Preço</th>
                    <th class="px-6 py-3">Cotas</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-600">
                @foreach($products as $product)
                <tr class="text-gray-200 hover:bg-slate-600">
                    <td class="px-6 py-4">
                        @if($product->image_path)
                            <img src="{{ Storage::url($product->image_path) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-16 h-16 object-cover rounded">
                        @else
                            <div class="w-16 h-16 bg-slate-500 rounded flex items-center justify-center">
                                <span class="text-gray-400">Sem imagem</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div>{{ $product->name }}</div>
                        <div class="text-sm text-gray-400">{{ Str::limit($product->description, 50) }}</div>
                    </td>
                    <td class="px-6 py-4">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $product->quota }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" 
                           class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded">
                            Editar
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection