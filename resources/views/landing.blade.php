<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mateus Pureza e Ana Tipple</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Dancing+Script:wght@400;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
</head>

<body class="bg-[#fdf9f6] text-gray-800 font-['Dancing_Script']">

    <!-- Header -->
    <header class="bg-white shadow fixed w-full z-10">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <a href="#" class="text-3xl font-['Great_Vibes']">Mateus e Ana</a>
            <nav class="space-x-6 hidden md:flex text-xl">
                <a href="#" class="hover:text-pink-500">Home</a>
                <a href="#about" class="hover:text-pink-500">Sobre nós</a>
                <a href="#services" class="hover:text-pink-500">Casamento</a>
            </nav>
            <a href="#services" class="bg-[#7e795b] text-white px-4 py-2 rounded hover:bg-[#5c5741] text-xl">Presentes</a>
        </div>
    </header>
    
    <!-- Hero Section -->
    <section id="hero" class="h-screen">
        <div class="container mx-auto h-full">
            <div class="grid grid-cols-1 md:grid-cols-3 h-full">
                <div class="flex items-center justify-center px-6 py-8 md:py-0">
                    <div class="text-[#7e795b] text-center md:text-left">
                        <p class="uppercase tracking-widest text-sm mb-2 font-['Playfair_Display']">Frase para casamento</p>
                        <h1 class="font-['Great_Vibes'] text-4xl sm:text-5xl md:text-7xl">Aninha & Pureza</h1>
                        <p class="max-w-md text-lg sm:text-2xl mx-auto md:mx-0">Juntos, escrevemos nossa história de amor. Compartilhe conosco este momento único e especial.</p>
                    </div>
                </div>
                <div class="col-span-2 bg-cover bg-center h-64 md:h-full" style="background-image: url('/images/hero.png');"></div>
            </div>
        </div>
    </section>

    <!-- Section 1: Dream -->
    <section id="about" class="py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div class="md:col-span-2 h-[600px]">
                <img src="/images/02.png" alt="Dream Image" class="rounded w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-4xl text-[#7e795b] font-['Great_Vibes'] mb-4">Construindo nosso sonho juntos</h2>
                <p class="text-xl">O amor é a força que nos une e nos faz crescer. A cada dia, construímos memórias preciosas e sonhos compartilhados que tornam nossa jornada única e especial.</p>
                <a href="#"
                    class="mt-4 inline-block bg-[#7e795b] text-white px-6 py-3 rounded hover:bg-[#5c5741] text-xl">Explore</a>
            </div>
        </div>
    </section>

   <!-- Section 2: Plan -->
<section id="services" class="py-8 bg-[#faf4ef]">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-4">Ajude o Casal</h2>
        <p class="mb-8 text-xl">Contribua com nosso futuro lar escolhendo um dos produtos abaixo. Sua ajuda será fundamental para mobiliarmos nossa casa!</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($produtos as $produto)
                <div class="bg-white p-6 rounded shadow">
                    <img src="{{ $produto->image_path ? Storage::url($produto->image_path) : 'https://placehold.co/300x200' }}" 
                         alt="{{ $produto->name }}" 
                         class="w-full h-48 object-cover rounded mb-4">
                    <p class="text-2xl font-bold">{{ $produto->name }}</p>
                    <p class="text-gray-500 text-xl">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>
                    <p class="text-gray-600 mt-2">Disponível: {{ $produto->quota }} cotas</p>
                    <div class="mt-4">
                        <div class="flex items-center justify-center gap-4 mb-3">
                            <button onclick="diminuirQuantidade({{ $produto->id }})" 
                                    class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                <span class="text-xl">-</span>
                            </button>
                            
                            <input type="number" 
                                   min="1" 
                                   max="{{ $produto->quota }}" 
                                   value="1" 
                                   class="quantidade-cotas border-none w-16 text-center text-xl"
                                   data-produto-id="{{ $produto->id }}"
                                   readonly>
                            
                            <button onclick="aumentarQuantidade({{ $produto->id }})" 
                                    class="w-8 h-8 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                                <span class="text-xl">+</span>
                            </button>
                        </div>
                        <button onclick="iniciarCheckout({{ $produto->id }}, this)" 
                                class="w-full mt-2 bg-[#7e795b] text-white px-6 py-2 rounded hover:bg-[#5c5741] relative">
                            <span class="botao-texto">Comprar Cota</span>
                            <span class="loading-spinner hidden">
                                <svg class="animate-spin h-5 w-5 text-white mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @push('scripts')
    <script>
    function aumentarQuantidade(produtoId) {
        const input = document.querySelector(`[data-produto-id="${produtoId}"]`);
        const novoValor = parseInt(input.value) + 1;
        if (novoValor <= parseInt(input.max)) {
            input.value = novoValor;
        }
    }

    function diminuirQuantidade(produtoId) {
        const input = document.querySelector(`[data-produto-id="${produtoId}"]`);
        const novoValor = parseInt(input.value) - 1;
        if (novoValor >= parseInt(input.min)) {
            input.value = novoValor;
        }
    }

    function iniciarCheckout(produtoId, botao) {
        // Mostrar loading
        const textoBtn = botao.querySelector('.botao-texto');
        const loadingSpinner = botao.querySelector('.loading-spinner');
        textoBtn.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');
        botao.disabled = true;
        
        const quantidade = document.querySelector(`[data-produto-id="${produtoId}"]`).value;
        
        fetch(`/checkout/${produtoId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ quantidade_cotas: quantidade })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na resposta do servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.url) {
                window.location.href = data.url;
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao processar o checkout');
            // Restaurar botão ao estado original
            textoBtn.classList.remove('hidden');
            loadingSpinner.classList.add('hidden');
            botao.disabled = false;
        });
    }
    </script>
    @endpush
</section>

    <!-- Section 3: Gallery -->
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-xl">2025</p>
        </div>
    </footer>

</body>

@stack('scripts')
</html>
