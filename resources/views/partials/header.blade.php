<header class="bg-white shadow backdrop-blur-md bg-opacity-50 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="PT Agra Mitra Dinamika" class="h-10" />
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('beranda') }}" class="text-gray-600 hover:text-blue-600 font-bold">Beranda</a>
                <a href="{{ route('layanan') }}" class="text-gray-600 hover:text-blue-600 font-bold">Layanan</a>
                <a href="{{ route('tentang') }}" class="text-gray-600 hover:text-blue-600 font-bold">Tentang Kami</a>
                <a href="{{ route('portfolio') }}" class="text-gray-600 hover:text-blue-600 font-bold">Portofolio</a>
                <a href="{{ route('kontak') }}" class="text-gray-600 hover:text-blue-600 font-bold">Kontak</a>
            </nav>

            <div class="hidden md:flex items-center">
                <a href="{{ route('kontak') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Hubungi Kami</a>
            </div>

            <div class="md:hidden">
                <button id="nav-toggle" class="p-2 rounded-md focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-nav" class="md:hidden hidden px-4 pb-6">
        <a href="{{ route('beranda') }}" class="block py-2">Beranda</a>
        <a href="{{ route('layanan') }}" class="block py-2">Layanan</a>
        <a href="{{ route('tentang') }}" class="block py-2">Tentang Kami</a>
        <a href="{{ route('portfolio') }}" class="block py-2">Portofolio</a>
        <a href="{{ route('kontak') }}" class="block py-2">Kontak</a>
    </div>

    <style>
        nav a {
            font-size: 0.875rem;
        }
    </style>

    <script>
        (function(){
            const btn = document.getElementById('nav-toggle');
            const menu = document.getElementById('mobile-nav');
            if (!btn || !menu) return;
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));

            document.addEventListener('click', (e) => {
                if (!menu.contains(e.target) && !btn.contains(e.target)) {
                    if (!menu.classList.contains('hidden')) menu.classList.add('hidden');
                }
            });
        })();
    </script>
</header>