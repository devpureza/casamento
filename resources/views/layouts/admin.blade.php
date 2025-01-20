<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-900 text-white">
    <!-- Navbar -->
    <nav class="bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo/Brand -->
                <div class="flex-shrink-0">
                    <span class="font-bold text-xl">Dashboard</span>
                </div>

                <!-- Menu Principal -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4">
                        <!-- Home -->
                        <a href="{{ route('admin.dashboard') }}" 
                           class="hover:bg-blue-800 px-3 py-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-800' : '' }}">
                            Home
                        </a>

                        <!-- Mensagens -->
                        <a href="{{ route('admin.mensagens.index') }}" 
                           class="hover:bg-blue-800 px-3 py-2 rounded-md {{ request()->routeIs('admin.mensagens.index') ? 'bg-blue-800' : '' }}">
                            Mensagens
                        </a>

                        <!-- Produtos Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @click.away="open = false" 
                                class="hover:bg-blue-800 px-3 py-2 rounded-md inline-flex items-center {{ request()->routeIs('admin.products.*') ? 'bg-blue-800' : '' }}">
                                <span>Produtos</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" 
                                class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-slate-800 ring-1 ring-black ring-opacity-5"
                                style="display: none;">
                                <div class="py-1">
                                    <a href="{{ route('admin.products.create') }}" 
                                       class="block px-4 py-2 text-sm text-gray-200 hover:bg-slate-700 {{ request()->routeIs('admin.products.create') ? 'bg-slate-700' : '' }}">
                                        Adicionar Produto
                                    </a>
                                    <a href="{{ route('admin.products.index') }}" 
                                       class="block px-4 py-2 text-sm text-gray-200 hover:bg-slate-700 {{ request()->routeIs('admin.products.index') ? 'bg-slate-700' : '' }}">
                                        Listar Produtos
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Relatórios -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @click.away="open = false" 
                                class="hover:bg-[#7e795b]/80 px-3 py-2 rounded-md inline-flex items-center">
                                <span>Relatórios</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" 
                                class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                                style="display: none;">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Relatório de Vendas
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Relatório de Estoque
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Usuários -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" @click.away="open = false" 
                                class="hover:bg-[#7e795b]/80 px-3 py-2 rounded-md inline-flex items-center">
                                <span>Usuários</span>
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" 
                                class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                                style="display: none;">
                                <div class="py-1">
                                    <a href="{{ route('admin.users.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Adicionar Usuário
                                    </a>
                                    <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Listar Usuários
                                    </a>
                                    {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Permissões
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Perfil Dropdown -->
                <div class="ml-4 flex items-center md:ml-6">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" @click.away="open = false" 
                            class="hover:bg-[#7e795b]/80 px-3 py-2 rounded-md inline-flex items-center">
                            {{ Auth::user()->name }}
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" 
                            class="absolute right-0 z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                            style="display: none;">
                            <div class="py-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" 
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>