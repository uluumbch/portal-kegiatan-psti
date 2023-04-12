<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Pengumuman Baru') }}
        </h2>
    </x-slot>
    <x-head.tinymce-config/>

    <form action="post" enctype="multipart/form-data" class="py-12">
        <div class="form-control w-full ">

            {{-- input judul --}}
            <label class="label">
                <span class="label-text">Masukkan judul</span>
            </label>
            <input type="text" name="judul" placeholder="masukkan judul disini..."
                class="input input-bordered w-full" />
            <label class="label">
            </label>
            {{-- end input judul --}}

            {{-- input gambar --}}
            <label class="label">
                <span class="label-text">Pilih gambar thumbnail</span>
            </label>
            <input type="file" name="gambar" class="file-input file-input-bordered w-full " />
            <label class="label">
            </label>
            {{-- end input gambar --}}

            {{-- input tanggal --}}
            <label class="label">
                <span class="label-text">Tanggal kegiatan</span>
            </label>
            <input type="datetime-local" name="tanggal" class="input input-bordered w-full " />
            <label class="label">
            </label>
            {{-- end input tanggal --}}
            {{-- input content --}}
            <input id="x" type="hidden" name="content">
            {{-- <trix-editor input="x" class=""></trix-editor> --}}
            {{-- <div class="trix-content"></div> --}}
            {{-- end input content --}}
            <textarea name="content" id="myeditorinstance" cols="30" rows="10"></textarea>
            <button class="btn btn-primary my-4" type="submit">BUAT</button>
        </div>
    </form>
</x-app-layout>
