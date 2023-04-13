<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Pengumuman Baru') }}
        </h2>
    </x-slot>
    <x-head.tinymce-config />

    {{-- @dd($kegiatan) --}}

    <form method="post" action="{{ isset($title) ? route('admin.update', $kegiatan) : route('admin.store') }}"
        enctype="multipart/form-data" class="py-12">
        @if (isset($title))
            @method('PUT')
        @endif
        @csrf
        <div class="form-control w-full ">

            {{-- input judul --}}
            <label class="label">
                <span class="label-text">Masukkan judul</span>
            </label>
            <input type="text" name="nama" placeholder="masukkan judul disini..."
                class="input input-bordered w-full"
                value="{{ old('nama', isset($kegiatan) ? $kegiatan->nama : '') }}" />
            <label class="label">
                @error('nama')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            {{-- end input judul --}}

            {{-- input deskripsi --}}
            <label class="label">
                <span class="label-text">Deskripsi singkat kegiatan</span>
            </label>
            <textarea name="deskripsi" class="textarea h-20 textarea-bordered w-full"
                placeholder="tuliskan deskripsi kurang dari 40 kata...">{{ old('deskripsi', isset($kegiatan) ? $kegiatan->deskripsi : '') }}</textarea>
            <label class="label">
                @error('deskripsi')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            {{-- end input deskripsi --}}

            {{-- input gambar --}}
            <label class="label">
                <span class="label-text">Pilih gambar thumbnail</span>
            </label>
            <input type="file" name="foto" class="file-input file-input-bordered w-full " />
            <label class="label">
                @error('foto')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            {{-- end input gambar --}}

            {{-- input tanggal --}}
            <label class="label">
                <span class="label-text">Tanggal kegiatan</span>
            </label>
            <input type="datetime-local" name="tanggal" class="input input-bordered w-full"
                value="{{ old('tanggal', isset($kegiatan) ? date('Y-m-d\TH:i:s', strtotime($kegiatan->tanggal)) : '') }}" />
            <label class="label">
                @error('tanggal')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            {{-- end input tanggal --}}

            {{-- input tanggal --}}
            <label class="label">
                <span class="label-text">Tempat kegiatan</span>
            </label>
            <input type="text" name="tempat" class="input input-bordered w-full "
                value="{{ old('tempat', isset($kegiatan) ? $kegiatan->tempat : '') }}" />
            <label class="label">
                @error('tempat')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            {{-- end input tanggal --}}

            {{-- input content --}}
            {{-- <trix-editor input="x" class=""></trix-editor> --}}
            {{-- <div class="trix-content"></div> --}}
            {{-- end input content --}}
            <textarea name="content" id="myeditorinstance">{{ old('content', isset($kegiatan) ? $kegiatan->content : '') }}</textarea>
            <label class="label">
                @error('content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <button class="btn btn-primary my-4" type="submit">BUAT</button>
        </div>
    </form>
</x-app-layout>
