@extends('layouts.app')

@section('title', 'Beranda - PT Agra Mitra Dinamika')

@section('content')
<section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white">
    <div class="max-w-7xl mx-auto px-4 py-20 lg:py-28 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div>
            <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight">PT Agra Mitra Dinamika</h1>
            <p class="mt-2 text-blue-100 font-semibold">“Inovasi - Kolaborasi - Transformasi”</p>

            <p class="mt-6 text-blue-100 max-w-xl">PT Agra Mitra Dinamika adalah perusahaan multi bidang yang bergerak di sektor media, periklanan, teknologi, penelitian, perdagangan, dan industri kreatif. Berkomitmen menghadirkan solusi teknologi dan layanan kreatif yang berdampak bagi masyarakat dan mitra usaha.</p>

            <ul class="mt-6 text-blue-100 space-y-2">
                <li>• Pengembangan Website & Aplikasi</li>
                <li>• Media, Publikasi & Periklanan</li>
                <li>• Riset & Konsultansi Profesional</li>
                <li>• Perdagangan, Distribusi & Produksi Kreatif</li>
            </ul>

            <div class="mt-8 flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0">
                <a href="{{ route('tentang') }}" class="inline-flex items-center px-5 py-3 bg-white text-blue-700 rounded-md font-semibold">Tentang Kami</a>
                <a href="{{ route('kontak') }}" class="inline-flex items-center px-5 py-3 border border-white bg-white/10 rounded-md">Hubungi Kami</a>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-white/10 p-6 rounded-lg">
                <h3 class="font-semibold">Solusi Teknologi</h3>
                <p class="text-sm mt-2">Pengembangan perangkat lunak, platform digital, dan integrasi sistem.</p>
            </div>
            <div class="bg-white/10 p-6 rounded-lg">
                <h3 class="font-semibold">Media & Kreatif</h3>
                <p class="text-sm mt-2">Produksi konten, kampanye periklanan, dan publikasi profesional.</p>
            </div>
            <div class="bg-white/10 p-6 rounded-lg">
                <h3 class="font-semibold">Riset & Konsultansi</h3>
                <p class="text-sm mt-2">R&D, studi kelayakan, dan konsultasi teknis untuk berbagai sektor.</p>
            </div>
        </div>
    </div>
</section>
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-center">Layanan Utama Kami</h2>
        <p class="text-center text-gray-500 mt-2">
            Solusi terintegrasi dari teknologi hingga layanan profesional, dirancang untuk mendukung pertumbuhan bisnis dan kebutuhan operasional Anda.
        </p>

        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- 1. Software Development -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-device-desktop-code text-blue-700 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Pengembangan Software</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Pembuatan website, aplikasi mobile, dan software custom yang dirancang sesuai kebutuhan operasional perusahaan dengan teknologi modern dan standar keamanan tinggi.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 2. Digital Platforms -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-world text-teal-700 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Portal Digital & Platform</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Pengembangan dan pengelolaan portal digital, platform komersial, marketplace, serta sistem layanan otomatis yang mendukung transformasi digital bisnis Anda.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 3. IT Consulting -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-gizmo text-indigo-700 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Konsultasi IT & Digitalisasi</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Konsultasi strategi teknologi, integrasi sistem, audit IT, otomatisasi proses bisnis, serta solusi digitalisasi yang meningkatkan efisiensi perusahaan.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 4. Media & Production -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-camera text-orange-600 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Media & Produksi Konten</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Produksi video, fotografi, iklan, manajemen sosial media, publikasi majalah/jurnal, dan kampanye pemasaran digital maupun cetak untuk kebutuhan branding.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 5. Research & Engineering -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-microscope text-purple-700 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Riset & Konsultasi Teknis</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Penelitian ilmiah, riset pengembangan (R&D), konsultasi keinsinyuran, hingga perancangan solusi berbasis data untuk mendukung inovasi dan efisiensi operasional.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 6. Trading & Distribution -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-truck-delivery text-red-600 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Perdagangan & Distribusi</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Perdagangan besar software, hardware komputer, barang konsumsi, bahan makanan, serta pengelolaan platform e-commerce dan retail multi-produk.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 7. Creative Industry -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-palette text-pink-700 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Industri Kreatif & Produksi</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Layanan kreatif meliputi produksi film, animasi, komik, penjahitan pakaian custom, hingga industri makanan olahan yang mendukung kebutuhan bisnis dan hiburan.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

            <!-- 8. Umroh & Haji -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-200 p-6 flex flex-col text-center h-full">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 mx-auto">
                    <i class="ti ti-building-mosque text-green-700 text-3xl"></i>
                </div>
                <h4 class="mt-4 font-semibold text-lg">Perjalanan Umroh & Haji</h4>
                <p class="text-sm text-gray-500 mt-2">
                    Layanan perjalanan umroh dan haji khusus dengan pendampingan profesional, manajemen perjalanan yang aman, serta fasilitas lengkap bagi jamaah.
                </p>
                <div class="mt-auto pt-4">
                    <a href="{{ route('kontak') }}" class="inline-flex px-4 py-2 border border-gray-200 rounded-md text-sm hover:bg-gray-50">
                        Pelajari Layanan →
                    </a>
                </div>
            </div>

        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('layanan') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-md">
                Lihat Semua Layanan
            </a>
        </div>
    </div>
</section>

    
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h3 class="text-xl font-bold text-center">Testimoni Klien</h3>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-yellow-400">★★★★★</div>
                <p class="mt-4 text-sm text-gray-600">
                    "Tim Agra Mitra Dinamika merekomendasikan solusi yang tepat, implementasinya cepat dan lancar. Banyak aplikasi yang dibuat sudah diterapkan harian secara efektif."
                </p>
                <div class="mt-4 text-sm font-semibold">
                    Yayasan Indra Education College
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-yellow-400">★★★★★</div>
                <p class="mt-4 text-sm text-gray-600">
                    "Kerja profesional, komunikasi jelas, dan hasilnya sangat membantu aktivitas di kampus kami."
                </p>
                <div class="mt-4 text-sm font-semibold">
                    Universitas Islam Indragiri
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-yellow-400">★★★★★</div>
                <p class="mt-4 text-sm text-gray-600">
                    "Sistem yang dibangun sangat sesuai kebutuhan riset kami dan mempermudah publikasi ilmiah."
                </p>
                <div class="mt-4 text-sm font-semibold">
                    Indra Institute Research & Publication
                </div>
            </div>
        </div>
    </div>
</section>

@endsection