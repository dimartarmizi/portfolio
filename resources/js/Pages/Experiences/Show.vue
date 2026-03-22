<template>
  <AppLayout>
    <article class="card">
      <header>
        <h1 class="text-2xl font-bold text-white">{{ experience.position }}</h1>
        <div class="text-slate-400 mt-1">{{ experience.company }} · {{ experience.location }}</div>
        <div class="text-slate-400 text-sm mt-1">{{ experience.employment_type }} · {{ experience.date_range }}</div>
      </header>

      <div class="mt-6 text-slate-300">
        <p>{{ experience.description }}</p>

        <h3 class="mt-4 text-slate-100">Highlights</h3>
        <ul class="list-disc pl-5 mt-2 text-slate-300">
          <li v-for="(h, i) in (experience.highlights || [])" :key="i">{{ h.highlight || h }}</li>
        </ul>

        <h3 class="mt-4 text-slate-100">Tech stack</h3>
        <div class="mt-2 flex flex-wrap gap-2">
          <span v-for="(t, i) in (experience.tech_stack || [])" :key="i" class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">{{ t.tech || t.name || t }}</span>
        </div>
      </div>
    </article>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const experience = computed(() => page.props.experience || {});
</script>
