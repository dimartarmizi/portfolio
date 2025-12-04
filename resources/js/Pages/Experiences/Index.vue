<template>
  <AppLayout>
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">Work Experience</h1>
    <div class="space-y-6">
      <div v-for="exp in experiences" :key="exp.id" class="card">
        <h3 class="text-lg font-semibold text-white">{{ exp.position }} — {{ exp.company }}</h3>
        <div class="text-slate-400 text-sm">{{ exp.location }} · {{ exp.employment_type }} · {{ exp.date_range }}</div>
        <p class="text-slate-300 mt-3">{{ exp.description }}</p>
        <div v-if="exp.highlights && exp.highlights.length" class="mt-3">
          <ul class="list-disc pl-5 text-slate-300">
            <li v-for="(h, i) in exp.highlights" :key="i">{{ h.highlight || h }}</li>
          </ul>
        </div>
        <div class="mt-3">
          <Link :href="`/experiences/${exp.id}`" class="text-accent">View details →</Link>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage, Link } from '@inertiajs/inertia-vue3';

const page = usePage();
const experiences = page.props.value.experiences || [];
</script>
