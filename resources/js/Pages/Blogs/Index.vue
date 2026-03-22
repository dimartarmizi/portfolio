<template>
  <AppLayout>
    <SectionHeading
      eyebrow="Writing"
      title="Latest Posts"
      description="Short notes, articles, and updates from the portfolio."
    />
    <div class="space-y-6">
      <article v-for="post in posts" :key="post.id" class="card">
        <div class="flex items-start gap-4">
          <div v-if="post.cover_image_url" class="flex-shrink-0 w-24 sm:w-28 md:w-32 rounded overflow-hidden bg-slate-800">
            <div class="relative aspect-[4/3]">
              <img :src="post.cover_image_url" :alt="post.title" class="absolute inset-0 h-full w-full object-cover" />
            </div>
          </div>

          <div class="min-w-0">
            <h2 class="text-lg font-semibold text-white">{{ post.title }}</h2>
            <p class="text-slate-400 mt-1">{{ post.short_title }}</p>
            <div class="mt-3 text-sm text-slate-400">Published: {{ post.published_at }}</div>
            <div class="mt-4">
              <Link :href="`/blogs/${post.slug}`" class="inline-flex items-center gap-1.5 text-accent hover:text-white">
                <span>Read more</span>
                <IconArrowRight class="h-4 w-4" />
              </Link>
            </div>
          </div>
        </div>
      </article>
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
const posts = computed(() => page.props.posts || []);
</script>
