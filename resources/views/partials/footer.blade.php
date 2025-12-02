<footer class="bg-slate-900 text-slate-200">
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-12 gap-8">
        <div class="md:col-span-6 md:mr-4">
            <div class="mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="PT Agra Mitra Dinamika" class="h-12">
            </div>
            <p class="text-sm mt-3">PT Agra Mitra Dinamika menyediakan solusi teknologi, media, publikasi, perdagangan, dan layanan kreatif. Kami fokus pada inovasi, kolaborasi, dan transformasi untuk memberikan dampak nyata bagi mitra dan masyarakat.</p>
            <div class="mt-4 flex space-x-3">
                <i class="ti ti-brand-facebook text-slate-400 text-3xl hover:text-white"></i>
                <i class="ti ti-brand-instagram text-slate-400 text-3xl hover:text-white"></i>
                <i class="ti ti-brand-youtube text-slate-400 text-3xl hover:text-white"></i>
            </div>
        </div>

        <div class="md:col-span-3">
            <h4 class="font-semibold">Tautan Cepat</h4>
            <ul class="mt-3 space-y-2 text-sm">
                <li><a href="{{ url('/') }}" class="hover:underline">Beranda</a></li>
                <li><a href="{{ route('layanan') }}" class="hover:underline">Layanan</a></li>
                <li><a href="{{ route('portfolio') }}" class="hover:underline">Portofolio</a></li>
                <li><a href="{{ route('tentang') }}" class="hover:underline">Tentang Kami</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:underline">Kontak</a></li>
            </ul>
        </div>

        <div class="md:col-span-3">
            <h4 class="font-semibold">Kontak</h4>
            <p class="text-sm mt-3">Jl. Trimas No. 88, RT/RW 003/016, Tembilahan Kota, Kecamatan Tembilahan, Kabupaten Indragiri Hilir, Provinsi Riau, 29212</p>
            <p class="text-sm">Email: <a href="mailto:agramitradinamika@gmail.com" class="hover:underline">agramitradinamika@gmail.com</a></p>
            <p class="text-sm">Telp: <a href="tel:081361116176" class="hover:underline">0813-6111-6176</a></p>
            <p class="text-sm">Website: <a href="https://agramitradinamika.com" class="hover:underline">agramitradinamika.com</a></p>
        </div>
    </div>

    <div class="border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-slate-400 flex flex-col md:flex-row md:justify-center md:items-center">
            <div>© {{ now()->year }} PT Agra Mitra Dinamika. Hak Cipta Dilindungi.</div>
        </div>
    </div>
</footer>