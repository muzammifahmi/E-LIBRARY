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
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-extrabold text-green-700 tracking-tight">Daftar Anggota</h2>
                    <a href="{{ route('anggota.create') }}"
                        class="px-7 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">
                        + Tambah Anggota
                    </a>
                </div>

                @if($anggotas->isEmpty())
                    <div class="text-center text-gray-400 py-16 text-lg">
                        Tidak ada anggota.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-green-200 text-green-900 font-semibold">
                                <tr>
                                    <th class="py-3 px-4 border-b text-left">Foto</th>
                                    <th class="py-3 px-4 border-b text-left">Nama</th>
                                    <th class="py-3 px-4 border-b text-left">Tahun Masuk</th>
                                    <th class="py-3 px-4 border-b text-left">Jabatan</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggotas as $a)
                                    <tr class="hover:bg-green-50 transition">
                                        <td class="py-3 px-4 border-b">
                                            <img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->name }}"
                                                class="w-14 h-14 rounded-full object-cover border-2 border-green-400">
                                        </td>
                                        <td class="py-3 px-4 border-b">{{ $a->name }}</td>
                                        <td class="py-3 px-4 border-b">{{ $a->year_joined }}</td>
                                        <td class="py-3 px-4 border-b">{{ ucfirst($a->position) }}</td>
                                        <td class="py-3 px-4 border-b text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('anggota.edit', $a->id) }}"
                                                    class="px-4 py-1 bg-yellow-400 text-white rounded-full text-sm font-semibold hover:bg-yellow-500 transition">Edit</a>

                                                <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" class="form-delete">
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
