<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div id="app" class="min-h-screen bg-gray-100">
{{--    @include('layouts.navigation')--}}

    <!-- Page Heading -->
    @if($header ?? '')
        <header class="bg-white shadow">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="bg-chat">
        {{ $slot }}
    </main>
</div>
</body>
</html>
