@extends('layouts/layout')

@section('title', 'Catálogo')

@section('content')

<section class="wrapper h-screen pt-20">
    <h1 class="2xl:text-5xl text-3xl font-bold text-red-400 mb-1 2xl:mb-3">Conheça os produtos artesanais</h1>
    <div class="divider-1 mb-4"></div>
    <div class="cards-wrapper">
        <article class="product-card">
            <h2>Título 2313 232s 23s </h2>
            <div class="img-wrapper">
                <img src="/img/ill-2.svg" alt="produto">
            </div>
            <section class="tags-wrapper">
                <p>Artesanato</p>
                <p>Pintura</p>
                <p>Banheiro</p>
                <p>Banheiro</p>
                <p>Banheiro</p>
            </section>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, accusamus assumenda cum
                dignissimos dolore dolorem eum ex harum iure libero mollitia necessitatibus, perspiciatis quaerat
                quibusdam rem sapiente suscipit vero, voluptatem.
            </p>
            <section class="info-wrapper">
                <p>Autor</p>
                <p>Data</p>
            </section>
        </article>
    </div>
</section>

@endsection
