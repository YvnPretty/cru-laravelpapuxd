<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'holi')</title>
        <style>
            body {
                margin: 0;
                min-height: 100vh;
                display: grid;
                place-items: center;
                font-family: system-ui, sans-serif;
                background: #fff7fb;
                color: #831843;
            }
            h1 { font-size: clamp(3rem, 12vw, 6rem); }
        </style>
    </head>
    <body>
        <main>
            @yield('content')
        </main>
    </body>
</html>
