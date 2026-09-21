<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaTrace - @yield('titulo')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f7f6;
        }

        nav {
            background: #005f73;
            color: white;
            padding: 15px;
        }

        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('inicio') }}">Inicio</a>
        <a href="{{ route('lotes.index') }}">Inventario de Lotes</a>
    </nav>

    <div class="container">
        @yield('contenido')
    </div>
</body>

</html>