@extends('layouts.app')
@section('content')
    <x-search-button :controller="'guest'" :filter="'num_doc_guest'" :label="'documento'"/>

    <x-table :headers="['Nombre', 'Apellido', 'Documento', 'Nro doc', 'Origen', 'Telefono', 'Editar', 'Eliminar']" :rows="$guests" :properties="['name_guest', 'lastname_guest', 'doc_guest', 'num_doc_guest', 'origin_guest', 'phone_guest']" :route="'guest'"/>    
@endsection

<!-- in another template -->

