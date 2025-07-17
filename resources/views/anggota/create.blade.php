<x-app-layout>
            <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('ANGGOTA PERPUSTAKAAN') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">
                <h2 class="text-3xl font-extrabold text-green-700 tracking-tight mb-8">
                    {{ isset($anggota) ? 'Edit' : 'Tambah' }} Anggota
                </h2>
                <form action="{{ isset($anggota) ? route('anggota.update', $anggota->id) : route('anggota.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @if(isset($anggota)) @method('PUT') @endif

                    <div>
                        <label class="block font-semibold text-green-800 mb-1">Nama:</label>
                        <input type="text" name="name" value="{{ old('name', $anggota->name ?? '') }}"
                            class="w-full px-4 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none shadow-sm">
                    </div>

                    <div>
                        <label class="block font-semibold text-green-800 mb-1">Tahun Masuk:</label>
                        <input type="number" name="year_joined" value="{{ old('year_joined', $anggota->year_joined ?? '') }}"
                            class="w-full px-4 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none shadow-sm">
                    </div>

                    <div>
                        <label class="block font-semibold text-green-800 mb-1">Jabatan:</label>
                        <select name="position"
                            class="w-full px-4 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none shadow-sm">
                            @foreach($positions as $pos)
                                <option value="{{ $pos }}" @if(old('position', $anggota->position ?? '') == $pos) selected @endif>{{ ucfirst($pos) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-green-800 mb-1">Foto:</label>
                        <input type="file" name="image"
                            class="w-full px-4 py-2 border border-green-200 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none shadow-sm">
                        @if(isset($anggota) && $anggota->image)
                            <img src="{{ asset('storage/' . $anggota->image) }}" width="100" class="mt-3 rounded-lg border border-green-200 shadow">
                        @endif
                    </div>

                    <button type="submit"
                        class="w-full px-6 py-3 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition duration-200">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>