<template>
    <div class="antialiased text-slate-100 relative z-10" ref="root">
        <div class="mouse-gradient" ref="mouseGradient" aria-hidden="true">
            <div class="g g1"></div>
        </div>
        <div class="min-h-screen max-w-6xl mx-auto px-6 py-12 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <aside class="lg:col-span-4 flex flex-col items-start gap-8 lg:sticky lg:top-20 lg:max-h-[calc(100vh-10rem)] lg:overflow-auto">
                    <div class="w-full">
                        <h1 class="text-3xl font-extrabold tracking-tight">{{ owner_name }}</h1>
                        <p class="mt-2 text-slate-400">{{ headline }}</p>
                    </div>

                    <nav class="w-full mt-6">
                        <ul class="space-y-3 text-slate-300">
                            <li class="nav-item">
                                <span class="nav-indicator" aria-hidden="true"></span>
                                <a href="#about" class="nav-link inline-flex items-center gap-1.5 hover:text-white">
                                    <IconArrowRight class="h-3.5 w-3.5" />
                                    <span>About</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-indicator" aria-hidden="true"></span>
                                <a href="#experience" class="nav-link inline-flex items-center gap-1.5 hover:text-white">
                                    <IconArrowRight class="h-3.5 w-3.5" />
                                    <span>Experience</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-indicator" aria-hidden="true"></span>
                                <a href="#projects" class="nav-link inline-flex items-center gap-1.5 hover:text-white">
                                    <IconArrowRight class="h-3.5 w-3.5" />
                                    <span>Projects</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="w-full mt-auto">
                        <div class="flex items-center gap-4 text-slate-400">
                            <a v-for="(s, idx) in social_links" :key="idx" :href="s.url" class="hover:text-white" :aria-label="s.platform" target="_blank" rel="noopener noreferrer" v-html="s.svg"></a>
                        </div>
                    </div>
                </aside>
                <main class="lg:col-span-8 text-slate-300">
                    <section id="about" class="mb-10">
                        <div class="prose prose-invert max-w-none">
                            <p class="text-slate-400">{{ description }}</p>
                        </div>
                    </section>

                    <section id="experience" class="mb-12">
                        <h2 class="text-slate-200 font-semibold mb-6">Experience</h2>
                        <div class="space-y-8">
                            <div v-for="exp in experiences" :key="exp.id" class="grid grid-cols-12 gap-4 hover-box">
                                <a :href="exp.company_link || '#'" class="contents">
                                    <div class="col-span-2 text-slate-500 text-sm">{{ exp.date_range }}</div>
                                    <div class="col-span-10">
                                        <h3 class="text-slate-100 font-medium">
                                            {{ exp.position }}<span v-if="exp.company"> — <a :href="exp.company_link" class="text-accent hover:text-white" target="_blank" rel="noopener noreferrer">{{ exp.company }}</a></span>
                                        </h3>
                                        <p class="text-sm text-slate-400 mt-2">{{ exp.description }}</p>
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            <span v-for="(t, ti) in exp.tech_stack" :key="ti" class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">{{ t.tech || t }}</span>
                                        </div>

                                        <ul v-if="exp.highlights && exp.highlights.length" class="mt-3 list-disc pl-4 space-y-1 text-sm text-slate-400">
                                            <li v-for="(h, hi) in exp.highlights" :key="hi">{{ h.highlight || h }}</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a :href=resume_file class="flex items-center text-accent hover:text-white mt-5">
                            <span>View Full Resume</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H2a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </section>

                    <section id="projects" class="mb-12">
                        <h2 class="text-slate-200 font-semibold mb-6">Projects</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            <div v-for="project in projects" :key="project.id" class="hover-box">
                                <Link :href="`/projects/${project.slug}` || '#'" class="contents" target="_blank" rel="noopener noreferrer">
                                <img :src="project.thumbnail_url || 'https://placehold.co/1280x720?text=No+Image'" :alt="project.title" class="rounded mb-3 img-fixed-ratio" />
                                <h4 class="text-white font-medium">{{ project.title }}</h4>
                                <p class="text-sm text-slate-400 mt-2">{{ project.short_description }}</p>
                                </Link>
                            </div>
                        </div>
                        <Link href="/projects" class="flex items-center text-accent hover:text-white mt-5">
                        <span>View Full Projects</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.5 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H2a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        </Link>
                    </section>

                    <section id="blog" v-if="show_blog" class="mb-12">
                        <h2 class="text-slate-200 font-semibold mb-6">Blog</h2>
                        <ul class="space-y-5">
                            <li v-for="post in posts" :key="post.id" class="flex items-start gap-4 hover-box">
                                <a :href="`/blogs/${post.slug}`" class="contents">
                                    <img :src="post.cover_image_url || 'https://placehold.co/96x48?text=No+Image'" alt="Blog Thumbnail" class="rounded img-fixed-ratio img-thumb" />
                                    <div>
                                        <h4 class="text-white font-medium">{{ post.short_title }}</h4>
                                        <p class="text-sm text-slate-400 mt-1">{{ post.published_at }}</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="/blogs" class="flex items-center text-accent hover:text-white mt-5">
                            <span>View More Posts</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H2a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </section>

                    <footer class="pt-8 border-t border-slate-700 text-slate-500 text-sm text-center sm:text-left">
                        <p>{{ footer }}</p>
                    </footer>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { IconArrowRight } from '@tabler/icons-vue';

