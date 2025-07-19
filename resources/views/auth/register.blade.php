<x-guest-layout>
            <div class="flex flex-col items-center mb-6">
                <h2 class="text-2xl font-bold text-blue-700 mb-2">E-Library</h2>
                <p class="text-gray-600 text-center">Daftar untuk akses ke dashboard perpustakaan.</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-blue-600 hover:text-blue-800 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-white text-blue-700 border border-blue-700 rounded-full font-semibold shadow hover:bg-blue-700 hover:text-white transition">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
</x-guest-layout>
