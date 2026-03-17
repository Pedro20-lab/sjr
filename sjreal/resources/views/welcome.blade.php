@extends('layouts.base')
@section('content')
    <header class="header">
        <a href="{{route('home')}}" class="link">
            <img src="{{Vite::asset('resources/assets/logo.png')}}" alt="Logo del hotel">
            <span>San José Real</span>
        </a>
        
        <nav class="list list--vertical">
            <a href="" class="link">
                <span class="material-symbols-outlined">
                    description
                </span>
                <label>Reservas</label>
            </a>

            <a href="" class="link">
                <span class="material-symbols-outlined">
                    description
                </span>
                <label>Reservas</label>
            </a>

            <a href="" class="link">
                <span class="material-symbols-outlined">
                    description
                </span>
                <label>Reservas</label>
            </a>

            <a href="" class="link">
                <span class="material-symbols-outlined">
                    description
                </span>
                <label>Reservas</label>
            </a>
        </nav>
    </header>
    <main>
        <section>
            <p>Lorem ipsum</p>
            <button>
                Accion
            </button>
        </section>
    </main>

    <div>
        <section>
            <h3>Titulo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quod quaerat voluptate accusamus placeat veniam at non, impedit minus excepturi quasi molestias nemo architecto deserunt! Quos assumenda consequuntur necessitatibus minus.</p>
            <button>Accion</button>
        </section>
        <section>
            <h3>Titulo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quod quaerat voluptate accusamus placeat veniam at non, impedit minus excepturi quasi molestias nemo architecto deserunt! Quos assumenda consequuntur necessitatibus minus.</p>
            <button>Accion</button>
        </section>
        <section>
            <h3>Titulo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita quod quaerat voluptate accusamus placeat veniam at non, impedit minus excepturi quasi molestias nemo architecto deserunt! Quos assumenda consequuntur necessitatibus minus.</p>
            <button>Accion</button>
        </section>
    </div>
@endsection