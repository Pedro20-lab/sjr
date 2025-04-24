@extends('layouts.app')
@section('content')
    <x-table :headers="['Nombre', 'Apellido', 'Documento', 'Nro doc', 'Origen', 'Telefono']" :rows="$guests" :properties="['name_guest', 'lastname_guest', 'doc_guest', 'num_doc_guest', 'origin_guest', 'phone_guest']"/>
    {{-- :rows=$guests :$properties='["name_guest", "lastname_guest", "doc_guest", "num_doc_guest", "origin_guest", "phone_guest"]' --}}
@endsection

<!-- in another template -->

