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
            <li><a href="{{route('welcome')}}" class="hover:border-b-2 border-red-400">Início</a></li>
            @if(request()->routeIs('catalogo'))
                <li><a href="{{ route('catalogo') }}/#" class="border-b-2 border-red-400">Catálogo</a></li>
            @else<li><a href="{{route('catalogo')}}" class="hover:border-b-2 border-red-400">Catálogo</a></li>@endif
        </ul>
        @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-lg leading-4 font-medium rounded-md text-white bg-red-400 hover:bg-red-50 hover:border-red-400 hover:border-2 hover:text-red-400 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>

                        <!-- Admin Dashboard -->
                        <div class="w-full h-0.5 my-1 flex justify-center">
                            <div class="h-full w-11/12 bg-gray-200 rounded-full"></div>
                        </div>

                        <x-dropdown-link :href="route('dashboard')">
                            {{ __('Painel') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        @else
            <div>
                <a href="{{route('login')}}"
                   class="text-red-400 transition-all hover:text-red-600 hover:cursor-pointer py-1 px-6">Entrar</a>
                <a href="{{route('register')}}"
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
                <a href="{{route('login')}}">Logar</a>
                <a href="{{route('register')}}">Registrar</a>
            </div>
        </div>
        <div class="footer-wrapper">
            <h3>Catálogo</h3>
            <div class="flex flex-col">
                <a href="{{route('catalogo')}}">Ver agora</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
