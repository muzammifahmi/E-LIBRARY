<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ isset($anggota) ? 'Edit Anggota' : 'Tambah Anggota' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">
                <form action="{{ isset($anggota) ? route('anggota.update', $anggota->id) : route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($anggota)) @method('PUT') @endif

                    {{-- Input Nama --}}
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $anggota->name ?? '') }}"
                            class="w-full px-4 py-2 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tahun Masuk --}}
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">Tahun Masuk</label>
                        <input type="number" name="year_joined" value="{{ old('year_joined', $anggota->year_joined ?? '') }}"
                            class="w-full px-4 py-2 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                        @error('year_joined') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">Jabatan</label>
                        <select name="position"
                            class="w-full px-4 py-2 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            @foreach($positions as $pos)
                                <option value="{{ $pos }}" @if(old('position', $anggota->position ?? '') == $pos) selected @endif>
                                    {{ ucfirst($pos) }}
                                </option>
                            @endforeach
                        </select>
                        @error('position') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Upload Foto --}}
                    <div class="mb-5">
                        <label class="block text-gray-700 font-semibold mb-2">Foto</label>
                        <input type="file" name="image"
                            class="w-full px-4 py-2 border border-green-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                        @if(isset($anggota) && $anggota->image)
                            <img src="{{ asset('storage/' . $anggota->image) }}" alt="Foto" class="w-24 h-24 mt-4 rounded-full object-cover border-2 border-green-400 shadow">
                        @endif
                        @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tombol Submit --}}
                    <div class="flex justify-end mt-8">
                        <a href="{{ route('anggota.index') }}"
                            class="px-6 py-2 bg-gray-300 text-gray-800 rounded-full shadow hover:bg-gray-400 transition mr-3">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-6 py-2 bg-green-600 text-white rounded-full shadow hover:bg-green-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
