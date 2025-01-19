@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="px-4 py-6 sm:px-0">
    <div class="border-4 border-dashed border-gray-200 rounded-lg h-96 p-4">
        <h1 class="text-2xl font-bold text-white">Bem-vindo ao Dashboard</h1>
        <p class="mt-4 text-white">Total de usuários: {{ $userCount }}</p>
    </div>
</div>
@endsection