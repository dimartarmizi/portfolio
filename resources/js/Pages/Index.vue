<template>
    <div class="antialiased text-slate-100 relative z-10" ref="root">
        <div class="mouse-gradient" ref="mouseGradient" aria-hidden="true">
            <div class="g g1"></div>
        </div>
        <div class="min-h-screen max-w-6xl mx-auto px-6 py-12 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <aside class="lg:col-span-4 flex flex-col items-start gap-8 lg:sticky lg:top-20 lg:max-h-[calc(100vh-10rem)] lg:overflow-auto">
                    <div class="w-full">
                        <h1 class="text-3xl font-extrabold tracking-tight">Brittany Chiang</h1>
                        <p class="mt-2 text-slate-400">Front End Engineer</p>
                    </div>

                    <nav class="w-full mt-6">
                        <ul class="space-y-3 text-slate-300">
                            <li class="nav-item">
                                <span class="nav-indicator" aria-hidden="true"></span>
                                <a href="#about" class="nav-link hover:text-white">About</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-indicator" aria-hidden="true"></span>
                                <a href="#experience" class="nav-link hover:text-white">Experience</a>
                            </li>
                            <li class="nav-item">
                                <span class="nav-indicator" aria-hidden="true"></span>
                                <a href="#projects" class="nav-link hover:text-white">Projects</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="w-full mt-auto">
                        <div class="flex items-center gap-4 text-slate-400">
                            <a href="#" class="hover:text-white" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                </svg></a>
                            <a href="#" class="hover:text-white" aria-label="GitHub">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                                </svg>
                            </a>
                            <a href="#" class="hover:text-white" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                </svg>
                            </a>
                            <a href="#" class="hover:text-white" aria-label="LinkedIn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </aside>
                <main class="lg:col-span-8 text-slate-300">
                    <section id="about" class="mb-10">
                        <div class="prose prose-invert max-w-none">
                            <p class="text-slate-400">I'm a developer passionate about crafting accessible, pixel-perfect user interfaces that blend thoughtful design with robust engineering. My favorite work lies at the intersection of design and development, creating experiences that not only look great but are meticulously built for performance and usability.</p>
                        </div>
                    </section>

                    <section id="experience" class="mb-12">
                        <h2 class="text-slate-200 font-semibold mb-6">Experience</h2>
                        <div class="space-y-8">
                            <div class="grid grid-cols-12 gap-4 hover-box">
                                <a href="#" class="contents">
                                    <div class="col-span-2 text-slate-500 text-sm">2024 — Present</div>
                                    <div class="col-span-10">
                                        <h3 class="text-slate-100 font-medium">Senior Frontend Engineer, Accessibility — Klaviyo</h3>
                                        <p class="text-sm text-slate-400 mt-2">Build and maintain critical components used to construct Klaviyo's frontend across the whole product. Work closely with cross-functional teams to ensure accessibility and performance.</p>
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            <span class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">JavaScript</span>
                                            <span class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">TypeScript</span>
                                            <span class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">React</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="grid grid-cols-12 gap-4 hover-box">
                                <a href="#" class="contents">
                                    <div class="col-span-2 text-slate-500 text-sm">2018 — 2024</div>
                                    <div class="col-span-10">
                                        <h3 class="text-slate-100 font-medium">Lead Engineer — Upstatement</h3>
                                        <p class="text-sm text-slate-400 mt-2">Lead, build, style, and ship high-quality websites, design systems, and mobile apps for a diverse array of clients.</p>
                                        <div class="mt-3 flex flex-wrap gap-2">
                                            <span class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">React</span>
                                            <span class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">Node</span>
                                            <span class="inline-block bg-emerald-800 text-xs text-accent px-2 py-1 rounded">PHP</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="flex items-center text-accent hover:text-white mt-5">
                            <span>View Full Resume</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H2a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </section>

                    <section id="projects" class="mb-12">
                        <h2 class="text-slate-200 font-semibold mb-6">Projects</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            <div class="hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/1920x1080" alt="Project Thumbnail" class="rounded mb-3 img-fixed-ratio" />
                                    <h4 class="text-white font-medium">Build a Spotify Connected App</h4>
                                    <p class="text-sm text-slate-400 mt-2">Video course that teaches how to build a web app with the Spotify Web API.</p>
                                </a>
                            </div>

                            <div class="hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/1920x1080" alt="Project Thumbnail" class="rounded mb-3 img-fixed-ratio" />
                                    <h4 class="text-white font-medium">Spotify Profile</h4>
                                    <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                                </a>
                            </div>
                            <div class="hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/1920x1080" alt="Project Thumbnail" class="rounded mb-3 img-fixed-ratio" />
                                    <h4 class="text-white font-medium">Spotify Profile</h4>
                                    <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                                </a>
                            </div>
                            <div class="hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/1920x1080" alt="Project Thumbnail" class="rounded mb-3 img-fixed-ratio" />
                                    <h4 class="text-white font-medium">Build a Spotify Connected App</h4>
                                    <p class="text-sm text-slate-400 mt-2">Video course that teaches how to build a web app with the Spotify Web API.</p>
                                </a>
                            </div>

                            <div class="hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/1920x1080" alt="Project Thumbnail" class="rounded mb-3 img-fixed-ratio" />
                                    <h4 class="text-white font-medium">Spotify Profile</h4>
                                    <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                                </a>
                            </div>
                            <div class="hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/1920x1080" alt="Project Thumbnail" class="rounded mb-3 img-fixed-ratio" />
                                    <h4 class="text-white font-medium">Spotify Profile</h4>
                                    <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="flex items-center text-accent hover:text-white mt-5">
                            <span>View Full Projects</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H2a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </section>

                    <section id="blog" class="mb-12">
                        <h2 class="text-slate-200 font-semibold mb-6">Blog</h2>
                        <ul class="space-y-5">
                            <li class="flex items-start gap-4 hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/100x500" alt="Blog Thumbnail" class="rounded img-fixed-ratio img-thumb" />
                                    <div>
                                        <h4 class="text-white font-medium">6 Common Accessibility Pitfalls and How to Avoid Them</h4>
                                        <p class="text-sm text-slate-400 mt-1">2024</p>
                                    </div>
                                </a>
                            </li>
                            <li class="flex items-start gap-4 hover-box">
                                <a href="#" class="contents">
                                    <img src="https://placehold.co/96x48" alt="Blog Thumbnail" class="rounded img-fixed-ratio img-thumb" />
                                    <div>
                                        <h4 class="text-white font-medium">Integrating Algolia Search with WordPress Multisite</h4>
                                        <p class="text-sm text-slate-400 mt-1">2020</p>
                                    </div>
                                </a>
                            </li>
                            <li class="flex items-start gap-4 hover-box">
                                <a href="#" class="contents">
                                    <div>
                                        <h4 class="text-white font-medium">Integrating Algolia Search with WordPress Multisite</h4>
                                        <p class="text-sm text-slate-400 mt-1">2020</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="flex items-center text-accent hover:text-white mt-5">
                            <span>View More Posts</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H2a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </section>

                    <footer class="pt-8 border-t border-slate-700 text-slate-500 text-sm">
                        <p>Loosely designed in Figma and coded in Visual Studio Code by yours truly. Built with Next.js and Tailwind CSS.</p>
                    </footer>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

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