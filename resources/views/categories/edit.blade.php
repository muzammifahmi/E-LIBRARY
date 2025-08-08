<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-700 leading-tight">
            {{ __('EDIT KATEGORI') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">

                {{-- Form Edit --}}
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">

                        {{-- Nama Kategori --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                            <input type="text" name="name" id="name" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                                value="{{ old('name', $category->name) }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-end">
                            <a class="px-7 py-2 bg-gray-200 text-gray-700 rounded-full font-semibold shadow-md hover:bg-gray-300 transition text-base" href="{{ route('categories.index') }}"> Kembali</a>
                            <button type="submit" class="px-7 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>



