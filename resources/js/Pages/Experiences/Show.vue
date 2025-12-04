<template>
  <AppLayout>
    <article class="card">
      <header>
        <h1 class="text-2xl font-bold text-white">Senior Frontend Engineer</h1>
        <div class="text-slate-400 mt-1">Acme Inc. · San Francisco</div>
        <div class="text-slate-400 text-sm mt-1">Full-time · 2022-06-01 — Present</div>
      </header>

      <div class="mt-6 text-slate-300">
        <p>Responsible for leading frontend initiatives across multiple products, improving performance and developer experience.</p>

        <h3 class="mt-4 text-slate-100">Highlights</h3>
        <ul class="list-disc list-inside mt-2 text-slate-300">
          <li>Rebuilt the main dashboard with React and improved load times by 40%.</li>
          <li>Introduced a design system used across product teams.</li>
        </ul>

        <h3 class="mt-4 text-slate-100">Tech stack</h3>
        <div class="mt-2 flex flex-wrap gap-2">
          <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">React</span>
          <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">TypeScript</span>
          <span class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">Tailwind</span>
        </div>
      </div>
    </article>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { withDefaults, defineProps } from 'vue';

const props = withDefaults(defineProps({
  id: {
    type: [String, Number],
    required: false
  }
}), {
  id: null
});
</script>
