<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Registro de nombres')</title>
        <style>
            * { box-sizing: border-box; }
            body { margin: 0; background: #f3f6f8; color: #19343d; font: 17px/1.6 system-ui, sans-serif; }
            header { background: #12343b; color: white; padding: 22px max(24px, calc((100% - 850px)/2)); }
            header strong { display: block; font-size: 22px; }
            header span { color: #bde7d5; font-size: 14px; }
            main { max-width: 850px; margin: 40px auto; padding: 32px; background: white; border: 1px solid #d9e3e7; border-radius: 16px; }
            h1 { line-height: 1.2; margin-top: 0; overflow-wrap: anywhere; }
            a { color: #086a4d; margin-right: 18px; text-underline-offset: 4px; }
            li { padding: 12px 0; border-bottom: 1px solid #e4ebed; overflow-wrap: anywhere; }
            label { display: block; font-weight: 600; margin: 24px 0 8px; }
            input { width: 100%; border: 1px solid #8fa5ad; border-radius: 8px; padding: 12px; font: inherit; }
            button { background: #086a4d; color: white; border: 0; border-radius: 8px; padding: 12px 22px; font: inherit; cursor: pointer; margin: 20px 0; }
            button:hover { background: #064d39; }
            :focus-visible { outline: 3px solid #e6a126; outline-offset: 3px; }
            @media (max-width: 600px) { main { margin: 20px 14px; padding: 24px; } }
        </style>
    </head>
    <body>
        <header><strong>Registro de nombres</strong><span>Crear, consultar, editar y eliminar</span></header>
        <main>
            @yield('content')
        </main>
    </body>
</html>
