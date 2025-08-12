<x-guest-layout>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-b from-blue-100 to-white pt-36 pb-20 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start w-full px-0">
            <div class="lg:col-span-2 text-center flex flex-col justify-center items-center w-full">
                <img src="images/LOGO.png" alt="Logo PIQ" class="w-32 h-32 object-contain drop-shadow mb-4">
                <h1 class="text-5xl font-extrabold text-blue-800 leading-tight mb-6 drop-shadow">
                    E-Library
                </h1>
                <p class="text-lg text-gray-600 max-w-xl text-center mb-8">
                    Platform perpustakaan digital modern untuk pesantren, dengan fitur lengkap, akses mudah, dan
                    tampilan profesional.
                </p>
            </div>
            <div class="bg-white border border-blue-100 rounded-2xl shadow-lg p-8 max-h-[500px] overflow-y-auto hide-scrollbar w-full lg:-mt-32">
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
    <section id="tentang" class="w-full py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-800">Kelebihan E-Library</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 w-full px-0">
            <div
                class="bg-white border border-blue-100 rounded-2xl shadow-lg p-10 flex flex-col items-center hover:shadow-2xl transition w-full">
                <svg class="w-12 h-12 text-blue-600 mb-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M12 20l9-5-9-5-9 5 9 5z" />
                    <path d="M12 12V4" />
                </svg>
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Manajemen Buku Mudah</h3>
                <p class="text-gray-600 text-center">Tambah, edit, dan cari koleksi buku dengan cepat dan efisien.</p>
            </div>
            <div
                class="bg-white border border-blue-100 rounded-2xl shadow-lg p-10 flex flex-col items-center hover:shadow-2xl transition w-full">
                <svg class="w-12 h-12 text-blue-600 mb-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 6v6l4 2" />
                </svg>
                <h3 class="text-xl font-semibold mb-2 text-blue-700">Laporan Otomatis</h3>
                <p class="text-gray-600 text-center">Dapatkan laporan statistik perpustakaan secara real-time.</p>
            </div>
            <div
                class="bg-white border border-blue-100 rounded-2xl shadow-lg p-10 flex flex-col items-center hover:shadow-2xl transition w-full">
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
    <section id="anggota" class="w-full py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-800">
            ANGGOTA PERPUSTAKAAN PERIODE {{ date('Y') }} - {{ date('Y', strtotime('+1 year')) }}
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 w-full px-0">
            @forelse($anggotas as $a)
                <div
                    class="bg-white border border-blue-100 rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-2xl transition w-full">
                    <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->name }}"
                        class="w-24 h-24 rounded-full object-cover mb-4 border-4 border-blue-200 shadow">
                    <h3 class="text-xl font-bold text-blue-800 mb-1 text-center">{{ $a->name }}</h3>
                    <p class="text-gray-600 mb-1">Tahun Masuk: <span class="font-semibold">{{ $a->year_joined }}</span>
                    </p>
                    <p class="text-gray-600">Jabatan: <span class="font-semibold">{{ ucfirst($a->position) }}</span></p>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-400 py-16 text-lg">
                    Tidak ada anggota.
                </div>
            @endforelse
        </div>
    </section>
</x-guest-layout>
