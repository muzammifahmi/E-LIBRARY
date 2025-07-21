<!-- Tombol Hubungi Kami -->
<div x-data="{ open: false }"
     class="fixed bottom-6 right-6 z-50 flex flex-col items-center space-y-3">

    <!-- Ikon Media Sosial -->
    <template x-if="open">
        <div class="flex flex-col items-center space-y-3 mb-2">
            <a href="https://facebook.com" target="_blank"
               class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transform transition duration-300"
               x-transition:enter="transition ease-out duration-300"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-200"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-0 translate-y-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07C2 17.1 5.64 21.23 10.44 21.95v-6.58h-3.13v-2.57h3.13V10.4c0-3.1 1.87-4.8 4.65-4.8 1.35 0 2.76.24 2.76.24v3.05h-1.56c-1.54 0-2.02.95-2.02 1.93v2.32h3.44l-.55 2.57h-2.89v6.58C18.36 21.23 22 17.1 22 12.07z" />
                </svg>
            </a>

            <a href="https://instagram.com" target="_blank"
               class="bg-pink-500 hover:bg-pink-600 text-white p-3 rounded-full shadow-lg transform transition duration-300"
               x-transition:enter="transition ease-out duration-300 delay-100"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-200 delay-100"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-0 translate-y-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M7 2C4.79 2 3 3.79 3 6v12c0 2.21 1.79 4 4 4h10c2.21 0 4-1.79 4-4V6c0-2.21-1.79-4-4-4H7zm10 2c1.1 0 2 .9 2 2v2h-2V6h-2V4h2zM7 4h6v2H7v12h10v-6h2v6c0 1.1-.9 2-2 2H7c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z" />
                </svg>
            </a>

            <a href="https://wa.me/6281234567890" target="_blank"
               class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transform transition duration-300"
               x-transition:enter="transition ease-out duration-300 delay-200"
               x-transition:enter-start="opacity-0 translate-y-2"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-200 delay-200"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-0 translate-y-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20.52 3.48A11.9 11.9 0 0012 0C5.37 0 0 5.38 0 12c0 2.11.55 4.16 1.59 5.98L0 24l6.19-1.62A11.96 11.96 0 0012 24c6.63 0 12-5.38 12-12 0-3.19-1.25-6.2-3.48-8.52zM12 22c-1.88 0-3.7-.52-5.3-1.51l-.38-.22-3.68.96.98-3.59-.25-.38A9.91 9.91 0 012 12C2 6.49 6.49 2 12 2c2.66 0 5.19 1.04 7.07 2.93A9.94 9.94 0 0122 12c0 5.51-4.49 10-10 10zm5.01-7.43c-.28-.14-1.66-.82-1.92-.91-.26-.1-.45-.14-.64.14-.19.28-.74.91-.91 1.1-.17.19-.34.21-.62.07-.28-.14-1.19-.44-2.26-1.4-.84-.75-1.4-1.67-1.56-1.95-.17-.28-.02-.43.13-.57.14-.14.31-.34.47-.51.16-.17.21-.28.31-.47.1-.19.05-.36-.02-.5-.07-.14-.64-1.54-.88-2.11-.23-.56-.47-.49-.64-.5-.16-.01-.36-.01-.55-.01s-.5.07-.76.36c-.26.29-1 1-1 2.44 0 1.43 1.02 2.81 1.16 3.01.14.19 2 3.03 4.85 4.24.68.29 1.2.46 1.61.59.67.21 1.28.18 1.76.11.54-.08 1.66-.68 1.9-1.34.24-.66.24-1.22.17-1.34-.07-.11-.25-.17-.53-.3z" />
                </svg>
            </a>
        </div>
    </template>

    <!-- Tombol Utama -->
    <button @click="open = !open"
            class="bg-blue-600 hover:bg-blue-700 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg transition">
        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
            <path d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
