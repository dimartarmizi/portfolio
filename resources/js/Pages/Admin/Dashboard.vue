<template>
    <AdminLayout>
        <Head title="Admin Dashboard" />

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <div v-for="item in statCards" :key="item.label" class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 p-5 shadow-lg shadow-black/20">
                <div class="flex items-start justify-between">
                    <div class="text-sm text-slate-400">{{ item.label }}</div>
                    <component :is="item.icon" class="h-6 w-6 text-slate-500" />
                </div>
                <div class="mt-3 text-3xl font-semibold text-white">{{ item.value }}</div>
                <div class="mt-2 text-sm text-slate-500">{{ item.caption }}</div>
            </div>
        </section>

        <section class="mt-8 grid gap-6 xl:grid-cols-3">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-5 sm:p-6 xl:col-span-2">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Overview</div>
                        <h2 class="mt-2 text-xl font-semibold text-white">Quick actions</h2>
                    </div>
                    <Link href="/admin/settings" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-amber-400 px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-amber-300 sm:w-auto">
                        <IconSettings class="h-4 w-4" />
                        <span>Edit settings</span>
                    </Link>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-3">
                    <Link href="/admin/content" class="rounded-2xl border border-white/10 bg-slate-950/60 p-4 transition hover:border-amber-400/30 hover:bg-white/5">
                        <div class="flex items-center gap-2 text-sm text-slate-400">
                            <IconLayoutGrid class="h-4 w-4" />
                            <span>Content</span>
                        </div>
                        <div class="mt-2 text-lg font-medium text-white">Manage items</div>
                        <p class="mt-2 text-sm text-slate-500">Review projects, posts, and experience entries.</p>
                    </Link>
                    <Link href="/admin/settings" class="rounded-2xl border border-white/10 bg-slate-950/60 p-4 transition hover:border-cyan-400/30 hover:bg-white/5">
                        <div class="flex items-center gap-2 text-sm text-slate-400">
                            <IconSettings class="h-4 w-4" />
                            <span>Settings</span>
                        </div>
                        <div class="mt-2 text-lg font-medium text-white">Update brand</div>
                        <p class="mt-2 text-sm text-slate-500">Control headline, description, files, and social links.</p>
                    </Link>
                    <Link href="/" class="rounded-2xl border border-white/10 bg-slate-950/60 p-4 transition hover:border-emerald-400/30 hover:bg-white/5">
                        <div class="flex items-center gap-2 text-sm text-slate-400">
                            <IconExternalLink class="h-4 w-4" />
                            <span>Public site</span>
                        </div>
                        <div class="mt-2 text-lg font-medium text-white">Preview live</div>
                        <p class="mt-2 text-sm text-slate-500">Check how the portfolio looks after content changes.</p>
                    </Link>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-5 sm:p-6">
                <div class="text-xs uppercase tracking-[0.3em] text-slate-500">System</div>
                <h2 class="mt-2 text-xl font-semibold text-white">Current configuration</h2>
                <dl class="mt-6 space-y-4 text-sm">
                    <div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
                        <dt class="text-slate-400">Site title</dt>
                        <dd class="font-medium text-white">{{ siteName }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
                        <dt class="text-slate-400">Blog visible</dt>
                        <dd :class="appFlags.show_blog ? 'text-emerald-300' : 'text-slate-500'">{{ appFlags.show_blog ? 'Yes' : 'No' }}</dd>
                    </div>
                    <div class="flex items-center justify-between gap-4 border-b border-white/5 pb-3">
                        <dt class="text-slate-400">Profile picture</dt>
                        <dd :class="appFlags.show_profile_picture ? 'text-emerald-300' : 'text-slate-500'">{{ appFlags.show_profile_picture ? 'Shown' : 'Hidden' }}</dd>
                    </div>
                </dl>
            </div>
        </section>

        <section class="mt-8 grid gap-6 xl:grid-cols-3">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-5 sm:p-6 xl:col-span-2">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <h2 class="text-xl font-semibold text-white">Recent projects</h2>
                    <Link href="/admin/content" class="inline-flex items-center gap-2 text-sm text-amber-300 transition hover:text-amber-200 self-start sm:self-auto">
                        <IconArrowRight class="h-4 w-4" />
                        <span>View all</span>
                    </Link>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <article v-for="project in recentProjects" :key="project.id" class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <div class="aspect-[16/9] overflow-hidden rounded-xl bg-slate-900">
                            <img v-if="project.thumbnail_url" :src="project.thumbnail_url" :alt="project.title" class="h-full w-full object-cover" />
                        </div>
                        <div class="mt-4 flex items-start justify-between gap-4">
                            <div>
                                    <h3 class="font-medium text-white">{{ project.title }}</h3>
                                <p class="mt-1 text-sm text-slate-400">{{ project.year || 'No year' }}</p>
                            </div>
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-slate-300">{{ project.status }}</span>
                        </div>
                    </article>
                </div>
            </div>

            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-5 sm:p-6">
                <h2 class="text-xl font-semibold text-white">Recent experiences</h2>
                <div class="mt-6 space-y-4">
                    <article v-for="experience in recentExperiences" :key="experience.id" class="rounded-2xl border border-white/10 bg-slate-950/50 p-4">
                        <div class="text-sm text-slate-400">{{ experience.date_range }}</div>
                        <h3 class="mt-2 font-medium text-white">{{ experience.position }}</h3>
                        <p class="mt-1 text-sm text-slate-500">{{ experience.company }}</p>
                    </article>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>

<script setup>
import { computed } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { IconArrowRight, IconExternalLink, IconLayoutGrid, IconSettings, IconBriefcase, IconArticle, IconHistory } from '@tabler/icons-vue';

const page = usePage();
const stats = computed(() => page.props.stats ?? {});
const recentProjects = computed(() => page.props.recent_projects ?? []);
const recentExperiences = computed(() => page.props.recent_experiences ?? []);
const appFlags = computed(() => page.props.app ?? {});
const siteName = computed(() => appFlags.value.owner_name ?? 'Portfolio');

const statCards = computed(() => [
    { label: 'Projects', value: stats.value.projects ?? 0, caption: 'Portfolio projects available', icon: IconBriefcase },
    { label: 'Posts', value: stats.value.posts ?? 0, caption: 'Published blog entries', icon: IconArticle },
    { label: 'Experiences', value: stats.value.experiences ?? 0, caption: 'Career timeline items', icon: IconHistory },
    { label: 'Settings', value: stats.value.settings ?? 0, caption: 'Stored site settings', icon: IconSettings },
]);
</script>