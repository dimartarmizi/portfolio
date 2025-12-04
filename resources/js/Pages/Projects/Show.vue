<template>
  <AppLayout>
    <article class="card">
      <header class="flex items-start gap-6">
        <div class="flex-shrink-0 w-28 sm:w-28 md:w-32 bg-slate-800 rounded overflow-hidden">
          <div class="relative" style="aspect-ratio:1/1;">
            <img v-if="project.thumbnail_url" :src="project.thumbnail_url" alt="" class="absolute inset-0 w-full h-full object-cover" />
          </div>
        </div>
        <div>
          <h1 class="text-2xl font-bold text-white">{{ project.title }}</h1>
          <div class="text-slate-400">{{ project.year }} · {{ project.made_at }}</div>
          <div class="mt-2">
            <a v-if="project.link" :href="project.link" target="_blank" class="text-accent">Visit site</a>
          </div>
        </div>
      </header>

      <div class="mt-6 text-slate-300">
        <p v-if="project.description">{{ project.description }}</p>

        <h3 class="mt-4 text-slate-100">Features</h3>
        <ul class="list-disc pl-5 mt-2 text-slate-300">
          <li v-for="(f, i) in (project.features || [])" :key="i">{{ f.feature || f }}</li>
        </ul>

        <h3 class="mt-4 text-slate-100">Technologies</h3>
        <div class="mt-2 flex flex-wrap gap-2">
          <span v-for="(t, i) in (project.technologies || [])" :key="i" class="text-xs px-2 py-1 rounded bg-slate-800 text-slate-300">{{ t.name || t.tech || t }}</span>
        </div>

        <h3 class="mt-4 text-slate-100">Results</h3>
        <p class="text-slate-300 mt-2">{{ (project.results && project.results[0] && (project.results[0].result || project.results[0])) || '' }}</p>

        <div v-if="project.gallery && project.gallery.length" class="mt-4">
          <h3 class="mt-4 text-slate-100">Gallery</h3>
          <div class="grid grid-cols-4 gap-2 mt-2">
            <a v-for="(g, i) in project.gallery" :key="i" :href="(g.image || g)" target="_blank" rel="noopener noreferrer" :title="g.caption || ''" class="block rounded overflow-hidden">
              <div class="relative w-full" style="padding-top:56.25%;">
                <img :src="g.image || g" :alt="g.caption || ''" class="absolute inset-0 w-full h-full object-cover" />
              </div>
            </a>
          </div>
        </div>
      </div>
    </article>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/inertia-vue3';

const page = usePage();
const project = page.props.value.project || {};
</script>
