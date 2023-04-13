<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Pengumuman Baru') }}
        </h2>
    </x-slot>
    <x-head.tinymce-config />

    <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="py-12">
        @csrf
        <div class="form-control w-full ">

            {{-- input judul --}}
            <label class="label">
                <span class="label-text">Masukkan judul</span>
            </label>
            <input type="text" name="nama" placeholder="masukkan judul disini..."
                class="input input-bordered w-full" value="{{ old('nama') }}" />
            <label class="label">
                @error('nama')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            {{-- end input judul --}}

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
                value="{{ old('tanggal') }}" />
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
            <input type="text" name="tempat" class="input input-bordered w-full " value="{{ old('tempat') }}" />
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
            <textarea name="content" id="myeditorinstance">{{ old('content') }}</textarea>
            <label class="label">
                @error('content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <button class="btn btn-primary my-4" type="submit">BUAT</button>
        </div>
    </form>
</x-app-layout>
