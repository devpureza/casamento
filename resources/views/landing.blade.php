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

    <!-- Adicionar o Modal antes do header -->
    <div id="mensagemModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50" role="dialog">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-2xl font-['Great_Vibes'] text-[#7e795b] mb-4 text-center">Deixe sua mensagem para os noivos</h3>
                <form id="mensagemForm" class="mt-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-['Playfair_Display'] mb-2">Nome</label>
                        <input type="text" id="nome" name="nome" required 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline font-['Playfair_Display']">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-['Playfair_Display'] mb-2">E-mail</label>
                        <input type="email" id="email" name="email" required 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline font-['Playfair_Display']">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-['Playfair_Display'] mb-2">Mensagem para os noivos</label>
                        <textarea id="mensagem" name="mensagem" required 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline font-['Playfair_Display']" 
                                rows="4"></textarea>
                    </div>
                    
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="fecharModal()" 
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 font-['Playfair_Display']">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-[#7e795b] text-white rounded hover:bg-[#5c5741] font-['Playfair_Display']">
                            Continuar para pagamento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow fixed w-full z-10">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <a href="#" class="text-3xl font-['Great_Vibes']">Mateus e Ana</a>
            <nav class="space-x-6 hidden md:flex text-xl">
                <a href="#" class="hover:text-pink-500">Início</a>
                <a href="#about" class="hover:text-pink-500">Sobre nós</a>
                <a href="#services" class="hover:text-pink-500">Casamento</a>
            </nav>
            <a href="#services" class="bg-[#7e795b] text-white px-4 py-2 rounded hover:bg-[#5c5741] text-xl">Presentes</a>
        </div>
    </header>
    
    <!-- Hero Section Desktop -->
    <section id="hero" class="pt-24 pb-8 hidden md:block">
        <div class="container mx-auto">
            <div class="grid grid-cols-3 gap-8">
                <div class="flex items-center justify-center px-6">
                    <div class="text-[#7e795b] text-center md:text-left">
                        <p class="uppercase tracking-widest text-sm mb-2 font-['Playfair_Display']">Bem vindos!</p>
                        <h1 class="font-['Great_Vibes'] text-4xl sm:text-5xl md:text-7xl">Aninha & Pureza</h1>
                        <p class="max-w-md text-lg sm:text-2xl mx-auto md:mx-0">Juntos, escrevemos nossa história de amor. Compartilhe conosco este momento único e especial.</p>
                    </div>
                </div>
                <div class="col-span-2">
                    <img src="/images/hero.png" alt="Hero Image" class="w-full h-[600px] object-cover rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section Mobile -->
    <section id="hero-mobile" class="pt-8 pb-8 md:hidden h-[500px] bg-cover bg-center" style="background-image: url('/images/hero.png');">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-full">
                <div class="text-[#7e795b] text-center bg-white/80 p-8 rounded-lg">
                    <p class="uppercase tracking-widest text-sm mb-2 font-['Playfair_Display']">Bem vindos!</p>
                    <h1 class="font-['Great_Vibes'] text-4xl sm:text-5xl">Aninha & Pureza</h1>
                    <p class="max-w-md text-lg sm:text-xl mx-auto">Juntos, escrevemos nossa história de amor. Compartilhe conosco este momento único e especial.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 1: Dream Desktop -->
    <section id="about" class="py-4 hidden md:block">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div class="md:col-span-2 h-[600px]">
                <img src="/images/02.png" alt="Dream Image" class="rounded w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-4xl text-[#7e795b] font-['Great_Vibes'] mb-4">Construindo nosso sonho juntos</h2>
                <p class="text-xl">O amor é a força que nos une e nos faz crescer. A cada dia, construímos memórias preciosas e sonhos compartilhados que tornam nossa jornada única e especial.</p>
                <a href="#" class="mt-4 inline-block bg-[#7e795b] text-white px-6 py-3 rounded hover:bg-[#5c5741] text-xl">Explore</a>
            </div>
        </div>
    </section>

    <!-- Section 1: Dream Mobile -->
    <section id="about-mobile" class="py-4 md:hidden h-[500px] bg-cover bg-center" style="background-image: url('/images/02.png');">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-full">
                <div class="text-[#7e795b] text-center bg-white/80 p-8 rounded-lg">
                    <h2 class="text-4xl font-['Great_Vibes'] mb-4">Construindo nosso sonho juntos</h2>
                    <p class="text-xl">O amor é a força que nos une e nos faz crescer. A cada dia, construímos memórias preciosas e sonhos compartilhados que tornam nossa jornada única e especial.</p>
                    <a href="#" class="mt-4 inline-block bg-[#7e795b] text-white px-6 py-3 rounded hover:bg-[#5c5741] text-xl">Explore</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Plan -->
    <section id="services" class="py-4 bg-[#faf4ef]">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-4xl font-bold mb-4">Ajude o Casal</h2>
            <p class="mb-8 text-xl">Contribua com nosso futuro lar escolhendo um dos produtos abaixo. Sua ajuda será fundamental para mobiliarmos nossa casa!</p>
            
            <!-- Desktop Grid -->
            <div class="hidden md:grid grid-cols-3 gap-8">
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
                            <button id="btn-comprar-{{ $produto->id }}" 
                                    onclick="abrirModal({{ $produto->id }}, this)" 
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

            <!-- Mobile Carousel -->
            <div class="md:hidden relative">
                <div class="carousel-container overflow-hidden">
                    <div class="carousel-wrapper flex transition-transform duration-300">
                        @foreach($produtos as $produto)
                        <div class="carousel-slide w-full flex-shrink-0">
                            <div class="bg-white p-6 rounded shadow mx-2">
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
                                    <button id="btn-comprar-{{ $produto->id }}" 
                                            onclick="abrirModal({{ $produto->id }}, this)" 
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
                        </div>
                        @endforeach
                    </div>
                </div>
                <button onclick="moverCarrossel(-1)" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-full shadow">
                    ←
                </button>
                <button onclick="moverCarrossel(1)" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-full shadow">
                    →
                </button>
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

        function fecharModal() {
            document.getElementById('mensagemModal').classList.add('hidden');
        }

        function abrirModal(produtoId, botaoOrigem) {
            const quantidadeInput = document.querySelector(`[data-produto-id="${produtoId}"]`);
            const quantidade = parseInt(quantidadeInput?.value) || 1;
            
            const modal = document.getElementById('mensagemModal');
            
            // Armazenar dados importantes no modal
            modal.dataset.produtoId = produtoId;
            modal.dataset.quantidade = quantidade;
            
            console.log('Abrindo modal - Produto ID:', produtoId);
            console.log('Quantidade selecionada:', quantidade);
            
            modal.classList.remove('hidden');
        }

        // Adicionar listener para o formulário
        document.getElementById('mensagemForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const modal = document.getElementById('mensagemModal');
            const produtoId = modal.dataset.produtoId;
            
            // Pegar a quantidade diretamente do dataset do modal
            const quantidade = parseInt(modal.dataset.quantidade) || 1;
            
            const dadosFormulario = {
                quantidade_cotas: quantidade,
                nome: document.getElementById('nome').value,
                email: document.getElementById('email').value,
                mensagem: document.getElementById('mensagem').value
            };

            // Log para debug
            console.log('Produto ID:', produtoId);
            console.log('Quantidade:', quantidade);
            console.log('Dados completos:', dadosFormulario);

            const botaoOrigem = document.querySelector(`#btn-comprar-${produtoId}`);
            
            if (!botaoOrigem) {
                console.error('Botão não encontrado para o produto:', produtoId);
                return;
            }

            fecharModal();
            iniciarCheckout(produtoId, botaoOrigem, dadosFormulario);
        });

        function iniciarCheckout(produtoId, botao, dadosFormulario) {
            console.log('Iniciando checkout com dados:', dadosFormulario);

            const textoBtn = botao.querySelector('.botao-texto');
            const loadingSpinner = botao.querySelector('.loading-spinner');
            
            if (textoBtn && loadingSpinner) {
                textoBtn.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
                botao.disabled = true;
            }

            // Garantir que quantidade_cotas seja um número
            const dadosEnvio = {
                ...dadosFormulario,
                quantidade_cotas: parseInt(dadosFormulario.quantidade_cotas) || 1
            };

            fetch(`/checkout/${produtoId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(dadosEnvio)
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                if (data.url) {
                    window.location.href = data.url;
                }
            })
            .catch(error => {
                console.error('Erro no checkout:', error);
                alert('Erro no checkout: ' + error.message);
                
                if (textoBtn && loadingSpinner) {
                    textoBtn.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                    botao.disabled = false;
                }
            });
        }

        // Adicionar funções do carrossel
        let slideAtual = 0;
        const totalSlides = {{ count($produtos) }};

        function moverCarrossel(direcao) {
            const wrapper = document.querySelector('.carousel-wrapper');
            const slideWidth = document.querySelector('.carousel-slide').offsetWidth;
            
            slideAtual = Math.max(0, Math.min(slideAtual + direcao, totalSlides - 1));
            
            wrapper.style.transform = `translateX(-${slideAtual * slideWidth}px)`;
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
