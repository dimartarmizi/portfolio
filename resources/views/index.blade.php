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
                        <li class="flex items-center gap-3">
                            <span class="w-2 h-0.5 bg-slate-600 inline-block"></span>
                            <a href="#about" class="hover:text-white">About</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-2 h-0.5 bg-slate-600 inline-block"></span>
                            <a href="#experience" class="hover:text-white">Experience</a>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="w-2 h-0.5 bg-slate-600 inline-block"></span>
                            <a href="#projects" class="hover:text-white">Projects</a>
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
                        <article class="grid grid-cols-12 gap-4">
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

                        <article class="grid grid-cols-12 gap-4">
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
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-slate-800 p-4 rounded">
                            <div class="h-28 bg-slate-700 rounded mb-3"></div>
                            <h4 class="text-white font-medium">Build a Spotify Connected App</h4>
                            <p class="text-sm text-slate-400 mt-2">Video course that teaches how to build a web app with the Spotify Web API.</p>
                        </div>

                        <div class="bg-slate-800 p-4 rounded">
                            <div class="h-28 bg-slate-700 rounded mb-3"></div>
                            <h4 class="text-white font-medium">Spotify Profile</h4>
                            <p class="text-sm text-slate-400 mt-2">Web app for visualizing personalized Spotify data.</p>
                        </div>
                    </div>
                </section>

                <section id="blog" class="mb-12">
                    <h2 class="text-slate-200 font-semibold mb-6">Selected Writing</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4">
                            <div class="w-24 h-12 bg-slate-700 rounded"></div>
                            <div>
                                <a href="#" class="text-white font-medium">6 Common Accessibility Pitfalls and How to Avoid Them</a>
                                <p class="text-sm text-slate-400 mt-1">2024</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
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
</body>

</html>