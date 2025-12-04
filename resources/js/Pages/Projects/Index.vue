<template>
  <AppLayout>
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">All Projects</h1>
    <div class="space-y-6">
      <div v-for="proj in projects" :key="proj.id" class="card">
        <div class="flex items-start gap-4">
          <div class="w-24 h-24 bg-slate-800 rounded overflow-hidden">
            <img v-if="proj.thumbnail_url" :src="proj.thumbnail_url" class="w-full h-full object-cover" alt="" />
          </div>
          <div>
            <h3 class="text-lg font-semibold text-white">{{ proj.title }}</h3>
            <div class="text-slate-400 text-sm">{{ proj.year }} · {{ proj.made_at }}</div>
            <p class="text-slate-300 mt-2">{{ proj.short_description }}</p>
            <div class="mt-3">
              <Link :href="`/projects/${proj.slug}`" class="text-accent">View project →</Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage, Link } from '@inertiajs/inertia-vue3';

const page = usePage();
const projects = page.props.value.projects || [];
</script>
