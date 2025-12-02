<header class="bg-white shadow backdrop-blur-md bg-opacity-50 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.png') }}" alt="PT Agra Mitra Dinamika" class="h-10" />
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('index') }}" class="text-gray-600 hover:text-blue-600 font-bold">Beranda</a>
                <a href="{{ route('project') }}" class="text-gray-600 hover:text-blue-600 font-bold">Proyek</a>
            </nav>
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
        <a href="{{ route('index') }}" class="block py-2">Beranda</a>
        <a href="{{ route('project') }}" class="block py-2">Proyek</a>
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