<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('MANAJEMEN ARTIKEL') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">
                <div class="flex justify-between items-center mb-10">
                    <h2 class="text-3xl font-extrabold text-green-700 tracking-tight">Daftar Artikel</h2>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('article.create') }}"
                            class="px-7 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">
                            + Tambah Artikel
                        </a>
                        <a href="{{route('categories.index')}}"
                            class="px-7 py-2 bg-gradient-to-r from-blue-500 to-blue-700 text-white rounded-full font-semibold shadow-md hover:from-blue-600 hover:to-blue-800 transition text-base">
                            Kategori Artikel
                        </a>
                    </div>
                </div>

                {{-- Responsive Grid Layout --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($articles as $article)
                        <div
                            class="bg-white border border-green-200 rounded-2xl shadow-lg p-6 flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">

                            {{-- Gambar Artikel --}}
                            @if($article->image)
                                <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}"
                                    class="w-full h-48 object-cover mb-5 rounded-lg shadow">
                            @else
                                <div class="w-full h-48 flex items-center justify-center bg-gray-100 mb-5 rounded-lg text-gray-400">
                                    Tidak ada gambar
                                </div>
                            @endif

                            {{-- Konten Teks --}}
                            <div class="flex-grow">
                                <h5 class="font-bold text-xl text-green-800 mb-2">{{ $article->title }}</h5>
                                <p class="text-gray-600 mb-4">Kategori: <span
                                        class="font-semibold bg-green-100 text-green-800 px-2 py-1 rounded-md text-sm">{{ $article->category->name ?? '-' }}</span>
                                </p>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="flex gap-3 mt-auto">
                                <a href="{{ route('article.show', $article->id) }}"
                                    class="w-full text-center px-4 py-2 bg-blue-500 text-white rounded-lg font-semibold shadow hover:bg-blue-600 transition text-sm">
                                    Baca
                                </a>
                                <a href="{{ route('article.edit', $article->id) }}"
                                    class="w-full text-center px-4 py-2 bg-yellow-400 text-white rounded-lg font-semibold shadow hover:bg-yellow-500 transition text-sm">Edit</a>

                                <form action="{{ route('article.destroy', $article->id) }}" method="POST"
                                    class="w-full form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full text-center px-4 py-2 bg-red-600 text-white rounded-lg font-semibold shadow hover:bg-red-700 transition text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        {{-- Tampilan jika tidak ada artikel --}}
                        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-400 py-16 text-lg">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada artikel</h3>
                            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan artikel baru.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.form-delete');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Mencegah form untuk submit secara langsung

                    alertify.confirm('Konfirmasi Hapus',
                        'Apakah Anda yakin ingin menghapus artikel ini?',
                        function() {
                            // Jika pengguna klik 'OK', submit form
                            form.submit();
                        },
                        function() {
                            // Jika pengguna klik 'Cancel'
                            alertify.error('Hapus dibatalkan');
                        }
                    ).set('labels', {
                        ok: 'Ya, Hapus!',
                        cancel: 'Batal'
                    });
                });
            });
        });
    </script>
</x-app-layout>
