@extends('layouts.app')

@section('title', 'Blog — Portfolio')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
  <div class="lg:col-span-8">
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
  </div>

  <aside class="lg:col-span-4 space-y-4">
    <div class="card">
      <h3 class="text-sm font-semibold text-slate-200">About this blog</h3>
      <p class="text-slate-400 text-sm mt-2">Short, practical posts about frontend development, UX and performance.</p>
    </div>

    <div class="card">
      <h3 class="text-sm font-semibold text-slate-200">Tags</h3>
      <div class="mt-2 flex flex-wrap gap-2">
        <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">css</span>
        <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">react</span>
        <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">accessibility</span>
      </div>
    </div>
  </aside>
</div>

@endsection
