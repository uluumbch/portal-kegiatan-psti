@extends('templates.main')
@section('content')
{{-- @dd($kegiatan) --}}
    <div class="flex flex-col w-full">
        <div class="card bg-base-300 m-8 p-5 mt-5 place-items-center">
            <h2 class="text-center font-bold text-2xl mt-5">{{ $kegiatan['nama'] }} <br>
               
            </h2>
            <br>
            <figure><img class="lg:max-w-4xl max-md" src="data:image/jpeg;base64, {{ $kegiatan['foto'] }}"
                    alt="{{ $kegiatan['nama'] }}" />
            </figure>
            <p class="text-xl py-4 max-w-lg text-center">
                {{ $kegiatan['deskripsi'] }}
            </p>
            <div class="flex justify-center items-center flex-col lg:flex-row gap-y-2 py-2">
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
                    <p class="my-auto text-lg">{{ $kegiatan['tempat'] }}</p>
                </button>

            </div>
        </div>
        <div class=" m-8 divider text-center text-xl font-semibold">Tentang Kegiatan</div>


        <article class="w-full p-8">
            {{-- render html  --}}
            {!! $kegiatan['content'] !!}
        </article>
        <div class="m-8 mockup-window  bg-base-300">
            <div class="p-6 flex justify-center flex-col gap-2 items-center">
                @if (Auth::user())
                  {{-- check if user with this id is has registered in this event by comparing with table pendaftar_kegiatan --}}
                  {{-- @dd($kegiatan) --}}
                    @if($kegiatan->pendaftarKegiatan->firstWhere('user_id', Auth::user()->id))
                        <p>Anda sudah terdaftar di kegiatan ini</p>
                        <p>Yuk ajak yang lain untuk mengikuti kegiatan ini juga dengan cara share</p>
                        <p>Jangan lupa juga untuk cek kegiatan lainnya!</p>
                        <a href="{{ asset('/#event') }}">
                          <button class="btn btn-primary btn-sm">
                            lihat kegiatan lainnya
                          </button>
                        </a>
                    @else
                        <p>Anda belum terdaftar di kegiatan ini</p>
                        <p>Yuk daftarkan dirimu ke kegiatan ini!</p>
                        <a href="{{ route('konfirmasiDaftarkegiatan', $kegiatan->slug) }}">
                          <button class="btn btn-primary btn-sm">
                            daftar gratis
                          </button>
                        </a>
                    @endif
                  @else
                        <p>Silakan login terlebih dahulu untuk dapat mendaftar ke kegatan ini secara gratis.</p>
                  @endif

                </button>
            </div>
        </div>
        {{-- share button --}}
        <div class="">
            <div class="divider text-center text-xl font-semibold m-8">Share Kegiatan</div>
            <div class="sharing-buttons flex flex-wrap justify-center gap-4 py-5">
                <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition py-3 px-5 rounded-lg btn btn-secondary"
                    target="_blank" rel="noopener" href="{{ $shareComponent['facebook'] }}" aria-label="Share on Facebook"
                    draggable="false">
                    <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-6 h-6">
                        <title>Facebook</title>
                        <path
                            d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z">
                        </path>
                    </svg>
                    <span class="ml-2 hidden lg:block ">Share on Facebook</span>
                </a>
                <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition py-3 px-5 rounded-lg btn btn-secondary"
                    target="_blank" rel="noopener" href="{{ $shareComponent['twitter'] }}" aria-label="Share on Twitter"
                    draggable="false">
                    <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-6 h-6">
                        <title>Twitter</title>
                        <path
                            d="m459 152 1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 0 0 156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0 1 36 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 0 1 181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z">
                        </path>
                    </svg>
                    <span class="ml-2 hidden lg:block">Share on Twitter</span>
                </a>
                <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition py-3 px-5 rounded-lg btn btn-secondary"
                    target="_blank" rel="noopener" href="{{ $shareComponent['linkedin'] }}" aria-label="Share on Linkedin"
                    draggable="false">
                    <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-6 h-6">
                        <title>Linkedin</title>
                        <path
                            d="M136 183v283H42V183h94zm6-88c1 27-20 49-53 49-32 0-52-22-52-49 0-28 21-49 53-49s52 21 52 49zm333 208v163h-94V314c0-38-13-64-47-64-26 0-42 18-49 35-2 6-3 14-3 23v158h-94V183h94v41c12-20 34-48 85-48 62 0 108 41 108 127z">
                        </path>
                    </svg>
                    <span class="ml-2 hidden lg:block">Share on Linkedin</span>
                </a>
                <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition py-3 px-5 rounded-lg btn btn-secondary"
                    target="_blank" rel="noopener" href="{{ $shareComponent['whatsapp'] }}" aria-label="Share on Whatsapp"
                    draggable="false">
                    <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-6 h-6">
                        <title>Whatsapp</title>
                        <path
                            d="M413 97A222 222 0 0 0 64 365L31 480l118-31a224 224 0 0 0 330-195c0-59-25-115-67-157zM256 439c-33 0-66-9-94-26l-7-4-70 18 19-68-4-7a185 185 0 0 1 287-229c34 36 56 82 55 131 1 102-84 185-186 185zm101-138c-5-3-33-17-38-18-5-2-9-3-12 2l-18 22c-3 4-6 4-12 2-32-17-54-30-75-66-6-10 5-10 16-31 2-4 1-7-1-10l-17-41c-4-10-9-9-12-9h-11c-4 0-9 1-15 7-5 5-19 19-19 46s20 54 23 57c2 4 39 60 94 84 36 15 49 17 67 14 11-2 33-14 37-27s5-24 4-26c-2-2-5-4-11-6z">
                        </path>
                    </svg>
                    <span class="ml-2 hidden lg:block">Share on Whatsapp</span>
                </a>
                <a class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition py-3 px-5 rounded-lg btn btn-secondary"
                    target="_blank" rel="noopener" href="{{ $shareComponent['telegram'] }}"
                    aria-label="Share on Telegram" draggable="false">
                    <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        class="w-6 h-6">
                        <title>Telegram</title>
                        <path
                            d="M256 8a248 248 0 1 0 0 496 248 248 0 0 0 0-496zm115 169c-4 39-20 134-28 178-4 19-10 25-17 25-14 2-25-9-39-18l-56-37c-24-17-8-25 6-40 3-4 67-61 68-67l-1-4-5-1q-4 1-105 70-15 10-27 9c-9 0-26-5-38-9-16-5-28-7-27-16q1-7 18-14l145-62c69-29 83-34 92-34 2 0 7 1 10 3l4 7a43 43 0 0 1 0 10z">
                        </path>
                    </svg>
                    <span class="ml-2 hidden lg:block">Share on Telegram</span>
                </a>
            </div>
        </div>
        {{-- end share button --}}

        {{-- tampil komentar --}}
        <div class="w-full px-8">
            <div class="divider text-center text-xl font-semibold">Komentar</div>
            @forelse ($kegiatan->comments as $comment)
                <div class="flex flex-col mt-8">
                    <div class="flex flex-row justify-between">
                        <div class="flex">
                            <img class="w-16 h-16 rounded-full" src="data:image/jpeg;base64, {{ $comment->user->foto }}">
                            <h4 class="my-auto px-4">{{ $comment->user->name }}</h4>
                        </div>
                        <div class="">
                            {{-- check if this comment is owned by this user --}}
                            @if (Auth::user() && Auth::user()->id == $comment->user_id)
                                <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="my-4">
                        <p class="">{{ $comment->isi }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p class="">{{ $comment->created_at->diffForHumans() }}</p>
                        <p class="">{{ $comment->created_at->format('d M Y') }}</p>
                    </div>
                    <div class="divider"></div>
                </div>
            @empty
                <div class="flex flex-col justify-center items-center mt-8">
                    <div class="">Belum ada komentar</div>
                </div>
            @endforelse
        </div>
        {{-- end tampil komentar --}}

        {{-- form tambah komentar --}}
        <div class="px-8 pb-8">
            @if (Auth::user())
                <form action="{{ route('comment.store', $kegiatan->slug) }}" method="post">
                    @csrf
                    <div class="flex">
                            <img class="w-16 h-16 rounded-full"
                                src="data:image/jpeg;base64, {{ Auth::user()->foto }}" alt="">
                            <div class="text-center font-semibold my-auto pl-4">{{ Auth::user()->name }}</div>
                    </div>

                    <div class="rounded mt-2 mx-auto">
                        
                        <textarea class="w-full px-3 py-2  textarea textarea-ghost textarea-bordered" name="isi"
                            placeholder="Tulis komentar" rows="4"></textarea>
                        @error('isi')
                            <p class="text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                        {{-- show flash message --}}
                        @if (session()->has('message'))
                            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 text-center">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="flex flex-row justify-between items-center mt-4">
                            

                            <button
                                class="border-2 duration-200 ease inline-flex items-center mb-1 mr-1 transition py-3 px-5 rounded-lg btn btn-primary"
                                type="submit">
                                <svg class="fill-primary-content w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                                <span class="ml-2">submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="flex flex-col justify-center items-center mt-8">
                    <div class="text-center font-semibold">Silahkan login untuk menambahkan komentar</div>
                </div>
            @endif
        </div>
        {{-- end form tambah komentar --}}
    </div>
@endsection
