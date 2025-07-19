<x-app-layout>
    {{-- Import Trix Editor --}}
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <x-slot name="header">
        <h2 class="font-bold text-2xl text-blue-700 leading-tight">
            {{ __('EDIT ARTIKEL') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">

                {{-- Form Edit --}}
                <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">

                        {{-- Judul --}}
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                            <input type="text" name="title" id="title" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                                value="{{ old('title', $article->title) }}">
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kategori --}}
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select name="category_id" id="category_id" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar --}}
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="image" id="image"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200">
                            @if ($article->image)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/articles/' . $article->image) }}" alt="Artikel Image" class="w-40 rounded mt-2">
                                </div>
                            @endif
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Isi Artikel --}}
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                            <div wire:ignore>
                                <input id="content" type="hidden" name="content" value="{{ old('content', $article->content) }}">
                                <trix-editor input="content"
                                    class="mt-1 block w-full bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                                </trix-editor>
                            </div>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center justify-end gap-4 mt-10">
                        <a href="{{ route('article.index') }}"
                            class="px-7 py-2 bg-gray-200 text-gray-700 rounded-full font-semibold shadow-md hover:bg-gray-300 transition text-base">
                            Batal
                        </a>
                        <button type="submit"
                            class="px-7 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">
                            Update Artikel
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
