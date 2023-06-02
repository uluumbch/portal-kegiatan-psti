<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    {{-- add text to say hello to user  --}}
                    <h1 class="text-2xl font-bold">Hello, {{ Auth::user()->name }}</h1>
                </div>
                <div class="w-full">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>Kegiatan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $item)
                                <tr>
                                    <td class="w-1/3">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="data:image/jpeg;base64,{{ $item->foto }}"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold break-words whitespace-normal">{{ $item->nama }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-2/3 break-words whitespace-normal">
                                        {{ $item->deskripsi }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <!-- foot -->
                        <tfoot>
                            <tr>
                                <th>Kegiatan</th>
                                <th>Deskripsi</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
