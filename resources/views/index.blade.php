<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portfolio — Brittany Chiang style</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>

<body class="antialiased text-slate-100">
    <div class="min-h-screen max-w-6xl mx-auto px-6 py-12 lg:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <aside class="lg:col-span-3 flex flex-col items-start gap-8 lg:sticky lg:top-20 lg:max-h-[calc(100vh-10rem)] lg:overflow-auto">
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
                    <div class="flex items-center gap-3 text-slate-400">
                        <!-- Simple social icon placeholders -->
                        <a href="#" aria-label="github" class="hover:text-white">GitHub</a>
                        <a href="#" aria-label="linkedin" class="hover:text-white">LinkedIn</a>
                        <a href="#" aria-label="instagram" class="hover:text-white">Dribbble</a>
                    </div>
                </div>
            </aside>
            <main class="lg:col-span-9 text-slate-300">
                <section id="about" class="mb-10">
                    <div class="prose prose-invert max-w-none">
                        <p class="text-slate-400">I'm a developer passionate about crafting accessible, pixel-perfect user interfaces that blend thoughtful design with robust engineering. My favorite work lies at the intersection of design and development, creating experiences that not only look great but are meticulously built for performance and usability.</p>
                    </div>
                </section>

                <section id="experience" class="mb-12">
                    <h2 class="text-slate-200 font-semibold mb-6">Experience</h2>
                    <div class="space-y-8">
                        <article class="grid grid-cols-12 gap-4 hover-box">
                            <div class="col-span-2 text-slate-500 text-sm">2024 — Present</div>
                            <div class="col-span-10">
                                <h3 class="text-slate-100 font-medium">Senior Frontend Engineer, Accessibility — Klaviyo</h3>
                                <p class="text-sm text-slate-400 mt-2">Build and maintain critical components used to construct Klaviyo's frontend across the whole product. Work closely with cross-functional teams to ensure accessibility and performance.</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <span class="inline-block bg-slate-800 text-xs text-accent px-2 py-1 rounded">JavaScript</span>
                                    <span class="inline-block bg-slate-800 text-xs text-accent px-2 py-1 rounded">TypeScript</span>
                                    <span class="inline-block bg-slate-800 text-xs text-accent px-2 py-1 rounded">React</span>
                                </div>
                            </div>
                        </article>

                        <article class="grid grid-cols-12 gap-4 hover-box">
                            <div class="col-span-2 text-slate-500 text-sm">2018 — 2024</div>
                            <div class="col-span-10">
                                <h3 class="text-slate-100 font-medium">Lead Engineer — Upstatement</h3>
                                <p class="text-sm text-slate-400 mt-2">Lead, build, style, and ship high-quality websites, design systems, and mobile apps for a diverse array of clients.</p>
                                <div class="mt-3 flex flex-wrap gap-2">
                                    <span class="inline-block bg-slate-800 text-xs text-accent px-2 py-1 rounded">React</span>
                                    <span class="inline-block bg-slate-800 text-xs text-accent px-2 py-1 rounded">Node</span>
                                    <span class="inline-block bg-slate-800 text-xs text-accent px-2 py-1 rounded">PHP</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>

                <section id="projects" class="mb-12">
                    <h2 class="text-slate-200 font-semibold mb-6">Projects</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="hover-box">
                            <div class="h-28 bg-slate-700 rounded mb-3"></div>
                            <h4 class="text-white font-medium">Build a Spotify Connected App</h4>
                            <p class="text-sm text-slate-400 mt-2">Video course that teaches how to build a web app with the Spotify Web API.</p>
                        </div>

                        <div class="hover-box">
                            <div class="h-28 bg-slate-700 rounded mb-3"></div>
                            <h4 class="text-white font-medium">Spotify Profile</h4>
                            <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                        </div>
                        <div class="hover-box">
                            <div class="h-28 bg-slate-700 rounded mb-3"></div>
                            <h4 class="text-white font-medium">Spotify Profile</h4>
                            <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                        </div>
                    </div>
                </section>

                <section id="blog" class="mb-12">
                    <h2 class="text-slate-200 font-semibold mb-6">Blog</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4 hover-box">
                            <div class="w-24 h-12 bg-slate-700 rounded"></div>
                            <div>
                                <a href="#" class="text-white font-medium">6 Common Accessibility Pitfalls and How to Avoid Them</a>
                                <p class="text-sm text-slate-400 mt-1">2024</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4 hover-box">
                            <div class="w-24 h-12 bg-slate-700 rounded"></div>
                            <div>
                                <a href="#" class="text-white font-medium">Integrating Algolia Search with WordPress Multisite</a>
                                <p class="text-sm text-slate-400 mt-1">2020</p>
                            </div>
                        </li>
                    </ul>
                </section>

                <footer class="pt-8 border-t border-slate-700 text-slate-500 text-sm">
                    <p>Loosely designed in Figma and coded in Visual Studio Code by yours truly. Built with Next.js and Tailwind CSS.</p>
                </footer>
            </main>
        </div>
    </div>
    <script>
        (function () {
            const navItems = document.querySelectorAll('.nav-item');
            const sections = document.querySelectorAll('section');

            function updateActiveFromHash() {
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
            }

            function updateActiveOnScroll() {
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
            }

            // Initial state
            updateActiveFromHash();

            // Update on hash change
            window.addEventListener('hashchange', updateActiveFromHash);

            // Update on scroll
            window.addEventListener('scroll', updateActiveOnScroll);

            // If user clicks a nav link, give it active state immediately
            navItems.forEach(item => {
                const link = item.querySelector('.nav-link');
                if (!link) return;
                link.addEventListener('click', () => {
                    // small timeout to allow hash to update
                    setTimeout(updateActiveFromHash, 10);
                });
            });
        })();
    </script>
</body>

</html>