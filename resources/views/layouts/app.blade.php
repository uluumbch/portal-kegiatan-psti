<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- trix editor --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- trix override --}}
        <style>
            /* Tailwind Override */
.trix-editor {
    width: 100%;
}

.trix-editor h1 {
    font-size: 1.25rem !important;
    line-height: 1.25rem !important;
    margin-bottom: 1rem;
    font-weight: 600;
}

.trix-editor a:not(.no-underline) {
    text-decoration: underline;
}

.trix-editor a:visited {
    color: green;
}

.trix-editor ul {
    list-style-type: disc;
    padding-left: 1rem;
}

.trix-editor ol {
    list-style-type: decimal;
    padding-left: 1rem;
}

.trix-editor pre {
    display: inline-block;
    width: 100%;
    vertical-align: top;
    font-family: monospace;
    font-size: 1.5em;
    padding: 0.5em;
    white-space: pre;
    background-color: #eee;
    overflow-x: auto;
}

.trix-editor blockquote {
    border: 0 solid #ccc;
    border-left-width: 0px;
    border-left-width: 0.3em;
    margin-left: 0.3em;
    padding-left: 0.6em;
}
.trix-button-row{
    color: #ccc !important;
}
html.dark .trix-button-row .trix-button-group{

        border-color: #0f172a;
    }
        .trix-button {
                background-color: #94a3b8;
                border-color: #0f172a;

        }


  .trix-content {
        background-color: #ffffff;
        border-color: #344155;}

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
