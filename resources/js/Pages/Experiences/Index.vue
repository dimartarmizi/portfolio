<template>
  <AppLayout>
    <h1 class="text-2xl text-slate-100 font-semibold mb-4">Work Experience</h1>
    <div class="space-y-6">
      <div class="card">
        <h3 class="text-lg font-semibold text-white">Senior Frontend Engineer — Acme Inc.</h3>
        <div class="text-slate-400 text-sm">San Francisco · Full-time · 2022 - Present</div>
        <p class="text-slate-300 mt-3">Building performant UIs and mentoring junior engineers.</p>
        <div class="mt-3">
          <a href="#" class="text-accent">View details →</a>
        </div>
      </div>

      <div class="card">
        <h3 class="text-lg font-semibold text-white">Frontend Engineer — Startup Co.</h3>
        <div class="text-slate-400 text-sm">Remote · Contract · 2020 - 2022</div>
        <p class="text-slate-300 mt-3">Led the redesign of the marketing site and optimized Lighthouse scores.</p>
        <div class="mt-3">
          <a href="#" class="text-accent">View details →</a>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
