<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zain Ali Asghar – Full Stack Laravel Developer crafting scalable web applications.">

    <title>@yield('title', 'Zain Ali Asghar – Full Stack Developer')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap"
        rel="stylesheet">

    {{-- VITE (REQUIRED FOR YOUR PROJECT) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head')
</head>

<body>

    @include('partials.nav')

    <main style="display:contents">
        @yield('content')
    </main>

    @include('partials.footer')

    @yield('scripts')

</body>

</html>
