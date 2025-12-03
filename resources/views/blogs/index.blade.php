@extends('layouts.app')

@section('title', 'Blog — Portfolio')

@section('content')
<h1 class="text-2xl text-slate-100 font-semibold mb-4">Latest Posts</h1>
<div class="space-y-4">
	<article class="card">
		<h2 class="text-lg font-semibold text-white">Understanding Modern CSS Layouts</h2>
		<p class="text-slate-400 mt-1">A quick guide to Flexbox and Grid, with examples and best practices.</p>
		<div class="mt-3 text-sm text-slate-400">Published: 2025-11-20</div>
		<div class="mt-4">
			<a href="#" class="text-accent hover:text-white">Read more →</a>
		</div>
	</article>

	<article class="card">
		<h2 class="text-lg font-semibold text-white">Accessible Forms in React</h2>
		<p class="text-slate-400 mt-1">Tips for building forms that are usable for everyone.</p>
		<div class="mt-3 text-sm text-slate-400">Published: 2025-10-03</div>
		<div class="mt-4">
			<a href="#" class="text-accent hover:text-white">Read more →</a>
		</div>
	</article>
</div>

@endsection