@extends('layouts/layout')

@section('title', $product->title)

@section('content')

    <section class="wrapper min-h-screen mb-16 flex items-center">
        <div class="w-1/2 flex items-center justify-center">
            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="rounded-md w-8/12 shadow-md motion-safe:hover:scale-[1.2] transition-all">
        </div>
        <div class="w-1/2">
            <h1 class="text-3xl font-bold">{{$product->title}}</h1>
            <div class="h-0.5 w-16 mt-1 mb-3 bg-neutral-800"></div>
            <div class="flex mb-4 overflow-auto">
                    @foreach($product->categories as $products_tag)
                        <p class="border-2 border-neutral-400 hover:border-neutral-600 px-2 rounded-md whitespace-nowrap hover:text-neutral-600 text-neutral-400 text-sm 2xl:text-lg mr-2 mb-2 w-fit">{{ $products_tag->name }}</p>
                    @endforeach
            </div>


            <p class="2xl:text-lg ">
                {{$product->description}}
            </p>

            <p class="opacity-60 mt-4">Ultima atualização em <br />{{ ($product->updated_at)->format('d/m/Y - H:i:s') }}</p>
            <a href="{{ route('catalogo') }}" class="text-red-400 2xl:text-lg underline">Voltar</a>
        </div>
    </section>

@endsection
