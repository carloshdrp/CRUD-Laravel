@section('title', 'Categorias')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerencie as categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-md mb-2">
                <form action="@if($edit) @else{{ route('dashboard.categories.store') }}@endif" method="post" class="flex flex-col p-4 gap-2">
                    @csrf

                    <label for="name" class="text-red-400 font-medium 2xl:text-lg">Nome:</label>
                    @if($edit)
                        <input type="text" name="name" id="name"
                               class="rounded-md focus:ring-4 focus:border-red-300 focus:outline-0 focus:ring-red-500"
                               value="{{$edit->name}}">

                        <button type="submit"
                                class="shadow-md text-lg w-full bg-red-400 py-1 rounded-md mt-4 text-white hover:bg-red-50 hover:text-red-400 hover:border-red-400 hover:border-2 transition-all font-medium">
                            Atualizar
                        </button>
                    @else
                        <input type="text" name="name" id="name"
                               class="rounded-md focus:ring-4 focus:border-red-300 focus:outline-0 focus:ring-red-500">

                        <button type="submit"
                                class="shadow-md text-lg w-full bg-red-400 py-1 rounded-md mt-4 text-white hover:bg-red-50 hover:text-red-400 hover:border-red-400 hover:border-2 transition-all font-medium">
                            Adicionar
                        </button>
                    @endif
                </form>
            </div>
            <a href="{{ route('dashboard.categories') }}" class="text-red-400 2xl:text-lg underline">Voltar</a>
            @if ($errors->any())
                <ul id="message" class="error-msg opacity-100">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>
