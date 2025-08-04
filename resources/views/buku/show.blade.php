<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                Detail Buku
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 shadow-xl rounded-2xl p-10">
                <div class="flex flex-col md:flex-row gap-10 items-start">
                    {{-- Gambar Buku --}}
                    <div class="w-full md:w-1/3">
                        @if ($buku->foto)
                            <img src="{{ asset('storage/' . $buku->foto) }}"
                                 class="w-full h-auto rounded-xl border-2 border-green-500 shadow-md object-cover"
                                 alt="{{ $buku->judul }}">
                        @else
                            <img src="https://via.placeholder.com/200x300?text=No+Image"
                                 class="w-full h-auto rounded-xl border shadow-sm object-cover"
                                 alt="No Image">
                        @endif
                    </div>

                    {{-- Informasi Buku --}}
                    <div class="flex-1 space-y-4">
                        <div>
                            <h3 class="text-xl font-bold text-green-700">Kode Buku</h3>
                            <p class="text-gray-700">{{ $buku->kode_buku }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-green-700">Judul</h3>
                            <p class="text-gray-700">{{ $buku->judul }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-green-700">Penulis</h3>
                            <p class="text-gray-700">{{ $buku->penulis }}</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-green-700">Penerbit</h3>
                            <p class="text-gray-700">{{ $buku->penerbit }}</p>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-10 flex justify-end gap-4">
                    <a href="{{ route('buku.index') }}"
                        class="px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-full font-semibold transition">
                        Kembali
                    </a>
                    <a href="{{ route('buku.edit', $buku->id) }}"
                        class="px-6 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-full font-semibold transition">
                        Edit
                    </a>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="form-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-full font-semibold transition">
                            Hapus
                        </button>
                    </form>
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
                    alertify.confirm('Konfirmasi Hapus', 'Yakin ingin menghapus buku ini?',
                        function () {
                            form.submit();
                            alertify.success('Buku berhasil dihapus');
                        },
                        function () {
                            alertify.error('Dibatalkan');
                        });
                });
            });
        });
    </script>
</x-app-layout>
