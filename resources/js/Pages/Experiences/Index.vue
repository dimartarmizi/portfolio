<template>
  <AppLayout>
    <SectionHeading
      eyebrow="Career"
      title="Work Experience"
      description="A timeline of roles, responsibilities, and highlights."
    />
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
          <Link :href="`/experiences/${exp.id}`" class="inline-flex items-center gap-1.5 text-accent">
            <span>View details</span>
            <IconArrowRight class="h-4 w-4" />
          </Link>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionHeading from '@/Components/Public/SectionHeading.vue';
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { IconArrowRight } from '@tabler/icons-vue';

const page = usePage();
const experiences = computed(() => page.props.experiences || []);
</script>
