<template>
  <AppLayout>
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">All Projects</h1>
    <div class="space-y-6">
      <div v-for="proj in projects" :key="proj.id" class="card">
        <div class="flex items-start gap-4">
          <div class="flex-shrink-0 w-24 sm:w-24 md:w-28 bg-slate-800 rounded overflow-hidden">
            <div class="relative" style="aspect-ratio:1/1;">
              <img v-if="proj.thumbnail_url" :src="proj.thumbnail_url" class="absolute inset-0 w-full h-full object-cover" alt="" />
            </div>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-white">{{ proj.title }}</h3>
            <div class="text-slate-400 text-sm">{{ proj.year }} · {{ proj.made_at }}</div>
            <p class="text-slate-300 mt-2">{{ proj.short_description }}</p>
            <div class="mt-3">
              <Link :href="`/projects/${proj.slug}`" class="inline-flex items-center gap-1.5 text-accent">
                <span>View project</span>
                <IconArrowRight class="h-4 w-4" />
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { IconArrowRight } from '@tabler/icons-vue';

const page = usePage();
const projects = computed(() => page.props.projects || []);
</script>
