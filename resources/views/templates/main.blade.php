<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

{{-- check if ttitle exist then set title to that variabke --}}
    @isset($title)
        <title>{{ $title }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endisset

    <!-- Fonts -->

    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    @vite('resources/css/mybg.css')


    <!-- Styles -->

</head>

<body class="container mx-auto">
    {{-- navigation --}}
    @include('templates.navigation')

</body>

</html>
