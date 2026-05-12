<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'SIKATT - Kelurahan Tanah Tinggi' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 text-slate-800">
        @include('components.navbar')

        <main>
            {{ $slot }}
        </main>

        @include('components.footer')
    </body>
</html>
