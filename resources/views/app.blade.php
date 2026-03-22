<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ setting('owner_name', 'Portfolio') }}</title>
    <link rel="icon" href="{{ setting('favicon', null, true) ?? asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" href="{{ setting('favicon', null, true) ?? asset('images/logo.webp') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>