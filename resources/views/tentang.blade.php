@extends('layouts.app')

@section('title', 'Tentang PT Agra Mitra Dinamika')

@section('content')
    <section class="bg-gradient-to-r from-blue-600 to-indigo-500 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-4xl font-bold">Pendekatan Sistematis Kami</h1>
            <p class="mt-2 text-blue-100">Mengenal lebih dalam tentang filosofi dan nilai-nilai perusahaan</p>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-semibold">Cerita Kami</h2>
                    <p class="mt-4 text-sm text-gray-700">PT. Agra Mitra Dinamika hadir dari visi untuk menghadirkan solusi teknologi yang tidak hanya modern, tetapi juga sistematis. Kami percaya bahwa setiap implementasi teknologi harus dilakukan dengan pendekatan yang terstruktur, terukur, dan berkelanjutan.</p>
                    <p class="mt-3 text-sm text-gray-700">Berangkat dari pengalaman menangani berbagai proyek yang kompleks, kami memahami bahwa kesuksesan implementasi tidak hanya bergantung pada fitur yang canggih, tetapi pada metodologi yang tepat. Setiap solusi yang kami kembangkan dirancang dengan mempertimbangkan aspek bisnis, teknis, dan manusia. Kami tidak hanya fokus pada teknologi, tetapi juga pada bagaimana teknologi tersebut dapat berintegrasi secara harmonis dengan ekosistem bisnis klien.</p>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-6 shadow">
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div class="p-4">
                                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">5+</div>
                                <p class="mt-2 text-sm font-medium">Expert Developers</p>
                            </div>
                            <div class="p-4">
                                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">20+</div>
                                <p class="mt-2 text-sm font-medium">Successful Projects</p>
                            </div>
                            <div class="p-4">
                                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">2+</div>
                                <p class="mt-2 text-sm font-medium">Years Experience</p>
                            </div>
                            <div class="p-4">
                                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold">99%</div>
                                <p class="mt-2 text-sm font-medium">Client Satisfaction</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-xl font-semibold text-center">Visi & Misi</h3>
            <p class="text-center text-gray-600 mt-2">Komitmen kami untuk menciptakan dampak positif melalui teknologi</p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg p-6 shadow">
                    <div class="flex items-start gap-4">
                        <div>
                            <h4 class="font-semibold">Visi</h4>
                            <p class="text-sm text-gray-600 mt-2">Menjadi perusahaan mitra strategis terdepan dalam bidang media, teknologi, dan ekonomi kreatif yang mendorong pertumbuhan berkelanjutan dan berdaya saing global.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-6 shadow">
                    <div class="flex items-start gap-4">
                        <div>
                            <h4 class="font-semibold">Misi</h4>
                            <p class="text-sm text-gray-600 mt-2">Meningkatkan kontribusi terhadap kemajuan sektor media, pendidikan, dan penelitian ilmiah; mengembangkan solusi teknologi yang inovatif dan relevan; menyediakan layanan kreatif dan periklanan yang profesional; serta membangun jaringan perdagangan dan ekosistem bisnis berbasis teknologi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-xl font-semibold text-center">Nilai-Nilai Kami</h3>
            <p class="text-center text-gray-600 mt-2">Prinsip-prinsip yang memandu setiap langkah kami dalam memberikan solusi terbaik</p>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h4 class="font-semibold">Sistematis</h4>
                    <p class="text-sm text-gray-600 mt-2">Setiap solusi dirancang dengan pendekatan yang terstruktur dan terukur.</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h4 class="font-semibold">Inovasi</h4>
                    <p class="text-sm text-gray-600 mt-2">Menghadirkan teknologi terdepan untuk kebutuhan bisnis modern.</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h4 class="font-semibold">Kualitas</h4>
                    <p class="text-sm text-gray-600 mt-2">Komitmen pada standar kualitas tinggi dalam setiap layanan.</p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                    <h4 class="font-semibold">Kemitraan</h4>
                    <p class="text-sm text-gray-600 mt-2">Membangun hubungan jangka panjang dengan klien.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h3 class="text-xl font-semibold text-center">Perjalanan Kami</h3>
            <p class="text-center text-gray-600 mt-2">Milestone penting dalam perjalanan menjadi pioner solusi sistematis</p>

            <div class="mt-10 relative">
                <div class="border-l-2 border-blue-100 absolute left-1/2 transform -translate-x-1/2 h-full top-0"></div>

                <div class="space-y-12">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between">
                        <div class="md:w-5/12">
                            <div class="bg-white p-4 rounded shadow">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">22</div>
                                    <div>
                                        <h4 class="font-semibold">Berdiri</h4>
                                        <p class="text-sm text-gray-600">2022 — PT. Agra Mitra Dinamika didirikan dengan visi menjadi pioneer solusi sistematis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-5/12 md:ml-auto mt-4 md:mt-0">
                            <div class="bg-white p-4 rounded shadow">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">23</div>
                                    <div>
                                        <h4 class="font-semibold">Ekspansi Layanan</h4>
                                        <p class="text-sm text-gray-600">2023 — Menambah layanan pengembangan website dan aplikasi mobile.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-start md:justify-between">
                        <div class="md:w-5/12">
                            <div class="bg-white p-4 rounded shadow">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">24</div>
                                    <div>
                                        <h4 class="font-semibold">20+ Klien</h4>
                                        <p class="text-sm text-gray-600">2024 — Mencapai milestone 20+ klien dari berbagai industri.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md:w-5/12 md:ml-auto mt-4 md:mt-0">
                            <div class="bg-white p-4 rounded shadow">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">25</div>
                                    <div>
                                        <h4 class="font-semibold">35+ Proyek</h4>
                                        <p class="text-sm text-gray-600">2025 — Berhasil menyelesaikan 35+ proyek dengan tingkat kepuasan tinggi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="py-12 bg-gradient-to-r from-blue-600 to-indigo-500 text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl font-semibold">Mari Berkolaborasi dengan Kami</h3>
            <p class="mt-2 text-blue-100">Bergabunglah dengan puluhan perusahaan yang telah merasakan manfaat dari pendekatan sistematis kami.</p>
            <div class="mt-6 flex justify-center gap-4">
                <a href="{{ route('kontak') }}" class="bg-white text-blue-600 font-semibold px-5 py-3 rounded-md">Mulai Konsultasi</a>
                <a href="/" class="border border-white/30 px-5 py-3 rounded-md">Lihat Portofolio</a>
            </div>
        </div>
    </section>
@endsection
