@extends('layouts.app')

@section('title', ($portfolio->title ?? 'Portofolio') . ' - PT Agra Mitra Dinamika')

@section('content')
<section class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="w-full overflow-hidden rounded-lg mt-8" style="position:relative;">
            <div style="width:100%;padding-bottom:31.5789%;">
                @if(!empty($portfolio->thumbnail))
                    <img src="{{ asset('storage/' . ltrim($portfolio->thumbnail, '/')) }}" alt="{{ $portfolio->title }}" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;" />
                @else
                    <img src="{{ asset('/images/no-image.jpg') }}" alt="{{ $portfolio->title }}" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;" />
                @endif
            </div>
        </div>
    </div>
</section>

<section class="py-12">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <h1 class="text-2xl font-bold">{{ $portfolio->title }}</h1>
            <div class="mt-2 flex items-center space-x-4 text-sm text-gray-500">
                <div class="px-2 py-1 bg-gray-100 rounded text-gray-700">{{ $portfolio->category }}</div>
                <div>{{ $portfolio->client ?? 'Klien: -' }}</div>
                <div>{{ $portfolio->year ?? $portfolio->created_at->format('Y') }}</div>
                @if(!empty($portfolio->project_url))
                    <a href="{{ $portfolio->project_url }}" target="_blank" class="text-blue-600">Lihat Portofolio</a>
                @endif
            </div>

            <div class="mt-6 text-gray-700 leading-relaxed">
                {!! nl2br(e($portfolio->description ?? 'Tidak ada deskripsi.')) !!}
            </div>

            <div class="mt-8">
                <h3 class="font-semibold mb-3">Galeri</h3>
                @php
                    $slides = collect($portfolio->gallery ?? [])->map(function($i){
                        if(is_array($i)){
                            // support several common keys used by different exporters
                            foreach(['image','img','url','path','src'] as $k){
                                if(isset($i[$k]) && is_string($i[$k]) && $i[$k] !== ''){
                                    return asset('storage/' . ltrim($i[$k], '/'));
                                }
                            }

                            // if array contains a single string value, try to use it
                            $values = array_values($i);
                            if(isset($values[0]) && is_string($values[0]) && $values[0] !== ''){
                                return asset('storage/' . ltrim($values[0], '/'));
                            }

                            return null;
                        }

                        if(is_string($i) && $i !== ''){
                            return asset('storage/' . ltrim($i, '/'));
                        }

                        return null;
                    })->filter()->values()->all();
                @endphp

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                    @if(count($slides) > 0)
                        @foreach($slides as $url)
                            <a href="{{ $url }}" target="_blank" class="block bg-gray-100 rounded overflow-hidden" title="Lihat gambar">
                                <div style="width:100%;padding-bottom:56.25%;position:relative;">
                                    <img src="{{ $url }}" alt="{{ $portfolio->title }}" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center;" />
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="text-gray-500">Tidak ada galeri.</div>
                    @endif
                </div>
            </div>

        </div>

        <aside class="lg:col-span-1">
            <div class="bg-white p-4 rounded shadow">
                <h4 class="font-semibold mb-2">Detail Proyek</h4>
                <dl class="text-sm text-gray-600">
                    <dt class="font-medium">Klien</dt>
                    <dd class="mb-2">{{ $portfolio->client ?? '-' }}</dd>

                    <dt class="font-medium">Tahun</dt>
                    <dd class="mb-2">{{ $portfolio->year ?? $portfolio->created_at->format('Y') }}</dd>

                    <dt class="font-medium">Teknologi</dt>
                    <dd class="mb-2">
                        @if(!empty($portfolio->technologies) && is_array($portfolio->technologies))
                            <div class="flex flex-wrap gap-2">
                                @foreach($portfolio->technologies as $t)
                                    <span class="px-2 py-0.5 bg-gray-100 text-gray-700 rounded text-xs">{{ is_array($t) ? ($t['name'] ?? implode(', ',$t)) : $t }}</span>
                                @endforeach
                            </div>
                        @else
                            -
                        @endif
                    </dd>
                </dl>
            </div>
        </aside>
    </div>
</section>

@endsection
