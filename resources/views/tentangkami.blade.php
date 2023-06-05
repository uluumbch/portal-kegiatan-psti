{{-- {{
    dd(base64_encode('https://cdn.pixabay.com/photo/2014/08/07/21/13/newspaper-412811_1280.jpg'))
}} --}}

@extends('templates.main')
@section('content')

<h1 class="h-primary center text-4xl" style="margin-top:30px;text-align:center;">
    Our Team
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
    <h1 class="text-2xl font-bold mt-4">About Us</h1>
    <p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus mi non est mattis, id elementum velit aliquam. Integer auctor justo vitae mauris consequat, a varius enim scelerisque. Nullam luctus risus tellus, in consectetur ex semper sed.</p>
</div>




<

@endsection

