@extends('layouts.admin')

@section('title', 'Editar Produto')

@section('content')
<div class="bg-slate-800 shadow-md rounded-lg p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Editar Produto</h1>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="space-y-4">
            <div>
                <label for="name" class="block text-gray-200 mb-2">Nome do Produto</label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name', $product->name) }}"
                       class="w-full bg-slate-700 text-white border border-slate-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                       required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-gray-200 mb-2">Descrição</label>
                <textarea name="description" 
                          id="description" 
                          rows="3"
                          class="w-full bg-slate-700 text-white border border-slate-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                          required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="price" class="block text-gray-200 mb-2">Preço (R$)</label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           value="{{ old('price', $product->price) }}"
                           step="0.01"
                           min="0"
                           class="w-full bg-slate-700 text-white border border-slate-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                           required>
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="quota" class="block text-gray-200 mb-2">Cotas</label>
                    <input type="number" 
                           name="quota" 
                           id="quota" 
                           value="{{ old('quota', $product->quota) }}"
                           min="0"
                           class="w-full bg-slate-700 text-white border border-slate-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                           required>
                    @error('quota')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="image" class="block text-gray-200 mb-2">Imagem</label>
                @if($product->image_path)
                    <div class="mb-2">
                        <img src="{{ Storage::url($product->image_path) }}" 
                             alt="{{ $product->name }}" 
                             class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" 
                       name="image" 
                       id="image"
                       accept="image/*"
                       class="w-full bg-slate-700 text-white border border-slate-600 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                <p class="text-gray-400 text-sm mt-1">Deixe em branco para manter a imagem atual</p>
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end space-x-3">
            <a href="{{ route('admin.products.index') }}" 
               class="bg-slate-600 hover:bg-slate-700 text-white px-4 py-2 rounded">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Atualizar
            </button>
        </div>
    </form>
</div>
@endsection