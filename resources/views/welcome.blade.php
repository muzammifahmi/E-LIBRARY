<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIQ Library - Modern Perpustakaan Pesantren</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-white text-gray-900 flex flex-col min-h-screen">

    {{-- Header Navigation --}}
    <header class="w-full fixed top-0 left-0 z-50 bg-white shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center gap-2">
                <a href="/">
                    <img src="images/LOGO PIQ.png" alt="" class="w-12 h-12">
                </a>
                <span class="text-xl font-bold text-blue-700">PIQ Library</span>
            </div>
            @if (Route::has('login'))
                <nav class="space-x-2">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 bg-white text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 bg-white text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 bg-white text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    {{-- Hero Section --}}
<section class="flex items-center justify-center min-h-screen bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-3xl w-full text-center px-4">
        <h1 class="text-5xl font-extrabold mb-6 text-blue-800 leading-tight">
            أهلاً وسهلاً بكم في المكتبة لمعهد الدراسات القرآنية
        </h1>
    </div>
</section>


    {{-- Features Section --}}
    <section class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-center mb-10 text-blue-800">Kelebihan PIQ Library</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white border border-gray-200 rounded-lg shadow p-8 flex flex-col items-center">
                <svg class="w-10 h-10 text-blue-600 mb-4" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M12 20l9-5-9-5-9 5 9 5z" />
                    <path d="M12 12V4" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">Manajemen Buku Mudah</h3>
                <p class="text-gray-600 text-center">Tambah, edit, dan cari koleksi buku dengan cepat dan efisien.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg shadow p-8 flex flex-col items-center">
                <svg class="w-10 h-10 text-blue-600 mb-4" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 6v6l4 2" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">Laporan Otomatis</h3>
                <p class="text-gray-600 text-center">Dapatkan laporan statistik perpustakaan secara real-time.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-lg shadow p-8 flex flex-col items-center">
                <svg class="w-10 h-10 text-blue-600 mb-4" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M5 12h14" />
                    <path d="M12 5l7 7-7 7" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">Akses Online 24/7</h3>
                <p class="text-gray-600 text-center">Akses data perpustakaan kapan saja dan di mana saja.</p>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-center mb-10 text-blue-800">ANGGOTA PERPUSTAKAAN PERIODE {{ date('Y') }} - {{ date('Y', strtotime('+1 year')) }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($anggotas as $a)
                <div class="bg-white border border-gray-200 rounded-lg shadow p-8 flex flex-col items-center">
                    <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->name }}"
                        class="w-20 h-20 rounded-full object-cover mb-4 border-4 border-blue-200 shadow">
                    <h3 class="text-xl font-semibold mb-2">{{ $a->name }}</h3>
                    <p class="text-gray-600 mb-1">Tahun Masuk: <span class="font-semibold">{{ $a->year_joined }}</span>
                    </p>
                    <p class="text-gray-600">Jabatan: <span class="font-semibold">{{ ucfirst($a->position) }}</span>
                    </p>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-400 py-16 text-lg">
                    Tidak ada anggota.
                </div>
            @endforelse
        </div>
    </section>

    {{-- Footer --}}
    <footer class="w-full bg-blue-50 text-center py-6 mt-auto">
        <p class="text-gray-600">&copy; {{ date('Y') }} PIQ Library. All rights reserved.</p>
    </footer>
</body>

</html>
