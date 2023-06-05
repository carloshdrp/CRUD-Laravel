<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ArtList</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/welcome.js'])
</head>
<body class="overflow-x-hidden">
<nav class="bg-white w-screen py-2 fixed transition-all shadow-md z-10">
    <div class="wrapper flex justify-between items-center">
        <p class="logo">ArtList</p>
        <ul class="link-wrapper">
            <li><a href="/">Início</a></li>
            <li><a href="/catalogo">Catálogo</a></li>
            <li><a href="/gerenciar">Gerenciar</a></li>
        </ul>
        @auth
        <div>
            <a href="/painel"
               class="bg-red-400 text-white p-2 rounded-lg hover:bg-white hover:border-2 hover:border-red-400 hover:text-red-400 transition-all">Painel</a>
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
    <div class="wrapper flex items-center">
        <ul class="link-wrapper">
            <li><a href="#artesanato" class="active bg-red-300 rounded-lg bg-opacity-30">Início</a></li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li><a href="#produtos" class="bg-red-300 rounded-lg bg-opacity-50">Conheça</a></li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </li>
            <li><a href="#contato" class="bg-red-300 rounded-lg bg-opacity-70">Contato</a></li>
        </ul>
    </div>

</nav>

<section id="artesanato" class="bg-gradient-to-b from-red-500 to-red-400 text-white occult">
    <div class="wrapper flex justify-between items-center h-screen">
        <div class="w-1/2">
            <h1 class="text-4xl font-bold drop-shadow-md 2xl:text-6xl -rotate-2 bg-gradient-to-r from-red-400 to-red-300 text-center">Veja o nosso catálogo</h1>
            <p class="text-xl 2xl:text-2xl opacity-80 mt-6">
                Cada item que você irá encontrar exibe um toque autêntico que reflete a individualidade e a maestria
                dos artesãos talentosos por trás deles.
            </p>
        </div>
        <div class="w-1/2 flex flex-col items-center justify-center">
            <a href="/catalogo"
               class="w-[250px] text-center py-1.5 bg-white shadow-lg rounded-lg text-red-500 hover:underline text-lg 2xl:text-xl 2xl:w-[400px] mb-4">Ver
                Agora</a>
            <a href="#contato"
               class="w-[250px] text-center py-1.5 border-2 border-white shadow-lg rounded-lg text-white hover:underline text-lg 2xl:text-xl 2xl:w-[400px]">Contato</a>
        </div>
    </div>
</section>

<section id="produtos" class="bg-white text-neutral-800 occult">
    <div class="wrapper grid grid-cols-3 gap-7 justify-between items-center h-screen">
        <div class="card">
            <img src="img/ill-1.svg" class="h-2/5 mx-auto" alt="illustração voo ceu">
            <h2 class="header">Explore e Inspire-se</h2>
            <p>Entre e embarque em uma jornada de descoberta. Explore a criatividade e o talento dos
                artesãos enquanto encontra produtos que irão encantar seus sentidos. Inspire-se com a beleza e
                originalidade de peças artesanais.</p>
        </div>
        <div class="card">
            <img src="img/ill-2.svg" class="h-2/5 mx-auto" alt="">
            <h2 class="header">Descubra a Beleza Artesanal</h2>
            <p>Explore produtos artesanais excepcionais. Cada peça é cuidadosamente criada à mão e
                exibe um trabalho artístico único. Deixe-se encantar pela beleza e autenticidade desses produtos
                exclusivos.</p>
        </div>
        <div class="card">
            <img src="img/ill-3.svg" class="h-2/5 mx-auto" alt="">
            <h2 class="header">Uma Diversidade de Talentos</h2>
            <p>Apresentamos uma ampla variedade de produtos artesanais, desde cerâmica até tecelagem. Cada item exibe a
                maestria dos artesãos por trás deles. Explore nosso catálogo e descubra uma diversidade de talentos.</p>
        </div>
    </div>
</section>

<div class="divider occult">
    <div class="wrapper flex justify-between items-center py-4">
        <div class="flex flex-col items-center">
            <p class="counter">100</p>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z"/>
                </svg>
                <p class="text-lg ml-2">Items</p>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <p class="counter">100</p>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"/>
                </svg>
                <p class="text-lg ml-2">Categorias</p>
            </div>
        </div>
        <div class="flex flex-col items-center 2xl:py-2">
            <p class="counter">100</p>
            <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
                <p class="text-lg   ml-2">Usuários</p>
            </div>
        </div>
    </div>
</div>

<section id="contato" class="occult">
    <div class="wrapper flex flex-col justify-center items-center h-screen">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-red-200 to-red-100 text-neutral-800 px-10 2xl:text-6xl -rotate-2 shadow-lg">Estamos aqui para ajudar!</h1>
        <div>
            <p class="text-xl 2xl:text-2xl opacity-80 mt-6">
                Entre em contato com nossa equipe! Estamos prontos e ansiosos para te ajudar em qualquer
                necessidade.
            </p>
            <a href="mailto:contato@artlist.com" class="text-xl 2xl:text-2xl opacity-80 text-red-500 underline w-fit flex items-center mt-4">Enviar email <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 ml-2 2xl:w-8 2xl:h-8 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                </svg>
            </a>
        </div>

    </div>
</section>

<button class="opacity-0" onclick="function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
topFunction()" id="topBtn" title="Ir ao topo">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
    </svg>
</button>

<footer class="bg-white">
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
                <a href="/catalogo/new">Novo produto</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
