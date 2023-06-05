<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                {{-- check if user loged in is admin --}}
                @can('create event')
                    <div class="flex justify-end py-2">
                        <a class="btn btn-primary gap-2" href="{{ route('admin.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Buat pengumuman event
                        </a>
                    </div>
                @endcan
                <div class="w-full">
                    <table class="table w-full">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>Kegiatan</th>
                                <th>Deskripsi</th>
                                <th></th>
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
                                        {{-- show only 70 character --}}
                                        {{ Str::limit($item->deskripsi, 70, '...') }}
                                    </td>
                                    <th class="flex gap-1">
                                        @can('update event')
                                            <a href="{{ route('admin.edit', $item) }}"
                                                class="btn btn-secondary text-secondary-content btn-sm">edit</a>
                                        @endcan
                                        @can('delete event')
                                            <form action="{{ route('admin.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-error btn-sm text-error-content">hapus</button>
                                            </form>
                                        @endcan
                                        @can('read event')
                                            <a href="{{ route('post.show', $item->slug) }}"
                                                class="btn btn-primary btn-sm">lihat</a>
                                        @endcan
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                        
                    </table>
                    {{ $kegiatan->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
