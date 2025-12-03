@extends('layouts.app')

@section('title', 'Projects — Portfolio')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <div class="lg:col-span-8">
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">Selected Projects</h1>

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
  </div>

  <aside class="lg:col-span-4">
    <div class="card">
      <h4 class="text-sm font-semibold text-slate-200">Filter</h4>
      <div class="mt-2">
        <label class="text-slate-400 text-sm">Year</label>
        <select class="w-full mt-2 bg-slate-900 rounded p-2 text-slate-200 text-sm">
          <option>All</option>
          <option>2025</option>
          <option>2024</option>
        </select>
      </div>
    </div>
  </aside>
</div>

@endsection
