<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatanku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- check if flash data --}}
        @if (session()->has('status'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center">
                {{ session('status') }}
            </div>
        @endif

        @foreach ($kegiatanTerdaftar as $item)
            <div class="card card-side my-5" data-theme="light">
                <figure class="ml-3 w-1/6">
                    <img class="max-h-32" src="data:image/jpeg;base64,{{ $item->kegiatan->foto }}"
                        alt="{{ $item->nama }}" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $item->kegiatan->nama }}</h2>
                    <p>{{ $item->kegiatan->deskripsi }}</p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('post.show', $item->kegiatan->slug) }}">
                            <button class="btn btn-primary">Detail</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
