<template>
    <div class="relative min-h-screen overflow-x-hidden bg-slate-950 text-slate-100">
        <div class="pointer-events-none fixed inset-0 overflow-hidden">
            <div class="absolute -top-24 left-1/2 h-80 w-80 -translate-x-1/2 rounded-full bg-amber-400/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-cyan-400/10 blur-3xl"></div>
        </div>

        <div v-if="mobileNavOpen" class="fixed inset-0 z-30 bg-slate-950/70 backdrop-blur-sm xl:hidden" @click="closeMobileNav"></div>

        <div class="relative mx-auto flex min-h-screen max-w-[1600px]">
            <aside
                class="fixed inset-y-0 left-0 z-40 flex w-80 -translate-x-full flex-col border-r border-white/10 bg-slate-950/95 px-6 py-8 backdrop-blur transition-transform duration-300 xl:sticky xl:top-0 xl:h-screen xl:translate-x-0 xl:bg-slate-950/80"
                :class="mobileNavOpen ? 'translate-x-0' : ''"
            >
                <div class="flex items-start justify-between gap-4 xl:block">
                    <div>
                        <div class="text-xs uppercase tracking-[0.3em] text-slate-400">Admin Panel</div>
                        <div class="mt-3 text-2xl font-semibold text-white">{{ siteName }}</div>
                        <p class="mt-2 text-sm text-slate-400">{{ headline }}</p>
                    </div>

                    <button type="button" class="inline-flex items-center justify-center rounded-xl border border-white/10 p-3 text-slate-200 transition hover:bg-white/5 xl:hidden" @click="closeMobileNav">
                        <IconX class="h-4 w-4 opacity-70" />
                        <span class="sr-only">Close navigation</span>
                    </button>
                </div>

                <nav class="mt-10 space-y-2">
                    <Link
                        v-for="item in navItems"
                        :key="item.href"
                        :href="item.href"
                        class="flex items-center gap-3 rounded-2xl border border-transparent px-4 py-3 text-sm transition"
                        :class="isActive(item.href) ? 'border-amber-400/30 bg-amber-400/10 text-white' : 'text-slate-300 hover:border-white/10 hover:bg-white/5 hover:text-white'"
                        @click="closeMobileNav"
                    >
                        <component :is="item.icon" class="h-4 w-4 shrink-0" />
                        <span class="font-medium">{{ item.label }}</span>
                    </Link>
                </nav>

                <div class="mt-10 rounded-3xl border border-white/10 bg-white/5 p-5">
                    <div class="text-xs uppercase tracking-[0.25em] text-slate-500">Logged in as</div>
                    <div class="mt-2 text-base font-medium text-white">{{ user?.name ?? 'Administrator' }}</div>
                    <div class="text-sm text-slate-400">{{ user?.email ?? 'No email' }}</div>
                    <div class="mt-4 flex flex-col gap-3 sm:flex-row xl:flex-col">
                        <Link href="/" class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5" @click="closeMobileNav">
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

            <div class="flex-1 min-w-0">
                <header class="sticky top-0 z-20 border-b border-white/10 bg-slate-950/70 backdrop-blur">
                    <div class="flex items-start justify-between gap-4 px-4 py-4 sm:px-6 xl:px-10">
                        <div class="min-w-0">
                            <div class="flex items-center gap-3 xl:hidden">
                                <button type="button" class="inline-flex items-center justify-center rounded-xl border border-white/10 p-3 text-slate-200 transition hover:bg-white/5" @click="mobileNavOpen = true">
                                    <IconMenu2 class="h-4 w-4" />
                                    <span class="sr-only">Open navigation</span>
                                </button>
                                <div class="min-w-0">
                                    <div class="text-xs uppercase tracking-[0.3em] text-slate-500">Admin Panel</div>
                                    <h1 class="truncate text-lg font-semibold text-white sm:text-2xl">{{ pageTitle }}</h1>
                                </div>
                            </div>

                            <div class="hidden xl:block">
                                <h1 class="text-lg font-semibold text-white sm:text-2xl">{{ pageTitle }}</h1>
                                <p class="mt-1 text-sm text-slate-400">Manage portfolio content and settings from one place.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 sm:gap-3">
                            <Link href="/" class="hidden items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5 sm:inline-flex" @click="closeMobileNav">
                                <IconExternalLink class="h-4 w-4" />
                                <span>Open site</span>
                            </Link>
                            <button type="button" class="inline-flex items-center gap-2 rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:bg-white/5 sm:hidden" @click="logout">
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
import { computed, ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import {
    IconBriefcase,
    IconDashboard,
    IconFileText,
    IconHome,
    IconLayoutGrid,
    IconLogout2,
    IconMenu2,
    IconSettings,
    IconExternalLink,
    IconX,
} from '@tabler/icons-vue';
import ToastStack from '@/Components/ToastStack.vue';

const page = usePage();
const mobileNavOpen = ref(false);

const user = computed(() => page.props.auth?.user ?? null);
const siteName = computed(() => page.props.app?.owner_name ?? 'Portfolio');
const headline = computed(() => page.props.app?.headline ?? 'Admin interface');
const pageTitle = computed(() => {
    const url = page.url ?? '';

    if (url === '/admin/content') {
        return 'Content Hub';
    }

    if (url === '/admin/projects' || url.startsWith('/admin/projects/')) {
        return 'Projects';
    }

    if (url === '/admin/posts' || url.startsWith('/admin/posts/')) {
        return 'Posts';
    }

    if (url === '/admin/experiences' || url.startsWith('/admin/experiences/')) {
        return 'Experiences';
    }

    if (url === '/admin/settings') {
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

function closeMobileNav() {
    mobileNavOpen.value = false;
}

function logout() {
    router.post('/admin/logout', {}, {
        preserveScroll: true,
    });

    closeMobileNav();
}
</script>