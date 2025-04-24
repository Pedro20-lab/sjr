<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8fafc;
    }

    header {
        background-color: #1a202c;
        color: white;
        padding: 1rem 2rem;
    }

    nav a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    nav a:hover {
        color: #63b3ed;
    }

    .material-symbols-outlined {
        vertical-align: middle;
        margin-left: 0.5rem;
    }

    .bg-gray-100 {
        display: flex;
        flex-direction: row;
        padding: 1rem;
    }

    .grow-1 {
        flex: 1;
        max-width: 20%;
        background-color: #edf2f7;
        padding: 1rem;
        border-radius: 8px;
    }

    .grow-2 {
        flex: 2;
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    main {
        margin-top: 1rem;
    }

    label {
        font-size: 1rem;
        margin-right: 0.5rem;
    }
</style>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=delete,description,directions_car,edit,inventory,manage_accounts,person" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans ">
        <header class="w-full">
            <nav class="flex justify-between">
                <a href="" >
                    <img src="">Logo
                </a>
                <a class="flex justify-between border-b-2 border-solid border-gray-500">
                    <label for="">Bienvenido {{ 'user' /*Nombre del usuario*/}}</label>
                    <span class="material-symbols-outlined">
                        person
                    </span>
                </a>
            </nav>
        </header>

        <div class=" bg-gray-100 min-w-full flex ">
            <div class="grow-1 mx-3">
                @include('layouts.navigation')
            </div>

            <!-- Page Content -->
            <main class="grow-2 mx-3">
                @yield('content', 'El contenido debe ir aquí')
            </main>
        </div>
    </body>
</html>
