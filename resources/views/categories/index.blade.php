<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('KATEGORI ARTIKEL') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-green-100 to-white min-h-screen font-sans">
        {{-- Container Full Width --}}
        <div class="w-full px-4 sm:px-6 lg:px-10">
            <div class="bg-white/80 shadow-xl rounded-2xl p-6 sm:p-10">

                {{-- Flash Messages --}}
                @if ($message = Session::get('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 border border-green-300 rounded">
                        {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 border border-red-300 rounded">
                        {{ $message }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-3xl font-extrabold text-green-700 tracking-tight">Daftar Kategori</h2>
                    <a href="{{ route('categories.create') }}"
                        class="px-7 py-2 bg-gradient-to-r from-green-500 to-green-700 text-white rounded-full font-semibold shadow-md hover:from-green-600 hover:to-green-800 transition text-base">
                        + Tambah Kategori
                    </a>
                </div>

                <div class="overflow-x-auto shadow rounded-lg">
                    <table class="w-full min-w-max divide-y divide-green-200 bg-white">
                        <thead class="bg-green-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Nama Kategori</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-green-100">
                            @forelse ($categories as $index => $category)
                                <tr class="hover:bg-green-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $category->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="px-4 py-1 bg-yellow-400 text-white rounded-full text-sm font-semibold shadow hover:bg-yellow-500 transition">
                                                Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                class="form-delete inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-1 bg-red-600 text-white rounded-full text-sm font-semibold shadow hover:bg-red-700 transition">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-6 text-center text-gray-400">
                                        Tidak ada kategori.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-6">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- AlertifyJS Delete Confirmation --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.form-delete');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    alertify.confirm('Konfirmasi Hapus', 'Yakin ingin menghapus kategori ini?',
                        function () {
                            form.submit();
                            alertify.success('Kategori berhasil dihapus');
                        },
                        function () {
                            alertify.error('Dibatalkan');
                        });
                });
            });
        });
    </script>
</x-app-layout>
