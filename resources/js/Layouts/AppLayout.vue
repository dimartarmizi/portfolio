<template>
    <div class="antialiased text-slate-100 relative z-10 min-h-screen flex flex-col">
        <div class="mouse-gradient" aria-hidden="true">
            <div class="g g1"></div>
        </div>
        <header class="py-8">
            <div class="container grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <div class="lg:col-span-4 flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-4">
                            <div v-if="profilePicture" class="h-14 w-14 overflow-hidden rounded-2xl border border-white/10 bg-white/5 shadow-lg shadow-black/20">
                                <img :src="profilePicture" :alt="ownerName" class="h-full w-full object-cover" />
                            </div>
                            <div>
                                <Link href="/" class="text-2xl font-extrabold tracking-tight">{{ ownerName }}</Link>
                                <div class="text-slate-400 mt-1">{{ headline }}</div>
                            </div>
                        </div>
                    </div>
                    <button @click="mobileOpen = !mobileOpen" id="mobile-menu-button" class="lg:hidden text-slate-300 hover:text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <nav id="desktop-menu" class="lg:col-span-8 text-right hidden lg:block">
                    <Link
                        v-for="item in navItems"
                        :key="item.href"
                        :href="item.href"
                        class="inline-flex items-center gap-1.5 text-slate-300 hover:text-white mx-3"
                        :class="{ 'text-white': isActive(item.href) }"
                    >
                        <component :is="item.icon" class="h-4 w-4" />
                        <span>{{ item.label }}</span>
                    </Link>
                </nav>

                <nav id="mobile-menu" :class="['lg:hidden', mobileOpen ? '' : 'hidden', 'flex', 'flex-col', 'text-center', 'bg-panel', 'p-4', 'rounded-md', 'gap-4', 'card']">
                    <Link
                        v-for="item in navItems"
                        :key="`mobile-${item.href}`"
                        :href="item.href"
                        class="inline-flex items-center justify-center gap-2 text-slate-300 hover:text-white"
                        :class="{ 'text-white': isActive(item.href) }"
                    >
                        <component :is="item.icon" class="h-4 w-4" />
                        <span>{{ item.label }}</span>
                    </Link>
                </nav>
            </div>
        </header>

        <main>
            <div class="container">
                <slot />
            </div>
        </main>

        <footer class="py-8 text-center text-slate-500 text-sm">
            <div class="container">{{ footer }}</div>
        </footer>

        <ToastStack />
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { IconBriefcase, IconFileText, IconHome, IconLayoutGrid } from '@tabler/icons-vue';
import ToastStack from '@/Components/ToastStack.vue';

const mobileOpen = ref(false);

const page = usePage();
const app = computed(() => page.props.app ?? {});

const ownerName = computed(() => {
    return app.value.owner_name ?? 'Your Name';
});

const headline = computed(() => {
    return app.value.headline ?? '';
});

const showBlog = computed(() => {
    return !!app.value.show_blog;
});

const footer = computed(() => {
    return app.value.footer ?? '';
});

const profilePicture = computed(() => {
    return app.value.profile_picture ?? '';
});

const navItems = computed(() => {
    const items = [
        { href: '/', label: 'Home', icon: IconHome },
        { href: '/experiences', label: 'Experience', icon: IconBriefcase },
        { href: '/projects', label: 'Projects', icon: IconLayoutGrid },
    ];

    if (showBlog.value) {
        items.push({ href: '/blogs', label: 'Blog', icon: IconFileText });
    }

    return items;
});

function isActive(path) {
    let url = null;
    try {
        url = page.url ?? (page.value && page.value.url) ?? null;
    } catch (e) {
        url = null;
    }

    if (typeof url !== 'string') {
        const win = typeof window !== 'undefined' ? window : null;
        url = win ? (win.location.pathname + (win.location.search || '')) : '';
    }

    return url === path || url.startsWith(path + '/');
}

let _appMouseHandler = null;
onMounted(() => {
    const root = document.documentElement;
    const onMove = (e) => {
        const x = e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || 0;
        const y = e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || 0;
        root.style.setProperty('--mx1', x + 'px');
        root.style.setProperty('--my1', y + 'px');
        root.style.setProperty('--mx2', (x * 0.6) + 'px');
        root.style.setProperty('--my2', (y * 0.6) + 'px');
    };
    _appMouseHandler = onMove;
    window.addEventListener('mousemove', onMove, { passive: true });
    window.addEventListener('touchmove', onMove, { passive: true });
});

onBeforeUnmount(() => {
    try { window.removeEventListener('mousemove', _appMouseHandler); } catch (e) { }
    try { window.removeEventListener('touchmove', _appMouseHandler); } catch (e) { }
});
</script>

<style>
:root {
    --bg: #071223;
    --panel: #071a2a;
    --muted: #8aa0b0;
    --accent: #13f7d3
}

body {
    background: linear-gradient(180deg, var(--bg) 0%, #041826 100%);
    font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

html {
    scroll-behavior: smooth
}

.container {
    max-width: 78rem;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.5rem;
    padding-right: 1.5rem
}

.card {
    background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
    border: 1px solid rgba(255, 255, 255, 0.03);
    padding: 1.25rem;
    border-radius: .75rem
}

main {
    flex: 1;
}

@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-out {
    from {
        opacity: 1;
        transform: translateY(0);
    }

    to {
        opacity: 0;
        transform: translateY(-10px);
    }
}

.animate-fade-in {
    animation: fade-in 0.3s ease-out;
}

.animate-fade-out {
    animation: fade-out 0.3s ease-in;
}

.mouse-gradient {
    position: fixed;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    overflow: hidden;
}

.mouse-gradient .g {
    position: absolute;
    left: var(--mx1, 50%);
    top: var(--my1, 50%);
    transform: translate(-50%, -50%);
    border-radius: 50%;
    filter: blur(80px);
    will-change: transform, left, top;
    transition: transform 160ms linear;
}

.mouse-gradient .g1 {
    width: 700px;
    height: 700px;
    background: radial-gradient(circle at center, rgba(19, 247, 211, 0.18) 0%, rgba(19, 247, 211, 0.06) 30%, rgba(19, 247, 211, 0.02) 50%, transparent 70%);
    mix-blend-mode: screen;
    opacity: 0.9;
}

@media (prefers-reduced-motion: reduce) {
    .mouse-gradient {
        display: none !important;
    }
}
</style>