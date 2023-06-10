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
                <form action="@if($edit) @else{{ route('dashboard.products.store') }}@endif" method="post"
                      class="flex flex-col p-4 gap-2" enctype="multipart/form-data">
                    @csrf

                    @if($edit)
                        <label for="title" class="text-red-400 font-medium 2xl:text-lg">Título:</label>
                        <input type="text" name="title" id="title"
                               class="rounded-md focus:ring-4 focus:border-red-300 focus:outline-0 focus:ring-red-500"
                                value="{{ $edit->title }}">

                        <label for="description" class="text-red-400 font-medium 2xl:text-lg">Descrição:</label>
                        <textarea name="description" id="description"
                                  class="rounded-md focus:ring-4 focus:border-red-300 focus:outline-0 focus:ring-red-500">{{$edit->description}}</textarea>

                        <label for="categories"
                               class="mb-2 inline-block text-red-400 font-medium 2xl:text-lg">Categorias</label>

                        <select name="categories[]" id="categories" multiple>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $edit->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>


                        <label
                            for="formFile"
                            class="mb-2 inline-block text-red-400 font-medium 2xl:text-lg"
                        >Imagem do produto</label
                        >
                        <input
                            class="relative m-0 block w-full flex-auto rounded border border-solid border-neutral-500 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-red-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-red-100 file:px-3 file:py-[0.32rem] file:text-red-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-red-200 focus:border-primary focus:text-red-700 focus:shadow-te-primary focus:outline-none"
                            type="file"
                            id="formFile"
                            name="formFile"
                        />

                        <button type="submit"
                                class="shadow-md text-lg w-full bg-red-400 py-1 rounded-md mt-4 text-white hover:bg-red-50 hover:text-red-400 hover:border-red-400 hover:border-2 transition-all font-medium">
                            Atualizar
                        </button>

                    @else
                        <label for="title" class="text-red-400 font-medium 2xl:text-lg">Título:</label>
                        <input type="text" name="title" id="title"
                               class="rounded-md focus:ring-4 focus:border-red-300 focus:outline-0 focus:ring-red-500">

                        <label for="description" class="text-red-400 font-medium 2xl:text-lg">Descrição:</label>
                        <textarea name="description" id="description"
                                  class="rounded-md focus:ring-4 focus:border-red-300 focus:outline-0 focus:ring-red-500"></textarea>

                        <label for="tags"
                               class="mb-2 inline-block text-red-400 font-medium 2xl:text-lg">Categorias</label>
                        <select name="tags[]" id="categories" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                        <label
                            for="formFile"
                            class="mb-2 inline-block text-red-400 font-medium 2xl:text-lg"
                        >Imagem do produto</label
                        >
                        <input
                            class="relative m-0 block w-full flex-auto rounded border border-solid border-neutral-500 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-red-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-red-100 file:px-3 file:py-[0.32rem] file:text-red-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-red-200 focus:border-primary focus:text-red-700 focus:shadow-te-primary focus:outline-none"
                            type="file"
                            id="formFile"
                            name="formFile"
                        />

                        <button type="submit"
                                class="shadow-md text-lg w-full bg-red-400 py-1 rounded-md mt-4 text-white hover:bg-red-50 hover:text-red-400 hover:border-red-400 hover:border-2 transition-all font-medium">
                            Adicionar
                        </button>
                    @endif
                </form>
            </div>
            <a href="{{ route('dashboard.products') }}" class="text-red-400 2xl:text-lg underline">Voltar</a>
            @if ($errors->any())
                <ul id="message" class="error-msg opacity-100">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('categories');
    </script>
</x-app-layout>
