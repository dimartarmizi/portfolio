<template>
    <AdminLayout>
        <Head title="Content Library" />

        <section class="grid gap-4 md:grid-cols-3">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                <div class="text-sm text-slate-400">Projects</div>
                <div class="mt-3 text-3xl font-semibold text-white">{{ counts.projects ?? 0 }}</div>
                <Link href="/admin/projects" class="mt-4 inline-flex items-center gap-2 text-sm text-amber-300 transition hover:text-amber-200">
                    <IconArrowRight class="h-4 w-4" />
                    <span>Open projects CRUD</span>
                </Link>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                <div class="text-sm text-slate-400">Posts</div>
                <div class="mt-3 text-3xl font-semibold text-white">{{ counts.posts ?? 0 }}</div>
                <Link href="/admin/posts" class="mt-4 inline-flex items-center gap-2 text-sm text-amber-300 transition hover:text-amber-200">
                    <IconArrowRight class="h-4 w-4" />
                    <span>Open posts CRUD</span>
                </Link>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                <div class="text-sm text-slate-400">Experiences</div>
                <div class="mt-3 text-3xl font-semibold text-white">{{ counts.experiences ?? 0 }}</div>
                <Link href="/admin/experiences" class="mt-4 inline-flex items-center gap-2 text-sm text-amber-300 transition hover:text-amber-200">
                    <IconArrowRight class="h-4 w-4" />
                    <span>Open experiences CRUD</span>
                </Link>
            </div>
        </section>

        <section class="mt-6 grid gap-6 xl:grid-cols-3">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 xl:col-span-2">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Projects</div>
                        <h2 class="mt-2 text-xl font-semibold text-white">Latest project records</h2>
                    </div>
                    <span class="rounded-full border border-white/10 px-3 py-1 text-sm text-slate-300">{{ projects.length }} items</span>
                </div>

                <div class="mt-6 overflow-hidden rounded-2xl border border-white/10">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-900/80 text-slate-400">
                            <tr>
                                <th class="px-4 py-3 font-medium">Title</th>
                                <th class="px-4 py-3 font-medium">Year</th>
                                <th class="px-4 py-3 font-medium">Status</th>
                                <th class="px-4 py-3 font-medium">Slug</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-950/50">
                            <tr v-for="project in projects" :key="project.id">
                                <td class="px-4 py-3 text-white">{{ project.title }}</td>
                                <td class="px-4 py-3 text-slate-300">{{ project.year || '—' }}</td>
                                <td class="px-4 py-3 text-slate-300">{{ project.status }}</td>
                                <td class="px-4 py-3 text-slate-500">{{ project.slug }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Posts</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Recent blog items</h2>

                <div class="mt-6 space-y-4">
                    <article v-for="post in posts" :key="post.id" class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <div class="text-sm text-slate-500">{{ post.published_at || 'Draft' }}</div>
                        <h3 class="mt-2 font-medium text-white">{{ post.title }}</h3>
                        <div class="mt-3 text-xs uppercase tracking-[0.2em] text-slate-400">{{ post.status }}</div>
                    </article>
                </div>
            </div>
        </section>

        <section class="mt-8 rounded-[2rem] border border-white/10 bg-white/5 p-6">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Experience</div>
                    <h2 class="mt-2 text-xl font-semibold text-white">Career timeline</h2>
                </div>
                <span class="rounded-full border border-white/10 px-3 py-1 text-sm text-slate-300">{{ experiences.length }} entries</span>
            </div>

            <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <article v-for="experience in experiences" :key="experience.id" class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                    <div class="text-sm text-slate-500">{{ experience.employment_type }}</div>
                    <h3 class="mt-2 font-medium text-white">{{ experience.position }}</h3>
                    <p class="mt-1 text-sm text-slate-400">{{ experience.company }}</p>
                </article>
            </div>
        </section>

        <div class="mt-6 flex flex-wrap gap-3">
            <Link href="/admin/projects" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">
                <IconBriefcase class="h-4 w-4" />
                <span>Manage projects</span>
            </Link>
            <Link href="/admin/posts" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">
                <IconFileText class="h-4 w-4" />
                <span>Manage posts</span>
            </Link>
            <Link href="/admin/experiences" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">
                <IconHome class="h-4 w-4" />
                <span>Manage experiences</span>
            </Link>
        </div>
    </AdminLayout>
</template>

<script setup>
import { computed } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { IconArrowRight, IconBriefcase, IconFileText, IconHome } from '@tabler/icons-vue';

const page = usePage();
const projects = computed(() => page.props.projects ?? []);
const posts = computed(() => page.props.posts ?? []);
const experiences = computed(() => page.props.experiences ?? []);
const counts = computed(() => page.props.counts ?? {});
</script>