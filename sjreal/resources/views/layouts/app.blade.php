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
            <nav class="list">
                <a href="{{route('login')}}" class="link link--vertical">
                    <img class="link__icon" src="{{ Vite::asset('resources/assets/logo.png')}}" alt="Logo">
                    <span class="link__text" >San José Real</span>
                </a>

                <a onclick="toggleMenu()" class="link link--vertical">                    
                    <span class="material-symbols-outlined link__icon">
                        person
                    </span>
                    <span class="link__text" for="">Opciones</span>
                </a>
                <div id="menu" class="side__bar hidden">
                    @include('layouts.navigation')
                </div>

            </nav>
        </header>

        <div class="main">        
            <!-- Page Content -->
            <main class="main__content">
                @yield('content', 'El contenido debe ir aquí')
            </main>
        </div>
    </body>
    <script>
        let options = document.querySelectorAll('.list > .link')[1]
        
        function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('hidden');
        options.classList.toggle('hidden')
        }
    </script>
</html>

