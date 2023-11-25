<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/normalize.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @yield('stylesheets')
    <script>
        window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
    </script>
</head>

<body>
    <main>
        @include('partials.navbar')
        @yield('content')
    </main>
    @vite('resources/js/app.js')
    @yield('scripts')
</body>

</html>
