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
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <header class="header">
            <a href="{{route('login')}}" class="link link--vertical">
                <img class="link__icon" src="{{ Vite::asset('resources/assets/logo.png')}}" alt="Logo">
                <strong class="link__text">Hotel San José Real</strong>
            </a>
        </header>

             
        <nav class="list--vertical">
            <a href="" class="link">
                <span class="material-symbols-outlined">description</span>
                <label>Reservas</label>
            </a>
            <a href="" class="link">
                <span class="material-symbols-outlined">
                    inventory
                </span>
                <label>Inventario</label>
            </a>
            <a href="" class="link">
                <span class="material-symbols-outlined">
                    directions_car
                </span>
                <label for="">Parqueadero</label>
            </a>
            <a href="" class="link">
                <span class="material-symbols-outlined">
                    directions_car
                </span>
                <label for="">Pagos</label>
            </a>
        </nav>
    
        <div class="main">                    
            <main class="main__content">
                @yield('content', 'Bienvenido al sistema de gestión del Hotel San José Real')
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

