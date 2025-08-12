@php
    $layout = auth()->check() ? 'app-layout' : 'guest-layout';
@endphp

<x-dynamic-component :component="$layout">
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ $article->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl overflow-hidden border border-green-100">
                {{-- Gambar Artikel --}}
                @if ($article->image)
                    <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}"
                        class="w-full max-h-[450px] object-cover shadow">
                @endif

                {{-- Konten --}}
                <div class="p-10">
                    <div class="prose max-w-none mb-8 text-gray-800">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <div class="flex items-center gap-3 mb-8">
                        <span class="font-semibold text-sm text-gray-700">Kategori:</span>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">
                            {{ optional($article->category)->name ?? '-' }}
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('article.index') }}"
                            class="px-6 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white text-sm font-semibold rounded-full shadow-md hover:from-green-600 hover:to-green-800 transition">
                            ← Kembali ke Daftar Artikel
                        </a>

                        @auth
                            <a href="{{ route('article.edit', $article->id) }}"
                                class="px-6 py-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white text-sm font-semibold rounded-full shadow-md hover:from-yellow-500 hover:to-yellow-600 transition">
                                ✏ Edit Artikel
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dynamic-component>
