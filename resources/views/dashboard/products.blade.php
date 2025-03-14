@section('title', 'Produtos')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerencie os produtos - Total: '.count($products) ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('dashboard.products.add') }}"
               class="flex justify-center shadow-md text-lg w-full bg-red-400 py-2 rounded-md text-white hover:bg-red-50 hover:text-red-400 hover:border-red-400 hover:border-2 transition-all font-medium">Adicionar
                novo produto</a>

            @if (session('success'))
                <div class="success-msg opacity-100" id="message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-4">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50 text-lg text-neutral-800">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium">Imagem</th>
                        <th scope="col" class="px-6 py-4 font-medium">Título</th>
                        <th scope="col" class="px-6 py-4 font-medium">Descrição</th>
                        <th scope="col" class="px-6 py-4 font-medium">Adicionado em</th>
                        <th scope="col" class="px-6 py-4 font-medium">Ultima modificação</th>
                        <th scope="col" class="px-6 py-4 font-medium text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="w-16 h-16 p-1">
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="rounded-md">
                            </td>
                            <th class="px-6 py-4 font-normal text-neutral-800">
                                <div class="font-medium text-lg text-gray-700">{{ $product->title }}</div>
                            </th>
                            <td class="px-6 py-4">
                              <span
                                  class="text-md w-10"
                              >
                                {{ $product->description }}
                              </span>
                            </td>
                            <td class="px-6 py-4">{{ ($product->created_at)->format('d/m/Y') }}</td>

                            <td class="px-6 py-4">{{ ($product->updated_at)->format('d/m/Y - H:i:s') }}</td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a x-data="{ tooltip: 'Delete' }" href="products/delete/{{ $product->id }}">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-6 w-6 hover:stroke-red-500"
                                            x-tooltip="tooltip"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                            />
                                        </svg>
                                    </a>
                                    <a x-data="{ tooltip: 'Edite' }" href="products/edit/{{ $product->id }}">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="h-6 w-6 hover:stroke-neutral-800"
                                            x-tooltip="tooltip"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @if($products->isEmpty())
                        <tr>
                            <td colspan="6" class="px-6 py-4">
                                <div class="flex items-center justify-center gap-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 2xl:w-8 2xl:h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                    </svg>
                                    <p class="2xl:text-lg">
                                        Nenhum produto encontrado
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
