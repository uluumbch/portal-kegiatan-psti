@extends('templates.main')
@section('content')

<h1 class="text-center mt-7 text-3xl">
    Tim Kami
</h1>

<div class="container mx-auto">
    <div class="flex items-center justify-center m-5">
    <div class= "m-20 mx-48">
        <div class="w-64 h-64 rounded-full overflow-hidden">
            <img src="{{ asset('img/uluum.png') }}" alt="Profile Picture" class="object-cover w-full h-full">
        </div>
        <div class="mx-auto text-center text-3xl">Bachrul Uluum</div>
        <div class="mx-auto text-center">Project Manager</div>
    </div>
    <div class= "m-20 mx-48">
        <div class="w-64 h-64 rounded-full overflow-hidden">
            <img src="{{ asset('img/charles.png') }}" alt="Profile Picture" class="object-cover w-full h-full">

        </div>
        <div class="mx-auto text-center text-3xl">Charles Phandurand</div>
        <div class="mx-auto text-center">Front End</div>
    </div>
    </div>

    <div class="flex items-center justify-center m-5">
        <div class= "m-20 mx-48">
            <div class="w-64 h-64 rounded-full overflow-hidden">
                <img src="{{ asset('img/akbar.png') }}" alt="Profile Picture" class="object-cover w-full h-full">

            </div>
            <div class="mx-auto text-center text-2xl">Muhammad Aulia Akbar</div>
            <div class="mx-auto text-center">Back End</div>
        </div>
        <div class= "m-20 mx-48">
            <div class="w-64 h-64 rounded-full overflow-hidden">
                <img src="{{ asset('img/ryan.png') }}" alt="Profile Picture" class="object-cover w-full h-full">

            </div>
            <div class="mx-auto text-center text-2xl">Muhammad Firda Ryannifar</div>
            <div class="mx-auto text-center">System Analyst</div>
        </div>
    </div>
    <h1 class="text-2xl font-bold mt-4">Tentang Kami</h1>
    <div class="mt-2">
        <div class="flex gap-2 justify-center">
            <span class="text-3xl font-bold">
                PortiKePSTI 
            </span>
            <img class="w-10 h-10" src="{{ asset('img/logo_ulm.png') }}" alt="Logo universitas lambung mangkurat">
        </div>
        <div class="py-3">
            <p>Website PortiKePSTI atau Portal Kegiatan PSTI adalah sebuah website yang kami buat untuk menyelesaikan tugas akhir dari mata kuliah LSV di Program Studi Teknologi Informasi Universitas Lambung Mangkruat</p>
            <p>Website ini dibuat agar dapat digunakan untuk mempermudah terkumpulnya informasi tentang kegiatan yang ada di PSTI.</p>
            <p>Dengan adanya website ini pengguna dapat mendaftar ke kegiatan yang ada dan  mendapatkan informasi tentang kegiatan yang ada di PSTI</p>
            <p>Setelah pengguna mendaftar ke sebuah kegiatan, admin akan dapat mengetahui pengguna mana saja yang telah mendaftar ke sebuah kegaitan.</p>
            <p>Dengan demikian seluruh administrasi untuk pendaftaran sebuah kegiatan atau event dapat lebih mudah dan terpusat.</p>
        </div>
    </div>
</div>



@endsection

