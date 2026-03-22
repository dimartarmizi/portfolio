<template>
    <div class="min-h-screen bg-slate-950 text-slate-100">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute -top-24 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-amber-400/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-cyan-400/10 blur-3xl"></div>
        </div>

        <div class="relative mx-auto flex min-h-screen max-w-[1600px]">
            <aside class="hidden w-80 border-r border-white/10 bg-slate-950/80 px-6 py-8 backdrop-blur xl:flex xl:flex-col">
                <div>
                    <div class="text-xs uppercase tracking-[0.3em] text-slate-400">Admin Panel</div>
                    <div class="mt-3 text-2xl font-semibold text-white">{{ siteName }}</div>
                    <p class="mt-2 text-sm text-slate-400">{{ headline }}</p>
                </div>

                <nav class="mt-10 space-y-2">
                    <Link
                        v-for="item in navItems"
                        :key="item.href"
                        :href="item.href"
                        class="flex items-center gap-3 rounded-2xl border border-transparent px-4 py-3 text-sm transition"
                        :class="isActive(item.href) ? 'border-amber-400/30 bg-amber-400/10 text-white' : 'text-slate-300 hover:border-white/10 hover:bg-white/5 hover:text-white'"
                    >
                        <component :is="item.icon" class="h-4 w-4 shrink-0" />
                        <span class="font-medium">{{ item.label }}</span>
                    </Link>
                </nav>

                <div class="mt-10 rounded-3xl border border-white/10 bg-white/5 p-5">
                    <div class="text-xs uppercase tracking-[0.25em] text-slate-500">Logged in as</div>
                    <div class="mt-2 text-base font-medium text-white">{{ user?.name ?? 'Administrator' }}</div>
                    <div class="text-sm text-slate-400">{{ user?.email ?? 'No email' }}</div>
                    <div class="mt-4 flex flex-col gap-3">
                        <Link href="/" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5">
                            <IconExternalLink class="h-4 w-4" />
                            <span>View site</span>
                        </Link>
                        <button type="button" class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-medium text-slate-950 transition hover:bg-slate-100" @click="logout">
                            <IconLogout2 class="h-4 w-4" />
                            <span>Logout</span>
                        </button>
                    </div>
                </div>
            </aside>

            <div class="flex-1">
                <header class="sticky top-0 z-20 border-b border-white/10 bg-slate-950/70 backdrop-blur">
                    <div class="flex items-center justify-between px-4 py-4 sm:px-6 xl:px-10">
                        <div>
                            <div class="text-xs uppercase tracking-[0.3em] text-slate-500 xl:hidden">Admin Panel</div>
                            <h1 class="text-lg font-semibold text-white sm:text-2xl">{{ pageTitle }}</h1>
                            <p class="mt-1 text-sm text-slate-400">Kelola konten dan pengaturan portfolio dari satu tempat.</p>
                        </div>

                        <div class="flex items-center gap-3">
                            <Link href="/" class="hidden items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5 sm:inline-flex">
                                <IconExternalLink class="h-4 w-4" />
                                <span>Open site</span>
                            </Link>
                            <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5 xl:hidden" @click="logout">
                                <IconLogout2 class="h-4 w-4" />
                                <span>Logout</span>
                            </button>
                        </div>
                    </div>
                </header>

                <main class="px-4 py-6 sm:px-6 xl:px-10 xl:py-8">
                    <slot />
                </main>
            </div>
        </div>

        <ToastStack />
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import {
    IconBriefcase,
    IconDashboard,
    IconFileText,
    IconHome,
    IconLayoutGrid,
    IconLogout2,
    IconSettings,
    IconExternalLink,
} from '@tabler/icons-vue';
import ToastStack from '@/Components/ToastStack.vue';

const page = usePage();

const user = computed(() => page.props.auth?.user ?? null);
const siteName = computed(() => page.props.app?.owner_name ?? 'Portfolio');
const headline = computed(() => page.props.app?.headline ?? 'Admin interface');
const pageTitle = computed(() => {
    if (page.url === '/admin/content') {
        return 'Content Hub';
    }

    if (page.url === '/admin/projects' || page.url.startsWith('/admin/projects/')) {
        return 'Projects';
    }

    if (page.url === '/admin/posts' || page.url.startsWith('/admin/posts/')) {
        return 'Posts';
    }

    if (page.url === '/admin/experiences' || page.url.startsWith('/admin/experiences/')) {
        return 'Experiences';
    }

    if (page.url === '/admin/settings') {
        return 'Site Settings';
    }

    return 'Dashboard';
});

const navItems = [
    { href: '/admin', label: 'Overview', icon: IconDashboard },
    { href: '/admin/content', label: 'Content', icon: IconLayoutGrid },
    { href: '/admin/projects', label: 'Projects', icon: IconBriefcase },
    { href: '/admin/posts', label: 'Posts', icon: IconFileText },
    { href: '/admin/experiences', label: 'Experiences', icon: IconHome },
    { href: '/admin/settings', label: 'Settings', icon: IconSettings },
];

function isActive(path) {
    const url = page.url ?? '';

    if (path === '/admin') {
        return url === '/admin';
    }

    return url === path || url.startsWith(path + '/');
}

function logout() {
    router.post('/admin/logout', {}, {
        preserveScroll: true,
    });
}
</script>