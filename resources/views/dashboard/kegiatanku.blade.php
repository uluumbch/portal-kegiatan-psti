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
    </div>
@dd($kegiatanTerdaftar)
</x-app-layout>