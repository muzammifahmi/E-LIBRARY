<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <h2 class="font-bold text-2xl text-blue-700 leading-tight">
                {{ __('Profil Pengguna') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-blue-50 to-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8 space-y-8">
                <h3 class="text-xl font-semibold text-blue-800">Halo, {{ Auth::user()->name }}!</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Form Update Profil --}}
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                        <h4 class="font-semibold text-blue-600 mb-4">Ubah Informasi Profil</h4>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    {{-- Form Update Password --}}
                    <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                        <h4 class="font-semibold text-blue-600 mb-4">Ubah Password</h4>
                        @include('profile.partials.update-password-form')
                    </div>

                    {{-- Form Hapus Akun --}}
                    <div class="bg-white border border-red-200 rounded-lg shadow p-6 col-span-1 md:col-span-2">
                        <h4 class="font-semibold text-red-600 mb-4">Hapus Akun</h4>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
