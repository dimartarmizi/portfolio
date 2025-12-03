@extends('layouts.app')

@section('title', 'Projects — Portfolio')

@section('content')
<h1 class="text-2xl text-slate-100 font-semibold mb-4">All Projects</h1>
<div class="space-y-6">
	<div class="card">
		<div class="flex items-start gap-4">
			<div class="w-24 h-24 bg-slate-800 rounded"></div>
			<div>
				<h3 class="text-lg font-semibold text-white">Portfolio Redesign</h3>
				<div class="text-slate-400 text-sm">2025 · Personal</div>
				<p class="text-slate-300 mt-2">A clean, responsive portfolio built with Laravel and Tailwind.</p>
				<div class="mt-3">
					<a href="#" class="text-accent">View project →</a>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="flex items-start gap-4">
			<div class="w-24 h-24 bg-slate-800 rounded"></div>
			<div>
				<h3 class="text-lg font-semibold text-white">Marketing Site</h3>
				<div class="text-slate-400 text-sm">2024 · Acme Inc.</div>
				<p class="text-slate-300 mt-2">High-converting marketing site with A/B testing and analytics.</p>
				<div class="mt-3">
					<a href="#" class="text-accent">View project →</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection