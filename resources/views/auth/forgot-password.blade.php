<x-guest-layout>
            <div class="flex flex-col items-center mb-6">
                <h2 class="text-2xl font-bold text-blue-700 mb-2">PIQ Library</h2>
                <p class="text-gray-600 text-center">
                    {{ __('Lupa kata sandi? Tidak masalah. Cukup beri tahu kami alamat email Anda, dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi agar Anda dapat memilih yang baru.') }}
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit"
                        class="px-6 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>

</x-guest-layout>
