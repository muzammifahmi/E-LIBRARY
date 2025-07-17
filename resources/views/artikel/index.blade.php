{{-- filepath: d:\RAHASIA\belajar\laravel\fahmi\resources\views\artikel\artikel.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('MEDIA LITERASI') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-blue-50 to-white min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                {{-- Statistik --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-blue-100 rounded-lg p-6 flex flex-col items-center">
                        <div class="text-gray-600 text-sm mb-2">Total Artikel</div>
                        <div class="text-3xl font-bold text-blue-700">
                            {{ $totalArtikel ?? 2 }}
                        </div>
                    </div>
                    <div class="bg-yellow-100 rounded-lg p-6 flex flex-col items-center">
                        <div class="text-gray-600 text-sm mb-2">Total Kategori</div>
                        <div class="text-3xl font-bold text-yellow-700">
                            {{ $totalKategori ?? 3 }}
                        </div>
                    </div>
                </div>
                {{-- Menu --}}
                <div class="flex gap-2 mb-8">
                    <a href="#" class="px-6 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">
                        Tambah Artikel
                    </a>
                    <a href="#daftar-artikel" class="px-6 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">
                        Lihat Artikel
                    </a>
                </div>
                {{-- Daftar Artikel --}}
                <h3 id="daftar-artikel" class="text-xl font-semibold text-blue-800 mb-6">Daftar Artikel</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Contoh artikel 1 -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg shadow p-6 flex flex-col">
                        <h4 class="font-bold text-lg text-blue-700 mb-2">Pentingnya Literasi di Pesantren</h4>
                        <p class="text-gray-700 mb-4">Literasi adalah kunci kemajuan santri dan pesantren. Dengan membaca, wawasan dan pengetahuan semakin luas.</p>
                        <a href="#" class="self-start px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Baca Selengkapnya</a>
                    </div>
                    <!-- Contoh artikel 2 -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg shadow p-6 flex flex-col">
                        <h4 class="font-bold text-lg text-blue-700 mb-2">Tips Mengelola Koleksi Buku</h4>
                        <p class="text-gray-700 mb-4">Pengelolaan koleksi buku yang baik akan memudahkan pencarian dan peminjaman oleh anggota perpustakaan.</p>
                        <a href="#" class="self-start px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Baca Selengkapnya</a>
                    </div>
                    <div class="bg-blue-50 border border-blue-100 rounded-lg shadow p-6 flex flex-col">
                        <h4 class="font-bold text-lg text-blue-700 mb-2">Tips Mengelola Koleksi Buku</h4>
                        <p class="text-gray-700 mb-4">Pengelolaan koleksi buku yang baik akan memudahkan pencarian dan peminjaman oleh anggota perpustakaan.</p>
                        <a href="#" class="self-start px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Baca Selengkapnya</a>
                    </div>
                    <!-- Tambahkan artikel lain di sini -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
