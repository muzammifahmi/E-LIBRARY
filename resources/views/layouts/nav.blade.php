    {{-- Header Navigation --}}
    <header class="w-full fixed top-0 left-0 z-50 bg-white shadow transition-shadow">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-4">
            <div class="flex items-center gap-3 overflow-hidden">
                <a href="/" class="flex items-center">
                    <img src="{{asset('images/LOGO.png')}}" alt="Logo PIQ" class="w-16 h-16 object-contain drop-shadow -my-2">
                </a>
                <span class="text-2xl font-extrabold text-blue-700 tracking-tight">E-Library</span>
            </div>
            <div x-data="{ open: false }" class="relative">
                <!-- Hamburger Button (Mobile) -->
                <button @click="open = !open" class="lg:hidden flex items-center px-3 py-2 border rounded text-blue-700 border-blue-600 hover:bg-blue-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <!-- Navbar Links -->
                <nav class="space-x-2 hidden lg:flex">
                    <x-nav-link :href="route('article.index')" :active="request()->routeIs('article.*')">
                        {{ __('Artikel') }}
                    </x-nav-link>
                    <x-nav-link :href="route('profil')" :active="request()->routeIs('profil')">
                        {{ __('Tentang') }}
                    </x-nav-link>
                    <a href="#anggota"
                        class="px-4 py-2 bg-white text-blue-700 border border-blue-600 rounded-lg shadow hover:bg-blue-600 hover:text-white transition font-semibold">
                        Anggota
                    </a>
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-white text-blue-600 border border-blue-600 rounded-lg shadow hover:bg-blue-600 hover:text-white transition font-semibold">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-blue-600 text-white border border-blue-600 rounded-lg shadow hover:bg-blue-700 transition font-semibold">
                        Register
                    </a>
                </nav>
                <!-- Mobile Menu -->
                <nav x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white border border-blue-100 rounded-lg shadow-lg flex flex-col py-2 lg:hidden z-50"
                    x-transition>
                    <a href="{{ route('article.index') }}"
                        class="px-4 py-2 text-blue-700 hover:bg-blue-50 font-semibold">Artikel</a>
                    <a href="{{ route('profil') }}"
                        class="px-4 py-2 text-blue-700 hover:bg-blue-50 font-semibold">Tentang</a>
                    <a href="#anggota"
                        class="px-4 py-2 text-blue-700 hover:bg-blue-50 font-semibold">Anggota</a>
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-blue-600 hover:bg-blue-50 font-semibold">Log in</a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 text-white bg-blue-600 rounded-lg mx-2 mt-2 font-semibold hover:bg-blue-700 transition">Register</a>
                </nav>
            </div>
        </div>
    </header>
