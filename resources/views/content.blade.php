@extends('templates.main')
@section('content')
    <div class="flex flex-col w-full">
        <div class="mt-2 card bg-base-300 rounded-box place-items-center">
            <h2 class="text-center font-bold text-2xl">{{ $kegiatan['nama'] }}</h2>
            <figure><img class="max-w-4xl" src="{{ asset('foto-kegiatan/' . $kegiatan['foto']) }}"
                    alt="{{ $kegiatan['nama'] }}" />
            </figure>
            <p class="text-xl py-4 max-w-lg text-center">
                {{ $kegiatan['deskripsi'] }}
            </p>
            <div class="flex justify-center items-center py-2">
                <button class="flex gap-1 btn justify-evenly mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                    <p class="my-auto text-lg">{{ $kegiatan['tanggal'] }}</p>
                </button>

                <button class="flex gap-1 btn justify-evenly mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <p class="my-auto text-lg">$kegiatan['tempat']</p>
                </button>

            </div>
        </div>
        <div class="divider text-center">Tentang Kegiatan</div>
        {{-- <div class="grid card bg-base-300 rounded-box place-items-center px-10"> --}}
        {{-- Acara ini sepenuhnya GRATIS dan akan diselenggarakan hari Selasa, 18 April 2023 pukul 15.00 - 16.30 WIB Live di
            YouTube Dicoding Indonesia (jangan lupa klik tanda lonceng untuk pengingat).

            Ingin mendapatkan beasiswa belajar di learning path Back-End dan DevOps Engineer? Daftar sekarang di
            aws.dicoding.com

            Sudah siap menghadapi tantangan keamanan di dunia komputasi awan?

            Pada event ini, kita akan berdiskusi tentang ancaman keamanan yang dihadapi dalam komputasi awan, serta praktik
            terbaik untuk menghadapinya. Para pembicara ahli akan berbagi pengalaman, kiat, dan solusi inovatif dalam
            manajemen risiko, proteksi data, manajemen identitas, serta teknologi keamanan cloud terbaru yang dapat
            digunakan untuk menjaga integritas, kerahasiaan, dan ketersediaan data kamu. Jadi kamu bisa mengembangkan
            aplikasimu dengan lebih baik lagi.

            Bergabunglah di AWS x Dicoding LIVE dan tingkatkan pemahamanmu dalam menghadapi tantangan keamanan di dunia
            cloud computing. --}}


        <article class="w-full prose px-11 lg:prose-xl dark:prose-invert">
            {{-- render html  --}}
            {!! $kegiatan['content'] !!}
        </article>
    </div>
@endsection
