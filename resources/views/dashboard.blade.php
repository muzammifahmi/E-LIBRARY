<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('E-Library') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-blue-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h3 class="text-xl font-semibold text-blue-800 mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-700 mb-8">Anda berhasil login ke dashboard E-Library. Berikut fitur yang tersedia:</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 flex flex-col items-center">
                        <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 19h16M4 15h16M4 11h16M4 7h16" />
                        </svg>
                        <h4 class="font-semibold mb-2">Artikel</h4>
                        <p class="text-gray-600 text-center text-sm">Kelola dan baca artikel seputar perpustakaan dan literasi.</p>
                        <a href="{{ route('article.index') }}" class="mt-3 px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Lihat Artikel</a>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 flex flex-col items-center">
                        <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" /><path d="M6 20v-2a6 6 0 0 1 12 0v2" />
                        </svg>
                        <h4 class="font-semibold mb-2">Data Anggota</h4>
                        <p class="text-gray-600 text-center text-sm">Manajemen data anggota perpustakaan secara lengkap.</p>
                        <a href="{{ route('anggota.index') }}" class="mt-3 px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Lihat Anggota</a>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 flex flex-col items-center">
                        <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 19h16V5H4v14zm2-2h12V7H6v10z" />
                        </svg>
                        <h4 class="font-semibold mb-2">Data Buku</h4>
                        <p class="text-gray-600 text-center text-sm">Kelola data buku, tambah, edit, dan cari koleksi.</p>
                        <a href="{{route('buku.index')}}" class="mt-3 px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Lihat Buku</a>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 flex flex-col items-center">
                        <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="7" width="18" height="13" rx="2" /><path d="M16 3v4M8 3v4" />
                        </svg>
                        <h4 class="font-semibold mb-2">Data Pinjaman</h4>
                        <p class="text-gray-600 text-center text-sm">Pantau dan kelola data peminjaman buku anggota.</p>
                        <a href="#" class="mt-3 px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Lihat Pinjaman</a>
                    </div>
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6 flex flex-col items-center">
                        <svg class="w-8 h-8 text-blue-600 mb-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="4" y="4" width="16" height="16" rx="2" /><path d="M9 9h6v6H9z" />
                        </svg>
                        <h4 class="font-semibold mb-2">Inventaris</h4>
                        <p class="text-gray-600 text-center text-sm">Manajemen inventaris barang milik perpustakaan.</p>
                        <a href="#" class="mt-3 px-4 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition text-sm">Lihat Inventaris</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
