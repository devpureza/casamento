<!DOCTYPE html>
<html class="h-full bg-[#f5f4f1]">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="h-full">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-[#7e795b]">
                    Entre na sua conta
                </h2>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="email" class="sr-only">E-mail</label>
                        <input type="email" name="email" id="email" 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-[#7e795b]/30 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-[#7e795b] focus:border-[#7e795b] focus:z-10 sm:text-sm" 
                            placeholder="E-mail"
                            value="{{ old('email') }}" 
                            required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">Senha</label>
                        <input type="password" name="password" id="password" 
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-[#7e795b]/30 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-[#7e795b] focus:border-[#7e795b] focus:z-10 sm:text-sm" 
                            placeholder="Senha"
                            required>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" 
                            class="h-4 w-4 text-[#7e795b] focus:ring-[#7e795b] border-[#7e795b]/30 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Lembrar-me
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#7e795b] hover:bg-[#7e795b]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7e795b]">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>