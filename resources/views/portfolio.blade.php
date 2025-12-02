@extends('layouts.app')

@section('title', 'Portofolio - PT Agra Mitra Dinamika')

@section('content')
<!-- Hero -->
<section class="bg-gradient-to-r from-blue-600 to-blue-400 text-white py-20">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-5xl font-bold">Portofolio Proyek</h1>
        <p class="mt-3 text-blue-100 max-w-2xl mx-auto">Showcase proyek teknologi yang telah kami selesaikan dengan pendekatan sistematis</p>
        <div class="mt-8 flex items-center justify-center gap-2 flex-wrap">
            <a href="{{ route('portfolio') }}" class="px-4 py-2 rounded-full font-medium {{ empty($selectedCategory) ? 'bg-white text-blue-600' : 'bg-white bg-opacity-10 text-white' }}">
                Semua Kategori <span class="ml-2 bg-blue-100 text-blue-600 text-xs px-2 py-0.5 rounded">{{ $categories->firstWhere('name', 'Semua')['count'] ?? 0 }}</span>
            </a>

            @if(!empty($categories))
            @foreach($categories as $cat)
            @if($cat['name'] !== 'Semua')
            @php $isActive = (isset($selectedCategory) && $selectedCategory === $cat['name']); @endphp
            <a href="{{ route('portfolio', ['category' => $cat['name']]) }}" class="px-4 py-2 rounded-full {{ $isActive ? 'bg-white text-blue-600' : 'bg-white bg-opacity-10 text-white' }}">
                {{ $cat['name'] }} <span class="ml-2 bg-blue-100 text-blue-600 text-xs px-2 py-0.5 rounded">{{ $cat['count'] }}</span>
            </a>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</section>

<section class="py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(isset($portfolios) && $portfolios->isNotEmpty())
            @foreach($portfolios as $p)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <a href="{{ route('portfolio.show', ['slug' => $p->slug]) }}" class="block">
                    <div class="w-full bg-gray-100" style="position:relative;">
                        <div style="width:100%;padding-bottom:31.5789%;overflow:hidden;">
                            @if(!empty($p->thumbnail))
                            <img src="{{ asset('storage/' . ltrim($p->thumbnail, '/')) }}" alt="{{ $p->title }}" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;" />
                            @else
                            <img src="{{ asset('/images/no-image.jpg') }}" alt="{{ $p->title }}" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;" />
                            @endif
                        </div>
                    </div>
                </a>

                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-3">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('portfolio.show', ['slug' => $p->slug]) }}" class="font-semibold text-gray-900 hover:text-blue-600">{{ $p->title }}</a>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded">{{ $p->category }}</span>
                                </div>
                                <p class="text-sm text-gray-500 mt-2">{{ $p->description ?? 'Deskripsi singkat proyek dan capaian yang relevan untuk menunjukkan nilai bisnis.' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-sm text-gray-600 space-y-3">
                        <div class="text-sm font-medium">Teknologi:</div>
                        <div class="flex items-center gap-2 flex-wrap">
                            @if(!empty($p->technologies) && is_array($p->technologies))
                            @foreach($p->technologies as $tech)
                            @if(is_array($tech))
                            <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded text-xs">{{ $tech['name'] ?? implode(', ', $tech) }}</span>
                            @else
                            <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded text-xs">{{ $tech }}</span>
                            @endif
                            @endforeach
                            @else
                            <span class="bg-gray-100 text-gray-700 px-2 py-0.5 rounded text-xs">-</span>
                            @endif
                        </div>

                        <div>
                            <div class="text-sm font-medium">Fitur Utama:</div>
                            <ul class="list-disc list-inside text-gray-600 text-sm mt-1">
                                @if(!empty($p->features) && is_array($p->features))
                                @foreach($p->features as $f)
                                @if(is_array($f))
                                <li>{{ $f['feature'] ?? implode(', ', $f) }}</li>
                                @else
                                <li>{{ $f }}</li>
                                @endif
                                @endforeach
                                @else
                                <li>Desain, Pengembangan, dan Integrasi</li>
                                @endif
                            </ul>
                        </div>

                        <div>
                            <div class="text-sm font-medium">Hasil:</div>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                @if(!empty($p->results) && is_array($p->results))
                                @foreach($p->results as $r)
                                @if(is_array($r))
                                <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">{{ $r['result'] ?? implode(', ', $r) }}</span>
                                @else
                                <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">{{ $r }}</span>
                                @endif
                                @endforeach
                                @else
                                <span class="bg-green-50 text-green-700 px-2 py-1 rounded text-xs">Efisiensi &mdash; Hasil Terukur</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-span-full text-center text-gray-500">Belum ada portofolio untuk kategori ini.</div>
            @endif
        </div>
    </div>
</section>

@endsection