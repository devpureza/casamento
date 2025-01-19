/<!DOCTYPE html>
<html>
<head>
    <title>Pagamento Confirmado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fdf9f6]">
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-4xl font-bold text-[#7e795b] mb-4">Obrigado pela sua contribuição!</h1>
        <p class="text-xl mb-8">Seu pagamento foi processado com sucesso.</p>
        <a href="{{ route('landing') }}" 
           class="bg-[#7e795b] text-white px-6 py-3 rounded hover:bg-[#5c5741]">
            Voltar para a página inicial
        </a>
    </div>
</body>
</html>