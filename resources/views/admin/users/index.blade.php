@extends('layouts.admin')

@section('title', 'Listagem de Usuários')

@section('content')
<div class="bg-slate-800 shadow-md rounded-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Usuários</h1>
        <a href="{{ route('admin.users.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Novo Usuário
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-slate-700 rounded-lg">
            <thead>
                <tr class="text-left text-gray-200 bg-slate-600">
                    <th class="px-6 py-3">Nome</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Criado em</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-600">
                @foreach($users as $user)
                <tr class="text-gray-200 hover:bg-slate-600">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td class="px-6 py-4">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                           class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded">
                            Editar
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                    onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection