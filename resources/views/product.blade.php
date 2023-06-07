@extends('layouts/layout')

@section('title', $product->title)

@section('content')

<section class="wrapper min-h-screen mb-16 flex items-center">
    <div class="w-1/2">
        <img src="/img/ill-1.svg" alt="imagem">
    </div>
    <div class="w-1/2">
        <h1 class="text-3xl font-bold">{{$product->title}}</h1>
        <div class="h-0.5 w-16 mt-1 mb-4 bg-neutral-800"></div>
    </div>
</section>

@endsection
