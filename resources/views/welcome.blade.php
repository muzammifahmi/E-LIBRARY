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

    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .hide-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body class="bg-white text-gray-900 flex flex-col min-h-screen font-sans">

    {{-- Header Navigation --}}
    <header class="w-full fixed top-0 left-0 z-50 bg-white shadow transition-shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center gap-2">
                <a href="/">
                    <img src="images/LOGO PIQ.png" alt="Logo PIQ" class="w-12 h-12 drop-shadow">
                </a>
                <span class="text-2xl font-extrabold text-blue-700 tracking-tight">PIQ Library</span>
            </div>
            @if (Route::has('login'))
                <nav class="space-x-2">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition font-semibold">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 bg-white text-blue-600 border border-blue-600 rounded shadow hover:bg-blue-600 hover:text-white transition font-semibold">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 bg-blue-50 text-blue-700 border border-blue-600 rounded shadow hover:bg-blue-600 hover:text-white transition font-semibold">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="bg-gradient-to-b from-blue-50 to-white pt-36 pb-20 px-6">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            {{-- Tulisan Arab --}}
            <div class="lg:col-span-2 text-center lg:text-left flex flex-col justify-center">
                <h1 class="text-5xl font-extrabold text-blue-800 leading-tight mb-6 drop-shadow">
                    أهلاً وسهلاً بكم في المكتبة لمعهد الدراسات القرآنية
                </h1>
                <p class="text-lg text-gray-600 max-w-xl mx-auto lg:mx-0 mb-8">
                    Platform perpustakaan digital modern untuk pesantren, dengan fitur lengkap, akses mudah, dan tampilan profesional.
                </p>
            </div>
            {{-- Artikel Terbaru --}}
            <div class="bg-white border border-blue-100 rounded-2xl shadow-lg p-8 max-h-[500px] overflow-y-auto hide-scrollbar">
                <h3 class="text-xl font-bold text-blue-700 mb-4">Artikel Terbaru</h3>
                @forelse($articles as $article)
                    <div class="mb-6 border-b pb-4 last:border-b-0 last:pb-0">
                        <h4 class="text-lg font-semibold text-gray-800 mb-1">{{ $article->title }}</h4>
                        <p class="text-sm text-gray-500 mb-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 60) }}
                        </p>
                        <a href="{{ route('article.show', $article->id) }}"
                            class="text-sm text-blue-600 hover:underline font-semibold">Baca Selengkapnya</a>
                    </div>
                @empty
                    <p class="text-gray-400 text-sm">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-800">Kelebihan PIQ Library</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-white border border-blue-100 rounded-2xl shadow-lg p-10 flex flex-col items-center hover:shadow-2xl transition">
                <svg class="w-12 h-12 text-blue-600 mb-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M12 20l9-5-9-5-9 5 9 5z" />
                    <path d="M12 12V4" />
                </svg>
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Manajemen Buku Mudah</h3>
                <p class="text-gray-600 text-center">Tambah, edit, dan cari koleksi buku dengan cepat dan efisien.</p>
            </div>
            <div class="bg-white border border-blue-100 rounded-2xl shadow-lg p-10 flex flex-col items-center hover:shadow-2xl transition">
                <svg class="w-12 h-12 text-blue-600 mb-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 6v6l4 2" />
                </svg>
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Laporan Otomatis</h3>
                <p class="text-gray-600 text-center">Dapatkan laporan statistik perpustakaan secara real-time.</p>
            </div>
            <div class="bg-white border border-blue-100 rounded-2xl shadow-lg p-10 flex flex-col items-center hover:shadow-2xl transition">
                <svg class="w-12 h-12 text-blue-600 mb-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M5 12h14" />
                    <path d="M12 5l7 7-7 7" />
                </svg>
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Akses Online 24/7</h3>
                <p class="text-gray-600 text-center">Akses data perpustakaan kapan saja dan di mana saja.</p>
            </div>
        </div>
    </section>

    {{-- Anggota Perpustakaan --}}
    <section class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-800">
            ANGGOTA PERPUSTAKAAN PERIODE {{ date('Y') }} - {{ date('Y', strtotime('+1 year')) }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @forelse($anggotas as $a)
                <div class="bg-white border border-blue-100 rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-2xl transition">
                    <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->name }}"
                        class="w-24 h-24 rounded-full object-cover mb-4 border-4 border-blue-200 shadow">
                    <h3 class="text-xl font-bold text-blue-800 mb-1">{{ $a->name }}</h3>
                    <p class="text-gray-600 mb-1">Tahun Masuk: <span class="font-semibold">{{ $a->year_joined }}</span>
                    </p>
                    <p class="text-gray-600">Jabatan: <span class="font-semibold">{{ ucfirst($a->position) }}</span>
                    </p>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-400 py-16 text-lg">
                    Tidak ada anggota.
                </div>
            @endforelse
        </div>
    </section>

    {{-- Footer --}}
    <footer class="w-full bg-blue-50 text-center py-6 mt-auto border-t border-blue-100">
        <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} <span class="font-bold text-blue-700">PIQ Library</span>. All rights reserved.</p>
    </footer>
</body>

</html>
