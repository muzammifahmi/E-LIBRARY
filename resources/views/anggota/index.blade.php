<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('ANGGOTA PERPUSTAKAAN') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 shadow-xl rounded-2xl p-10">
                <div class="flex justify-between items-center mb-10">
                    <h2 class="text-3xl font-extrabold text-green-700 tracking-tight">Daftar Anggota</h2>
                    <a href="{{ route('anggota.create') }}"
                        class="px-7 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">
                        + Tambah Anggota
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($anggotas as $a)
                        <div
                            class="bg-white border border-green-200 rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-2xl transition">
                            <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->name }}"
                                class="w-28 h-28 rounded-full object-cover mb-5 border-4 border-green-300 shadow">
                            <h5 class="font-bold text-xl text-green-800 mb-2">{{ $a->name }}</h5>
                            <p class="text-gray-600 mb-1">Tahun Masuk: <span
                                    class="font-semibold">{{ $a->year_joined }}</span></p>
                            <p class="text-grayname: -600 mb-5">Jabatan: <span
                                    class="font-semibold">{{ ucfirst($a->position) }}</span></p>
                            <div class="flex gap-3">
                                <a href="{{ route('anggota.edit', $a->id) }}"
                                    class="px-5 py-2 bg-yellow-400 text-white rounded-full font-semibold shadow hover:bg-yellow-500 transition text-sm">Edit</a>
                                <form action="{{ route('anggota.destroy', $a->id) }}" method="POST"
                                    class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-5 py-2 bg-red-600 text-white rounded-full font-semibold shadow hover:bg-red-700 transition text-sm">
                                        Hapus
                                    </button>
                                </form>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const deleteForms = document.querySelectorAll('.form-delete');

                                        deleteForms.forEach(form => {
                                            form.addEventListener('submit', function(e) {
                                                e.preventDefault();

                                                alertify.confirm('Konfirmasi Hapus', 'Yakin ingin menghapus data ini?',
                                                    function() {
                                                        form.submit();
                                                        alertify.success('Data Berhasil dihapus');
                                                    },
                                                    function() {
                                                        alertify.error('Dibatalkan');
                                                    });
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-400 py-16 text-lg">
                            Tidak ada anggota.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
