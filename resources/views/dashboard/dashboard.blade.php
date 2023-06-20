<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (Auth::user()->hasRole('user'))
            {{ "Semua Kegiatan" }}
            @else
            {{ __('Dashboard') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                {{-- check if user loged in is admin --}}
                
                <div class="">
                    @if (Auth::user()->hasRole('user'))
                        @foreach ($kegiatan as $item)
                            <div class="card card-side my-5" data-theme="light">
                                <figure class="ml-3 w-1/6">
                                    <img class="max-h-32" src="data:image/jpeg;base64,{{ $item->foto }}"
                                        alt="{{ $item->nama }}" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title">{{ $item->nama }}</h2>
                                    <p>{{ $item->deskripsi }}</p>
                                    <div class="card-actions justify-end">
                                        <a href="{{ route('post.show', $item->slug) }}">
                                            <button class="btn btn-primary">Detail</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $kegiatan->links() }}
                    @else
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
                    <table class="table w-full bg-base-100">
                        <!-- head -->
                        <thead class="bg-base-200">
                            <tr>
                                <th>Kegiatan</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $item)
                                <tr class="">
                                    <td class="">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar">
                                                <div class="mask mask-squircle w-12 h-12">
                                                    <img src="data:image/jpeg;base64,{{ $item->foto }}"
                                                        alt="{{ $item->nama }}" />
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-bold break-words whitespace-normal">{{ $item->nama }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="break-words whitespace-normal">
                                        {{-- show only 70 character --}}
                                        {{ Str::limit($item->deskripsi, 70, '...') }}
                                    </td>
                                    <td class="">
                                        
                                            <a href="{{ route('admin.edit', $item) }}"
                                                class="btn btn-secondary text-secondary-content btn-sm w-full my-1">edit</a>
                                        
                                            <form action="{{ route('admin.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-error btn-sm text-error-content w-full my-1">hapus</button>
                                            </form>
                                        
                                            <a href="{{ route('admin.pendaftar', $item->id) }}"
                                                class="btn btn-primary btn-sm w-full my-1">lihat pendaftar</a>
                                        

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    {{ $kegiatan->links() }}
                </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
