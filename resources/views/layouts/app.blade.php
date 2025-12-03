<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Portfolio')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>

<body class="antialiased text-slate-100">
    <header class="py-8">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            <div class="lg:col-span-4">
                <a href="{{ route('index') }}" class="text-2xl font-extrabold tracking-tight">Brittany Chiang</a>
                <div class="text-slate-400 mt-1">Front End Engineer</div>
            </div>
            <nav class="lg:col-span-8 text-right hidden lg:block">
                <a href="{{ route('index') }}" class="text-slate-300 hover:text-white mx-3">Home</a>
                <a href="{{ route('projects.index') }}" class="text-slate-300 hover:text-white mx-3">Projects</a>
                <a href="{{ route('blogs.index') }}" class="text-slate-300 hover:text-white mx-3">Blog</a>
                <a href="{{ route('experiences.index') }}" class="text-slate-300 hover:text-white mx-3">Experience</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="py-8 text-center text-slate-500 text-sm">
        <div class="container">© {{ date('Y') }} — Built with Tailwind</div>
    </footer>
</body>

</html>