<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Shop Management') }}</title>
    <style>
        * { box-sizing: border-box; }
        html, body { margin: 0; height: 100%; }
        .hero {
            min-height: 100vh;
            position: relative;
            background: url('{{ url('assets/frontend/images/grocery-banner.jpg') }}') center / cover no-repeat;
        }
        .btn-shop {
            position: absolute;
            left: 50%;
            bottom: 2rem;
            transform: translateX(-50%);
            display: inline-block;
            padding: 0.85rem 1.5rem;
            border-radius: 0.5rem;
            background: #1b7a4e;
            color: #fff;
            text-decoration: none;
            font: 600 1rem/1.2 "Segoe UI", system-ui, sans-serif;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }
        .btn-shop:hover { background: #145c3a; color: #fff; }
    </style>
</head>
<body>
    <section class="hero" role="img" aria-label="Grocery shop">
        <a class="btn-shop" href="{{ url(env('ADMIN_PATH', 'webadmin')) }}">Staff login</a>
    </section>
</body>
</html>
