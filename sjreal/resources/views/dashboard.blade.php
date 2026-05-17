{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

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
        @vite('resources/css/app.css')
    </head>
    <body>
        <header class="header">
            <nav class="list">
                <a href="{{route('login')}}" class="link link--vertical">
                    <img class="link__icon" src="{{ Vite::asset('resources/assets/logo.png')}}" alt="Logo">
                    <span class="link__text" >San José Real</span>
                </a>

                <a href="{{ route('user') }}" onclick="toggleMenu()" class="link link--vertical">                    
                    <span class="material-symbols-outlined link__icon">
                        person
                    </span>
                    <span class="link__text" for="">Perfil</span>
                </a>

            </nav>
        </header>
        <main class="main">
            <nav class="side__bar list--vertical">
                <a href="{{ route('booking.list') }}" class="link">
                    <span class="material-symbols-outlined">
                        description
                    </span>
                    <label>Reservas</label>
                </a>
                <a href="{{ route('inventory.list') }}" class="link">
                    <span class="material-symbols-outlined">
                        inventory
                    </span>
                    <label>Inventario</label>
                </a>
                <a href="{{ route('parking.list') }}" class="link">
                    <span class="material-symbols-outlined">
                        directions_car
                    </span>
                    <label for="">Parqueadero</label>
                </a>
                <a href="{{ route('payments.list') }}" class="link">
                    <span class="material-symbols-outlined">
                        manage_accounts
                    </span>
                    <label for="">Pagos</label>
                </a>
            </nav>
            <main class="main__content"> <!-- Esta clase no existe en styles.css  -->
                @yield('content', 'El contenido debe ir aquí')
            </main>
        </main>
    

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


<p>Aqui va un pequeño dashboard</p>