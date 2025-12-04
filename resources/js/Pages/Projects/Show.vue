<template>
  <AppLayout>
    <article class="card">
      <header class="flex items-start gap-6">
        <div class="w-28 h-28 bg-slate-800 rounded"></div>
        <div>
          <h1 class="text-2xl font-bold text-white">Portfolio Redesign</h1>
          <div class="text-slate-400">2025 · Personal</div>
          <div class="mt-2">
            <a href="#" class="text-accent">Visit site</a>
          </div>
        </div>
      </header>

      <div class="mt-6 text-slate-300">
        <p>A clean portfolio showcasing projects, blog posts and a resume. Built with Laravel + Tailwind, with an emphasis on performance and clarity.</p>

        <h3 class="mt-4 text-slate-100">Features</h3>
        <ul class="list-disc list-inside mt-2 text-slate-300">
          <li>Responsive layout</li>
          <li>Accessible markup</li>
          <li>Lightweight images and preloading</li>
        </ul>

        <h3 class="mt-4 text-slate-100">Technologies</h3>
        <div class="mt-2 flex flex-wrap gap-2">
          <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">Laravel</span>
          <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">Tailwind</span>
          <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">Vite</span>
        </div>

        <h3 class="mt-4 text-slate-100">Results</h3>
        <p class="text-slate-300 mt-2">Improved load times and clearer presentation of work; used as this very site.</p>
      </div>
    </article>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
