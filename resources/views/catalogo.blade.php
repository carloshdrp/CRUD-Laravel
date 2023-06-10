@extends('layouts/layout')

@section('title', 'Catálogo')

@section('content')

    <section class="wrapper min-h-screen pt-20 mb-16">
        <h2 class="text-4xl 2xl:text-5xl font-bold bg-gradient-to-r from-red-200 to-red-100 text-neutral-800 px-10 shadow-sm mb-8 w-fit mx-auto">
            Conheça os produtos artesanais</h2>
        <div class="cards-wrapper">
            @foreach($products as $product)
                <article class="product-card cursor-pointer" id="{{ $product->id }}">
                    <h2 class="mb-2">{{ $product->title }}</h2>
                    <div class="img-wrapper">
                        <img src="{{ asset($product->image) }}" alt="produto">
                    </div>
                    <section class="tags-wrapper">
                        @foreach($product->categories as $products_tag)
                            <p>{{ $products_tag->name }}</p>
                        @endforeach
                    </section>

                    <p>
                        {{$product->description}}
                    </p>
                    <section class="info-wrapper">
                        <p>{{ ($product->updated_at)->format('d/m/Y - H:i:s') }}</p>
                    </section>
                </article>
            @endforeach
        </div>
        <div class="h-12 mt-4 w-full">
            {{ $products->links('pagination::simple-tailwind') }}
        </div>
    @if(count($products) == 0)
            <div class="flex items-center justify-center gap-4 bg-white shadow-xl rounded-md mt-5 p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 2xl:w-8 2xl:h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                </svg>
                <p class="2xl:text-lg">
                    Nenhum produto encontrado
                </p>
            </div>
        @endif
    </section>

@endsection
