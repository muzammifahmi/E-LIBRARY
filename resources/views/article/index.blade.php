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
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-green-200 shadow rounded-xl overflow-hidden">
        <thead class="bg-green-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-bold text-green-800 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-green-800 uppercase tracking-wider">Gambar</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-green-800 uppercase tracking-wider">Judul</th>
                <th class="px-6 py-3 text-left text-sm font-bold text-green-800 uppercase tracking-wider">Kategori</th>
                <th class="px-6 py-3 text-center text-sm font-bold text-green-800 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-green-100">
            @forelse ($articles as $index => $article)
                <tr class="hover:bg-green-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        @if($article->image)
                            <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}" class="w-16 h-16 rounded object-cover">
                        @else
                            <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-semibold text-green-800">{{ $article->title }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-md text-xs">
                            {{ $article->category->name ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('article.show', $article->id) }}"
                                class="px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-600 text-xs">Baca</a>
                            <a href="{{ route('article.edit', $article->id) }}"
                                class="px-3 py-1 bg-yellow-400 text-white rounded shadow hover:bg-yellow-500 text-xs">Edit</a>
                            <form action="{{ route('article.destroy', $article->id) }}" method="POST" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 text-xs">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-10">
                        Tidak ada artikel. <br><span class="text-sm text-gray-400">Tambahkan artikel baru untuk mulai.</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.form-delete');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    alertify.confirm('Konfirmasi Hapus', 'Yakin ingin menghapus data ini?',
                        function () {
                            form.submit();
                            alertify.success('Data Berhasil dihapus');
                        },
                        function () {
                            alertify.error('Dibatalkan');
                        });
                });
            });
        });
    </script>
</x-app-layout>
