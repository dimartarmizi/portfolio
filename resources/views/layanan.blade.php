@extends('layouts.app')

@section('title', 'Layanan - PT Agra Mitra Dinamika')

@section('content')
    <!-- Hero -->
    <section class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="inline-block bg-white/10 rounded-md px-4 py-2 mb-6">PT Agra Mitra Dinamika</div>
            <h1 class="text-4xl md:text-5xl font-bold">“Inovasi-Kolaborasi-Transformasi”</h1>
            <p class="mt-4 max-w-3xl mx-auto text-lg text-blue-100">PT Agra Mitra Dinamika adalah perusahaan multi bidang yang bergerak di sektor media, periklanan, teknologi, penelitian, perdagangan, dan industri kreatif. Kami hadir untuk mendukung kemajuan daerah dan berkontribusi secara nasional melalui solusi yang inovatif dan berkelanjutan.</p>
            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('kontak') }}" class="bg-white text-blue-600 font-semibold px-5 py-3 rounded-md">Konsultasi Gratis</a>
                <a href="#produk" class="border border-white/30 px-5 py-3 rounded-md">Lihat Layanan</a>
            </div>
        </div>
    </section>

    <!-- Layanan cards -->
    <section id="produk" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-slate-800">Produk & Layanan</h2>
            <p class="text-gray-600 mt-2">Berikut lini layanan utama yang kami sediakan untuk mendukung kebutuhan bisnis dan institusi Anda.</p>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- A. Teknologi & Digital -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-lg">A. Teknologi & Digital</h3>
                    <p class="text-sm text-gray-600 mt-2">Pengembangan website dan aplikasi, penerbitan software, portal digital, serta konsultasi IT & digitalisasi bisnis.</p>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li>• Pengembangan website & aplikasi (custom)</li>
                        <li>• Penerbitan software komersial</li>
                        <li>• Portal digital dan platform layanan</li>
                        <li>• Konsultasi IT & digitalisasi bisnis</li>
                    </ul>
                </div>

                <!-- B. Media & Publikasi -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-lg">B. Media & Publikasi</h3>
                    <p class="text-sm text-gray-600 mt-2">Penerbitan jurnal dan majalah, produksi konten media, serta kampanye periklanan digital dan cetak.</p>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li>• Produksi konten multimedia</li>
                        <li>• Penerbitan jurnal dan buletin</li>
                        <li>• Manajemen kampanye & strategi komunikasi</li>
                    </ul>
                </div>

                <!-- C. Riset & Konsultasi -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-lg">C. Riset & Konsultasi Profesional</h3>
                    <p class="text-sm text-gray-600 mt-2">R&D, konsultasi teknis dan keinsinyuran, studi kelayakan, dan pendampingan akademik.</p>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li>• Penelitian & pengembangan (R&amp;D)</li>
                        <li>• Konsultasi teknis dan keinsinyuran</li>
                        <li>• Kajian akademik dan studi kelayakan</li>
                    </ul>
                </div>

                <!-- D. Perdagangan & Distribusi -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-lg">D. Perdagangan & Distribusi</h3>
                    <p class="text-sm text-gray-600 mt-2">Perdagangan perangkat lunak & hardware, distribusi produk konsumen, pengelolaan e-commerce dan logistik digital.</p>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li>• Perdagangan grosir & eceran</li>
                        <li>• Platform e-commerce dan logistik</li>
                        <li>• Analisis pasar dan manajemen rantai pasok</li>
                    </ul>
                </div>

                <!-- E. Kreatif & Produksi -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-lg">E. Kreatif & Industri Produksi</h3>
                    <p class="text-sm text-gray-600 mt-2">Produksi animasi, film, desain grafis, pengembangan produk makanan, dan layanan kreatif berbasis seni dan budaya.</p>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li>• Produksi film, animasi, program TV</li>
                        <li>• Desain grafis, produk fashion, dan kuliner</li>
                        <li>• Layanan industri budaya dan kreatif</li>
                    </ul>
                </div>

                <!-- F. Layanan Khusus -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-semibold text-lg">F. Layanan Khusus</h3>
                    <p class="text-sm text-gray-600 mt-2">Layanan spesial termasuk agen perjalanan umroh dan haji khusus serta layanan tailor-made sesuai kebutuhan klien.</p>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li>• Agen perjalanan umroh dan haji khusus</li>
                        <li>• Layanan kustom sesuai permintaan</li>
                    </ul>
                </div>
            </div>

            <!-- Why choose -->
            <div class="mt-12 bg-white rounded-lg p-8 shadow">
                <h3 class="text-2xl font-semibold">Mengapa Memilih Pendekatan Sistematis Kami?</h3>
                <p class="text-gray-600 mt-2">Keunggulan yang membuat solusi kami berbeda dan relevan untuk bisnis Anda.</p>

                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold">1</div>
                        <h4 class="mt-3 font-semibold">Analisis Mendalam</h4>
                        <p class="text-sm text-gray-600">Memahami kebutuhan bisnis secara detail.</p>
                    </div>

                    <div class="text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-green-50 flex items-center justify-center text-green-600 font-bold">2</div>
                        <h4 class="mt-3 font-semibold">Desain Terstruktur</h4>
                        <p class="text-sm text-gray-600">Rencana solusi berdasarkan arsitektur yang sistematis.</p>
                    </div>

                    <div class="text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-600 font-bold">3</div>
                        <h4 class="mt-3 font-semibold">Implementasi Bertahap</h4>
                        <p class="text-sm text-gray-600">Melaksanakan solusi secara terukur dan terkontrol.</p>
                    </div>

                    <div class="text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold">4</div>
                        <h4 class="mt-3 font-semibold">Dukungan Berkelanjutan</h4>
                        <p class="text-sm text-gray-600">Maintenance dan support jangka panjang.</p>
                    </div>
                </div>
            </div>

            <!-- Struktur organisasi -->
            <div class="mt-12">
                <h3 class="text-2xl font-semibold">Struktur Organisasi (Gambaran Umum)</h3>
                <p class="text-gray-600 mt-2">Ringkasan divisi dan tanggung jawab utama.</p>

                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg p-6 shadow">
                        <h4 class="font-semibold">Direksi Utama</h4>
                        <p class="text-sm text-gray-600 mt-2">Bertanggung jawab atas arah strategis, pengambilan keputusan tertinggi, dan pengawasan lintas divisi.</p>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow">
                        <h4 class="font-semibold">Divisi Teknologi Informasi & Platform Digital</h4>
                        <ul class="mt-2 text-sm text-gray-600 space-y-1">
                            <li>• Pengembangan perangkat lunak</li>
                            <li>• Pengelolaan infrastruktur TI</li>
                            <li>• Pengembangan situs web dan sistem digital</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow">
                        <h4 class="font-semibold">Divisi Media, Publikasi & Periklanan</h4>
                        <ul class="mt-2 text-sm text-gray-600 space-y-1">
                            <li>• Produksi konten multimedia</li>
                            <li>• Penerbitan jurnal, buletin, dan majalah</li>
                            <li>• Manajemen kampanye periklanan</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow">
                        <h4 class="font-semibold">Divisi Penelitian & Konsultansi</h4>
                        <ul class="mt-2 text-sm text-gray-600 space-y-1">
                            <li>• R&amp;D Ilmu Pengetahuan Alam</li>
                            <li>• Konsultasi keinsinyuran dan teknis</li>
                            <li>• Kajian akademik dan studi kelayakan</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow">
                        <h4 class="font-semibold">Divisi Perdagangan & Distribusi</h4>
                        <ul class="mt-2 text-sm text-gray-600 space-y-1">
                            <li>• Perdagangan perangkat lunak & hardware</li>
                            <li>• Distribusi produk konsumen dan bahan makanan</li>
                            <li>• Pengelolaan e-commerce dan logistik</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-lg p-6 shadow">
                        <h4 class="font-semibold">Divisi Kreatif & Produksi</h4>
                        <ul class="mt-2 text-sm text-gray-600 space-y-1">
                            <li>• Produksi animasi, film, dan komik</li>
                            <li>• Desain grafis dan produk fashion</li>
                            <li>• Pengembangan produk makanan olahan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Portofolio singkat -->
            <div class="mt-12 bg-white rounded-lg p-8 shadow">
                <h3 class="text-2xl font-semibold">Portofolio & Pencapaian</h3>
                <p class="text-gray-600 mt-2">Saat ini perusahaan berada dalam tahap awal pengembangan operasional. Berbagai program strategis dan kerja sama sedang dirancang dan diinisiasi. Informasi proyek dan pencapaian akan diperbarui secara berkala.</p>
            </div>

            <!-- CTA -->
            <div class="mt-10 bg-gradient-to-r from-blue-600 to-indigo-500 text-white rounded-lg p-8 text-center">
                <h3 class="text-2xl font-bold">Siap Mengoptimalkan Bisnis Anda?</h3>
                <p class="mt-3">Konsultasikan kebutuhan bisnis Anda dengan tim expert kami. Dapatkan analisis gratis dan solusi yang sesuai.</p>
                <div class="mt-6 flex justify-center gap-4">
                    <a href="{{ route('kontak') }}" class="bg-white text-blue-600 font-semibold px-5 py-3 rounded-md">Konsultasi Gratis Sekarang</a>
                    <a href="/" class="border border-white/30 px-5 py-3 rounded-md">Lihat Portofolio Kami</a>
                </div>
            </div>

            <!-- Kontak singkat -->
            <div class="mt-12 p-6 bg-white rounded-lg shadow">
                <h4 class="font-semibold">Informasi Kontak</h4>
                <p class="text-sm text-gray-600 mt-2">Alamat Kantor: Jl. Trimas No. 88, RT/RW 003/016, Tembilahan Kota, Kecamatan Tembilahan, Kabupaten Indragiri Hilir, Provinsi Riau, 29212 – Indonesia</p>
                <p class="text-sm text-gray-600 mt-1">Telepon: 0813-6111-6176 | Email: <a href="mailto:agramitradinamika@gmail.com" class="text-blue-600">agramitradinamika@gmail.com</a> | Website: <a href="https://agramitradinamika.com" target="_blank" class="text-blue-600">agramitradinamika.com</a></p>
            </div>
        </div>
    </section>
@endsection
