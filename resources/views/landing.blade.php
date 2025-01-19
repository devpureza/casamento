<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Landing Page</title>
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
            <a href="#" class="bg-[#7e795b] text-white px-4 py-2 rounded hover:bg-[#5c5741] text-xl">Loja</a>
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
                <h2 class="text-4xl text-[#7e795b] font-['Great_Vibes'] mb-4">Construindo Nosso Sonho Juntos</h2>
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
                        <img src="{{ Storage::url($produto->image_path) ?? 'https://placehold.co/300x200' }}" 
                             alt="{{ $produto->name }}" 
                             class="w-full h-48 object-cover rounded mb-4">
                        <p class="text-2xl font-bold">{{ $produto->name }}</p>
                        <p class="text-gray-500 text-xl">R$ {{ number_format($produto->price, 2, ',', '.') }}</p>
                        <p class="text-gray-600 mt-2">{{ $produto->quota}} cotas</p>
                        <button class="mt-4 bg-[#7e795b] text-white px-6 py-2 rounded hover:bg-[#5c5741]"
                                onclick="window.location.href=''">
                            Ajudar
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section 3: Gallery -->
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p class="text-xl">2025</p>
        </div>
    </footer>

</body>

</html>
