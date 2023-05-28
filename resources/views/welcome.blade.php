@extends('templates.main')
@section('content')
    {{-- hero --}}
    <div class="hero lg:!place-items-start min-h-screen  bg-myimage"
    >
        <div class="hero-content flex-col lg:my-auto text-white">
            <div>
                <h1 class="text-5xl font-bold max-w-xl">Portal Informasi Kegiatan PSTI</h1>
                <p class="py-6 max-w-lg text-lg font-semibold">
                    Jangan Sampai Ketinggalan Informasi Tentang Kegiatan Menarik di PSTI! Dengan PortIKe PSTI Selalu
                    Dapatkan Informasi Terbaru Event yang Akan Diadakan!
                </p>
                <button class="btn btn-primary">Eksplor Event</button>
            </div>
        </div>
    </div>


    {{-- content start --}}
    <div class="bg-base-100 w-full ">
        <h2 class="text-center my-5 font-bold text-2xl" id="event">Semua Event</h2>
        {{-- card holder --}}
        <div class=" flex justify-center gap-4 basis-1 flex-wrap">


            @foreach ($kegiatan as $item)
                <div class="card card-compact w-96 bg-base-100 shadow-xl">
                    <figure><img src="{{ asset('foto-kegiatan/' . $item['foto']) }}" alt="{{ $item['nama'] }}" />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ $item['nama'] }}</h2>
                        <p>{{ $item['deskripsi'] }}</p>
                        <div class="card-actions justify-between">
                            <div class="flex flex-col ">
                                <div class="flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                    <p class="my-auto">{{ $item['tanggal'] }}</p>
                                </div>
                                <div class="flex gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <p class="my-auto">{{ $item['tempat'] }}</p>
                                </div>

                            </div>
                            <a href="{{ asset('post/' . $item['slug']) }}" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class=>
            {{ $kegiatan->links() }}
        </div>
    </div>
@endsection
