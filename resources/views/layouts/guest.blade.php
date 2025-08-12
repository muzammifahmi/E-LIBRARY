<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PIQ LIBRARY') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Hilangkan scrollbar */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gradient-to-b from-blue-50 to-white min-h-screen flex flex-col">

    {{-- Navbar (tetap di atas) --}}
    <div class="fixed top-0 left-0 w-full z-50 bg-white shadow">
        @include('layouts.nav')
    </div>

    {{-- Header --}}
    @isset($header)
        <header class="bg-white shadow mt-[72px]"> {{-- Tinggi ini disesuaikan dengan navbar --}}
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Konten Utama --}}
    <main class="flex flex-1 flex-col w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 {{ !isset($header) ? 'mt-[72px]' : '' }}">
        <div class="w-full bg-white shadow-lg rounded-2xl p-6">
            {{ $slot }}
        </div>
    </main>

    {{-- Footer --}}
    <footer class="w-full bg-blue-50 text-center py-6 border-t border-blue-100 mt-auto">
        <p class="text-gray-600 text-sm">
            &copy; {{ date('Y') }} <span class="font-bold text-blue-700">E-Library</span>. All rights reserved.
        </p>
    </footer>

    {{-- Contact Component --}}
    @include('components.contact')

</body>
</html>
