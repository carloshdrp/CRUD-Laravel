<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - ArtList</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden">
<nav class="bg-white w-screen py-2 fixed transition-all shadow-md z-10">
    <div class="wrapper flex justify-between items-center">
        <x-application-logo />
        <ul class="link-wrapper">
            <li><a href="/">Início</a></li>
            <li><a href="/catalogo">Catálogo</a></li>
            @auth
            <li><a href="/gerenciar">Gerenciar</a></li>
            @endauth
        </ul>
        @auth
        <div class="flex items-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="text-red-400 transition-all hover:text-red-600 hover:cursor-pointer py-1 px-6">Sair</button>
            </form>
            <a href="{{ route('profile.edit') }}"
               class="bg-red-400 text-white p-2 rounded-lg hover:bg-white hover:border-2 hover:border-red-400 hover:text-red-400 transition-all">Perfil</a>

        </div>
        @else
        <div>
            <a href="/login"
               class="text-red-400 transition-all hover:text-red-600 hover:cursor-pointer py-1 px-6">Entrar</a>
            <a href="/register"
               class="bg-red-400 text-white p-2 rounded-lg hover:bg-white hover:border-2 hover:border-red-400 hover:text-red-400 transition-all">Registrar</a>
        </div>
        @endauth
    </div>

</nav>

@yield('content')

<button class="opacity-0" onclick="function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
topFunction()" id="topBtn" title="Ir ao topo">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
    </svg>
</button>

<footer class="bg-neutral-100 py-2">
    <div class="wrapper grid grid-cols-3 items-center py-2">
        <p class="logo">ArtList</p>
        <div class="footer-wrapper">
            <h3>Conta</h3>
            <div class="flex flex-col">
                <a href="/login">Logar</a>
                <a href="/register">Registrar</a>
            </div>
        </div>
        <div class="footer-wrapper">
            <h3>Catálogo</h3>
            <div class="flex flex-col">
                <a href="/catalogo">Ver agora</a>
                <a href="/catalogo/categories">Categorias</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
