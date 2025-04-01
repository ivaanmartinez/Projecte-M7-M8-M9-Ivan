<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Videos App' }}</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header Styles */
        .app-header {
            background-color: #212121; /* Gris oscuro */
            color: #fff;
            padding: 40px 0;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .app-header-title {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #333; /* Gris muy oscuro */
            padding: 12px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .navbar-nav li {
            display: inline-block;
            margin: 0 30px;
        }

        .navbar-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.3s ease;
        }

        .navbar-nav a:hover {
            color: #d4af37; /* Dorado elegante */
        }

        /* Footer Styles */
        .app-footer {
            background-color: #212121; /* Gris oscuro */
            color: #aaa;
            padding: 20px 0;
            text-align: center;
            border-top: 2px solid #444;
            margin-top: 50px;
        }

        .app-footer-text {
            font-size: 14px;
            margin: 0;
            color: #bbb;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .navbar-nav li {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>

<header class="app-header">
    <h1 class="app-header-title">Videos App - Ivan Martinez Perez</h1>
</header>

<!-- Navbar -->
<nav class="navbar">
    <ul class="navbar-nav">
        <li><a href="{{ route('videos.manage.index') }}">Gestió de Vídeos</a></li>
        <li><a href="{{ route('videos.index') }}">Inici</a></li>
        <li><a href="{{ route('users.manage.index') }}">Gestio D'usuaris</a></li>

    </ul>
</nav>

<main>
    {{ $slot }}
</main>

<footer class="app-footer">
    <p class="app-footer-text">&copy; {{ date('Y') }} Videos App | Ivan Martinez Perez</p>
</footer>

</body>
</html>
