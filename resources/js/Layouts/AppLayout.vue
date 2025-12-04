<template>
    <div class="antialiased text-slate-100 relative z-10 min-h-screen flex flex-col">
        <div class="mouse-gradient" aria-hidden="true">
            <div class="g g1"></div>
        </div>
        <header class="py-8">
            <div class="container grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <div class="lg:col-span-4 flex items-center justify-between">
                    <div>
                        <a href="/" class="text-2xl font-extrabold tracking-tight">{{ ownerName }}</a>
                        <div class="text-slate-400 mt-1">{{ headline }}</div>
                    </div>
                    <button @click="mobileOpen = !mobileOpen" id="mobile-menu-button" class="lg:hidden text-slate-300 hover:text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <nav id="desktop-menu" class="lg:col-span-8 text-right hidden lg:block">
                    <Link href="/" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/') }">Home</Link>
                    <Link href="/experiences" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/experiences') }">Experience</Link>
                    <Link href="/projects" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/projects') }">Projects</Link>
                    <Link v-if="showBlog" href="/blogs" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/blogs') }">Blog</Link>
                </nav>

                <nav id="mobile-menu" :class="['lg:hidden', mobileOpen ? '' : 'hidden', 'flex', 'flex-col', 'text-center', 'bg-panel', 'p-4', 'rounded-md', 'gap-4', 'card']">
                    <Link href="/" class="text-slate-300 hover:text-white">Home</Link>
                    <Link href="/experiences" class="text-slate-300 hover:text-white">Experience</Link>
                    <Link href="/projects" class="text-slate-300 hover:text-white">Projects</Link>
                    <Link v-if="showBlog" href="/blogs" class="text-slate-300 hover:text-white">Blog</Link>
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
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, computed } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

const mobileOpen = ref(false);

const page = usePage();
const props = page.props;

const ownerName = computed(() => {
    try { return props.value.app?.owner_name ?? 'Your Name'; } catch (e) { return 'Your Name'; }
});

const headline = computed(() => {
    try { return props.value.app?.headline ?? ''; } catch (e) { return ''; }
});

const showBlog = computed(() => {
    try { return !!props.value.app?.show_blog; } catch (e) { return false; }
});

const footer = computed(() => {
    try { return props.value.app?.footer ?? ''; } catch (e) { return false; }
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