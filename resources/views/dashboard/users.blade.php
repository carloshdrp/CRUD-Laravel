@section('title', 'Usuários')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerencie os usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="success-msg opacity-100" id="message">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50 text-lg text-neutral-800">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium">ID</th>
                        <th scope="col" class="px-6 py-4 font-medium">Nome</th>
                        <th scope="col" class="px-6 py-4 font-medium">Email</th>
                        <th scope="col" class="px-6 py-4 font-medium">Entrou</th>
                        <th scope="col" class="px-6 py-4 font-medium text-right">Ações</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->id }}</td>

                            <th class="flex gap-3 px-6 py-4 font-normal text-neutral-800">
                                <div class="font-medium text-lg text-gray-700">{{ $user->name }}</div>
                        </th>
                        <td class="px-6 py-4">
          <span
              class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-md font-semibold text-red-500"
          >
            {{ $user->email }}
          </span>
                        </td>
                        <td class="px-6 py-4">{{ ($user->created_at)->format('d/m/Y') }}</td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'Delete' }" href="users/delete/{{ $user->id }}">
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
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
