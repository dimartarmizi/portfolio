<template>
  <AppLayout>
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">Latest Posts</h1>
    <div class="space-y-4">
      <article v-for="post in posts" :key="post.id" class="card">
        <h2 class="text-lg font-semibold text-white">{{ post.title }}</h2>
        <p class="text-slate-400 mt-1">{{ post.short_title }}</p>
        <div class="mt-3 text-sm text-slate-400">Published: {{ post.published_at }}</div>
        <div class="mt-4">
          <Link :href="`/blogs/${post.slug}`" class="text-accent hover:text-white">Read more →</Link>
        </div>
      </article>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage, Link } from '@inertiajs/inertia-vue3';

const page = usePage();
const posts = page.props.value.posts || [];
</script>
