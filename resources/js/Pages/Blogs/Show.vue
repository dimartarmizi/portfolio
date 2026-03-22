<template>
  <AppLayout>
    <article class="space-y-8">
      <header class="space-y-4">
        <div v-if="post.cover_image_url">
          <img :src="post.cover_image_url" :alt="post.title" class="w-full rounded-2xl object-cover" />
        </div>

        <div class="space-y-2">
          <h1 class="text-2xl font-bold text-white sm:text-3xl">{{ post.title }}</h1>
          <div class="text-sm text-slate-400">Published: {{ post.published_at }}</div>
        </div>
      </header>

      <div class="prose prose-invert prose-headings:text-white prose-p:text-slate-200 prose-li:text-slate-200 prose-a:text-amber-300 max-w-none leading-7 text-slate-200" v-html="post.content"></div>
    </article>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const post = computed(() => page.props.post || {});
</script>

<style scoped>
.prose :deep(ul) {
  list-style-type: disc;
  padding-left: 1.5rem;
  margin: 1rem 0;
}

.prose :deep(ol) {
  list-style-type: decimal;
  padding-left: 1.5rem;
  margin: 1rem 0;
}

.prose :deep(li) {
  margin: 0.35rem 0;
}

.prose :deep(ul ul) {
  list-style-type: circle;
  margin: 0.5rem 0 0.5rem 1rem;
}

.prose :deep(ol ol) {
  list-style-type: lower-alpha;
  margin: 0.5rem 0 0.5rem 1rem;
}
</style>
