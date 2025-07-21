<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ isset($buku) ? 'Edit Data Buku' : 'Tambah Data Buku' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 shadow-xl rounded-2xl p-10">
                <form action="{{ isset($buku) ? route('buku.update', $buku->id) : route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($buku)) @method('PUT') @endif

                    <div class="mb-5">
                        <label class="block font-semibold mb-1 text-gray-700">Kode Buku</label>
                        <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-1 text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $buku->judul ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-1 text-gray-700">Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-1 text-gray-700">Penerbit</label>
                        <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit ?? '') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label class="block font-semibold mb-1 text-gray-700">Foto Buku</label>
                        <input type="file" name="foto"
                            class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm">
                        @if(isset($buku) && $buku->foto)
                            <img src="{{ asset('storage/'.$buku->foto) }}" alt="Preview" class="mt-3 w-24 h-24 rounded object-cover border">
                        @endif
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('buku.index') }}"
                            class="mr-4 px-5 py-2 bg-gray-300 text-gray-800 rounded-full hover:bg-gray-400 transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition">
                            {{ isset($buku) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
