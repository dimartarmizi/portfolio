@extends('layouts.app')

@section('title', 'Blog Post — Portfolio')

@section('content')
<article class="card">
	<header>
		<h1 class="text-2xl font-bold text-white">Understanding Modern CSS Layouts</h1>
		<div class="text-slate-400 text-sm mt-1">Published: 2025-11-20</div>
	</header>

	<figure class="mt-4">
		<div class="w-full h-48 bg-slate-800 rounded"></div>
		<figcaption class="text-slate-500 text-sm mt-2">Cover image</figcaption>
	</figure>

	<div class="prose prose-invert mt-6 text-slate-200">
		<p>This post covers the fundamentals of modern CSS layout systems: Flexbox, Grid, and when to use each. It includes small, copy-paste examples and accessibility considerations.</p>
		<h3 class="mt-4">Why it matters</h3>
		<p>Layouts form the backbone of every interface. Choosing the right tool reduces code and improves maintainability.</p>
	</div>
</article>

@endsection