<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ isset($buku) ? 'Edit Buku' : 'Tambah Buku' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">

                {{-- Tampilkan error validasi --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($buku) ? route('buku.update', $buku) : route('buku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($buku)) @method('PUT') @endif

                    <div class="mb-5">
                        <label for="kode_buku" class="block font-medium text-gray-700 mb-1">Kode Buku</label>
                        <input type="text" id="kode_buku" name="kode_buku"
                            value="{{ old('kode_buku', $buku->kode_buku ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <div class="mb-5">
                        <label for="judul" class="block font-medium text-gray-700 mb-1">Judul</label>
                        <input type="text" id="judul" name="judul"
                            value="{{ old('judul', $buku->judul ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <div class="mb-5">
                        <label for="penulis" class="block font-medium text-gray-700 mb-1">Penulis</label>
                        <input type="text" id="penulis" name="penulis"
                            value="{{ old('penulis', $buku->penulis ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <div class="mb-5">
                        <label for="penerbit" class="block font-medium text-gray-700 mb-1">Penerbit</label>
                        <input type="text" id="penerbit" name="penerbit"
                            value="{{ old('penerbit', $buku->penerbit ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                    </div>

                    <div class="mb-5">
                        <label for="foto" class="block font-medium text-gray-700 mb-1">Foto Buku</label>
                        <input type="file" id="foto" name="foto" accept="image/*"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400">
                        @if(isset($buku) && $buku->foto)
                            <img src="{{ asset('storage/' . $buku->foto) }}" class="mt-3 w-24 h-24 object-cover rounded border-2 border-green-400">
                        @endif
                    </div>

                    <div class="flex justify-end mt-8">
                        <a href="{{ route('buku.index') }}"
                            class="px-6 py-2 mr-3 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-full font-semibold transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-full font-semibold transition">
                            {{ isset($buku) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
