<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $siteName = setting('owner_name', 'Portfolio');
        $siteDescription = setting('seo_description', setting('description', 'Portfolio website'));
        $siteImage = setting('seo_image', null, true) ?? setting('profile_picture', null, true) ?? asset('images/logo.webp');
        $canonical = rtrim(config('app.url', url('/')), '/');
        $keywords = setting('seo_keywords', '');
        $author = setting('seo_author', $siteName);
    @endphp
    <title>{{ setting('seo_title', $siteName) }}</title>
    <meta name="description" content="{{ $siteDescription }}">
    @if($keywords)
        <meta name="keywords" content="{{ $keywords }}">
    @endif
    <meta name="author" content="{{ $author }}">
    <meta name="robots" content="index,follow">
    <meta name="theme-color" content="#071223">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ setting('seo_title', $siteName) }}">
    <meta property="og:description" content="{{ $siteDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $siteImage }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ setting('seo_title', $siteName) }}">
    <meta name="twitter:description" content="{{ $siteDescription }}">
    <meta name="twitter:image" content="{{ $siteImage }}">
    <link rel="icon" href="{{ setting('favicon', null, true) ?? asset('images/logo.webp') }}">
    <link rel="apple-touch-icon" href="{{ setting('favicon', null, true) ?? asset('images/logo.webp') }}">
    <link rel="canonical" href="{{ $canonical }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>