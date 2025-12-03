@extends('layouts.app')

@section('title', 'Experience — Portfolio')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <div class="lg:col-span-8">
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">Work Experience</h1>
    <div class="space-y-6">
      <div class="card">
        <h3 class="text-lg font-semibold text-white">Senior Frontend Engineer — Acme Inc.</h3>
        <div class="text-slate-400 text-sm">San Francisco · Full-time · 2022 - Present</div>
        <p class="text-slate-300 mt-3">Building performant UIs and mentoring junior engineers.</p>
        <div class="mt-3">
          <a href="#" class="text-accent">View details →</a>
        </div>
      </div>

      <div class="card">
        <h3 class="text-lg font-semibold text-white">Frontend Engineer — Startup Co.</h3>
        <div class="text-slate-400 text-sm">Remote · Contract · 2020 - 2022</div>
        <p class="text-slate-300 mt-3">Led the redesign of the marketing site and optimized Lighthouse scores.</p>
        <div class="mt-3">
          <a href="#" class="text-accent">View details →</a>
        </div>
      </div>
    </div>
  </div>

  <aside class="lg:col-span-4">
    <div class="card">
      <h4 class="text-sm font-semibold text-slate-200">Summary</h4>
      <p class="text-slate-400 text-sm mt-2">10+ years building interfaces, performance-focused and accessibility-minded.</p>
    </div>
  </aside>
</div>

@endsection
