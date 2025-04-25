<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=delete,description,directions_car,edit,inventory,manage_accounts,person" />
        <!-- Scripts -->
        @vite(['resources/css/styles.css', 'resources/js/app.js'])

    </head>
    <body>
        <header class="header">
            <nav class="nav">
                <a href="{{route('home')}}" class="nav__item">
                    <img src="{{ Vite::asset('resources/assets/logo.png')}}" alt="Logo">
                    <span>Hotel San José</span>
                </a>
                <a class="nav__item ">
                    <label for="">Bienvenido Pedro</label>
                    <span class="material-symbols-outlined">
                        person
                    </span>
                </a>
            </nav>
        </header>

        <div class="main">
            <div class="side__bar">
                @include('layouts.navigation')
            </div>

            <!-- Page Content -->
            <main class="main__content">
                @yield('content', 'El contenido debe ir aquí')
            </main>
        </div>
    </body>
</html>
