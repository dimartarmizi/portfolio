<template>
  <AppLayout>
    <article class="card">
      <header>
        <h1 class="text-2xl font-bold text-white">{{ post.title }}</h1>
        <div class="text-slate-400 text-sm mt-1">Published: {{ post.published_at }}</div>
      </header>

      <figure class="mt-4">
        <div class="w-full h-48 bg-slate-800 rounded"></div>
        <figcaption class="text-slate-500 text-sm mt-2">Cover image</figcaption>
      </figure>

      <div class="prose prose-invert mt-6 text-slate-200" v-html="post.content"></div>
    </article>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/inertia-vue3';

const page = usePage();
const post = page.props.value.post || {};
</script>
