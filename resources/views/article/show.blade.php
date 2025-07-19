<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ $article->title }}
            </h2>
        </div>
    </x-slot>
    <div class="max-w-3xl mx-auto py-12">
        <div class="bg-white rounded-2xl shadow-xl p-0">
            @if ($article->image)
                <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}"
                    class="w-full h-64 object-cover rounded-t-2xl mb-0">
            @endif
            <div class="p-8 pt-6">
                <div class="prose max-w-none mb-4">
                    {!! nl2br($article->content) !!}
                </div>
                <p class="text-gray-600 mb-4">Kategori: <span
                        class="font-semibold bg-green-100 text-green-800 px-2 py-1 rounded-md text-sm">{{ $article->category->name ?? '-' }}</span>
                </p>
                <a href="{{ route('article.index') }}"
                    class="inline-block mt-8 px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition">Kembali
                    ke Daftar Artikel</a>
            </div>
        </div>
    </div>
</x-app-layout>
