<template>
    <div class="antialiased text-slate-100">
        <header class="py-8">
            <div class="container grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                <div class="lg:col-span-4 flex items-center justify-between">
                    <div>
                        <a href="/" class="text-2xl font-extrabold tracking-tight">Brittany Chiang</a>
                        <div class="text-slate-400 mt-1">Front End Engineer</div>
                    </div>
                    <button @click="mobileOpen = !mobileOpen" id="mobile-menu-button" class="lg:hidden text-slate-300 hover:text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <nav id="desktop-menu" class="lg:col-span-8 text-right hidden lg:block">
                    <Link href="/" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/') }">Home</Link>
                    <Link href="/projects" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/projects') }">Projects</Link>
                    <Link href="/blogs" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/blogs') }">Blog</Link>
                    <Link href="/experiences" class="text-slate-300 hover:text-white mx-3" :class="{ 'text-white': isActive('/experiences') }">Experience</Link>
                </nav>

                <nav id="mobile-menu" :class="['lg:hidden', mobileOpen ? '' : 'hidden', 'flex', 'flex-col', 'text-center', 'bg-panel', 'p-4', 'rounded-md', 'gap-4', 'card']">
                    <Link href="/" class="text-slate-300 hover:text-white">Home</Link>
                    <Link href="/projects" class="text-slate-300 hover:text-white">Projects</Link>
                    <Link href="/blogs" class="text-slate-300 hover:text-white">Blog</Link>
                    <Link href="/experiences" class="text-slate-300 hover:text-white">Experience</Link>
                </nav>
            </div>
        </header>

        <main>
            <div class="container">
                <slot />
            </div>
        </main>

        <footer class="py-8 text-center text-slate-500 text-sm">
            <div class="container">© {{ new Date().getFullYear() }} — Built with Tailwind</div>
        </footer>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/inertia-vue3';

const mobileOpen = ref(false);

const page = usePage();
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
</style>