const { owner_name, headline, profile_picture, resume_file, description, social_links, footer, experiences, projects, posts, show_blog } = defineProps({
    owner_name: { type: String },
    headline: { type: String },
    profile_picture: { type: String },
    resume_file: { type: String },
    description: { type: String },
    social_links: { type: Array },
    footer: { type: String },
    experiences: { type: Array },
    projects: { type: Array },
    posts: { type: Array },
    show_blog: { type: Boolean },
});

const root = ref(null);

let landing = null;

onMounted(() => {
    const mgRoot = root.value;
    const onMove = (e) => {
        const x = e.clientX || (e.touches && e.touches[0] && e.touches[0].clientX) || 0;
        const y = e.clientY || (e.touches && e.touches[0] && e.touches[0].clientY) || 0;
        mgRoot.style.setProperty('--mx1', x + 'px');
        mgRoot.style.setProperty('--my1', y + 'px');
        mgRoot.style.setProperty('--mx2', (x * 0.6) + 'px');
        mgRoot.style.setProperty('--my2', (y * 0.6) + 'px');
    };

    const rootEl = root.value;
    const navItems = Array.from(rootEl.querySelectorAll('.nav-item'));
    const sections = Array.from(rootEl.querySelectorAll('section'));

    const updateActiveFromHash = () => {
        const hash = window.location.hash || '#about';
        navItems.forEach(item => {
            const link = item.querySelector('.nav-link');
            if (!link) return;
            if (link.getAttribute('href') === hash) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    };

    const updateActiveOnScroll = () => {
        if (!sections.length) return;
        let currentSection = sections[0];

        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= 100 && rect.bottom >= 100) {
                currentSection = section;
            }
        });

        const id = currentSection.getAttribute('id');
        navItems.forEach(item => {
            const link = item.querySelector('.nav-link');
            if (!link) return;
            if (link.getAttribute('href') === `#${id}`) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    };

    landing = {
        updateActiveFromHash,
        updateActiveOnScroll,
        clickHandlers: [],
        mouseMoveHandler: onMove,
    };

    updateActiveFromHash();

    window.addEventListener('hashchange', updateActiveFromHash);
    window.addEventListener('scroll', updateActiveOnScroll);
    window.addEventListener('mousemove', onMove, { passive: true });
    window.addEventListener('touchmove', onMove, { passive: true });

    navItems.forEach(item => {
        const link = item.querySelector('.nav-link');
        if (!link) return;
        const handler = () => setTimeout(updateActiveFromHash, 10);
        link.addEventListener('click', handler);
        landing.clickHandlers.push({ link, handler });
    });
});

onBeforeUnmount(() => {
    if (!landing) return;
    window.removeEventListener('hashchange', landing.updateActiveFromHash);
    window.removeEventListener('scroll', landing.updateActiveOnScroll);
    try { window.removeEventListener('mousemove', landing.mouseMoveHandler); } catch (e) { }
    try { window.removeEventListener('touchmove', landing.mouseMoveHandler); } catch (e) { }
    landing.clickHandlers.forEach(({ link, handler }) => {
        try { link.removeEventListener('click', handler); } catch (e) { }
    });
    landing = null;
});
</script>

<style>
:root {
    --bg: #071223;
    --panel: #071a2a;
    --muted: #8aa0b0;
    --accent: #13f7d3;
}

body {
    background: linear-gradient(180deg, var(--bg) 0%, #041826 100%);
    font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
}

html {
    scroll-behavior: smooth;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: .75rem;
}

.nav-indicator {
    width: .5rem;
    height: 2px;
    background-color: #334155;
    display: inline-block;
    transition: width 220ms ease, background-color 220ms ease;
    width: 8px;
}

.nav-link {
    transition: color 160ms ease;
}

.nav-item:hover .nav-indicator,
.nav-item:focus-within .nav-indicator,
.nav-item.active .nav-indicator {
    width: 48px;
    background-color: #13f7d3;
}

.nav-item.active .nav-link {
    color: #ffffff;
}


.hover-box {
    position: relative;
}

.hover-box::before {
    content: '';
    position: absolute;
    top: -0.5rem;
    left: -0.5rem;
    right: -0.5rem;
    bottom: -0.5rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 0.5rem;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: -1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.hover-box:hover::before {
    opacity: 1;
}

.img-fixed-ratio {
    display: block;
    width: 100%;
    height: auto;
    object-fit: cover;
}

.img-thumb {
    width: 96px;
    max-width: 96px;
    aspect-ratio: 2 / 1;
    object-fit: cover;
    display: inline-block;
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

.antialiased.relative.z-10 {
    position: relative;
    z-index: 10;
}

@media (prefers-reduced-motion: reduce) {
    .mouse-gradient {
        display: none !important;
    }
}
</style>