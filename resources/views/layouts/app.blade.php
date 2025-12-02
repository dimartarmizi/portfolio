<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PT Agra Mitra Dinamika')</title>
    <meta name="description" content="PT Agra Mitra Dinamika — solusi ERP, website, dan aplikasi mobile untuk digitalisasi bisnis.">
    <meta name="author" content="PT Agra Mitra Dinamika">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
    @stack('head')
</head>

<body class="antialiased text-gray-800 bg-white">

    @include('partials.header')

    <main class="min-h-[60vh]">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')

</body>

</html>