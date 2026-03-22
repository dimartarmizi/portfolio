<template>
  <AppLayout>
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">Latest Posts</h1>
    <div class="space-y-4">
      <article v-for="post in posts" :key="post.id" class="card">
        <h2 class="text-lg font-semibold text-white">{{ post.title }}</h2>
        <p class="text-slate-400 mt-1">{{ post.short_title }}</p>
        <div class="mt-3 text-sm text-slate-400">Published: {{ post.published_at }}</div>
        <div class="mt-4">
          <Link :href="`/blogs/${post.slug}`" class="inline-flex items-center gap-1.5 text-accent hover:text-white">
            <span>Read more</span>
            <IconArrowRight class="h-4 w-4" />
          </Link>
        </div>
      </article>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { IconArrowRight } from '@tabler/icons-vue';

const page = usePage();
const posts = computed(() => page.props.posts || []);
</script>
