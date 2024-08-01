<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<div class="flex h-screen">
    <!-- Left Pane -->

    <div class="hidden lg:flex items-center justify-center flex-1 text-black  bg-welcome"></div>

    <!-- Right Pane -->

    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center">
        <div class="max-w-md w-full p-6">
            <header class="mb-4">
                <h1 class="text-4xl font-bold text-center mb-10 text-[#BB78D9]">Chat App</h1>
                <p class="text-center text-gray-600">Test application with real-time chat using Laravel, Laravel Reverb,
                    Echo and Vue.js 3</p>
            </header>
            <nav class="flex justify-center space-x-4 mb-10">
                <a href="{{route('login')}}"
                   class="text-[#BB78D9] hover:underline hover:text-purple-950 text-lg">Login</a>
                <a href="{{route('register')}}" class="text-[#BB78D9] hover:underline hover:text-purple-950 text-lg">Register</a>
            </nav>
            <div class="flex-1 flex flex-col justify-center items-center">
                <p class="text-gray-600 text-center">Welcome to our real-time chat application.</p>
                <p class="text-gray-600 text-center">Please login or register to start using the application.</p>
            </div>
        </div>
    </div>

</div>
</body>
</html>
