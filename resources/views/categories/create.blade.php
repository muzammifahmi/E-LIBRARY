<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-700 leading-tight">
            {{ __('TAMBAH KATEGORI') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 p-8 shadow-xl rounded-2xl">

                {{-- Tampilkan Error Validasi --}}
                @if ($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <strong>Whoops!</strong> Ada masalah dengan input Anda:
                        <ul class="mt-2 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form Tambah --}}
                <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700">Nama Kategori</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Masukkan nama kategori" value="{{ old('name') }}" required>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('categories.index') }}"
                            class="px-5 py-2 bg-gray-400 text-white rounded-full font-semibold shadow hover:bg-gray-500 transition">
                            Kembali
                        </a>
                        <button type="submit"
                            class="px-5 py-2 bg-green-600 text-white rounded-full font-semibold shadow hover:bg-green-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
