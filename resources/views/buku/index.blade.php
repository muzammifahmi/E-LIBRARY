<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('DATA BUKU PERPUSTAKAAN') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-extrabold text-green-700 tracking-tight">Daftar Buku</h2>
                    <form action="{{ route('buku.index') }}" method="GET" class="flex items-center gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari judul / penulis / penerbit"
                            class="px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-green-400 text-sm w-64">
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-full font-semibold transition text-sm">
                            Cari
                        </button>
                    </form>
                    <a href="{{ route('buku.create') }}"
                        class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">
                        + Tambah Buku
                    </a>

                </div>

                @if ($bukus->isEmpty())
                    <div class="text-center text-gray-400 py-16 text-lg">
                        Tidak ada data buku.
                    </div>
                @else
                    <div class="overflow-x-auto">

                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-green-200 text-green-900 font-semibold">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Foto</th>
                                    <th class="py-3 px-4 border-b text-left">Kode Buku</th>
                                    <th class="py-3 px-4 border-b text-left">Judul</th>
                                    <th class="py-3 px-4 border-b text-left">Penulis</th>
                                    <th class="py-3 px-4 border-b text-left">Penerbit</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bukus as $buku)
                                    <tr class="hover:bg-green-50 transition">
                                        <td class="py-3 px-4 border-b">
                                            @if ($buku->foto)
                                                <img src="{{ asset('storage/' . $buku->foto) }}"
                                                    alt="{{ $buku->judul }}"
                                                    class="w-14 h-14 rounded object-cover border-2 border-green-400">
                                            @else
                                                <img src="https://via.placeholder.com/100"
                                                    class="w-14 h-14 rounded border border-gray-300 object-cover">
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 border-b">{{ $buku->kode_buku }}</td>
                                        <td class="py-3 px-4 border-b">{{ $buku->judul }}</td>
                                        <td class="py-3 px-4 border-b">{{ $buku->penulis }}</td>
                                        <td class="py-3 px-4 border-b">{{ $buku->penerbit }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('buku.edit', $buku->id) }}"
                                                    class="px-4 py-1 bg-yellow-400 text-white rounded-full text-sm font-semibold hover:bg-yellow-500 transition">Edit</a>
                                                <a href="{{ route('buku.show', $buku->id) }}"
                                                    class="px-4 py-1 bg-green-400 text-white rounded-full text-sm font-semibold hover:bg-green-500 transition">lihat</a>

                                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST"
                                                    class="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-4 py-1 bg-red-600 text-white rounded-full text-sm font-semibold hover:bg-red-700 transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.form-delete');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    alertify.confirm('Konfirmasi Hapus', 'Yakin ingin menghapus data buku ini?',
                        function() {
                            form.submit();
                            alertify.success('Data buku berhasil dihapus');
                        },
                        function() {
                            alertify.error('Dibatalkan');
                        });
                });
            });
        });
    </script>
</x-app-layout>
