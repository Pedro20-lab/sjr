@extends('layouts.app')
@section('content')

<x-table :headers="['Nombre', 'Apellido', 'Documento', 'Nro doc', 'Origen', 'Telefono', 'Editar', 'Eliminar']" :rows="$guest" :properties="['name_guest', 'lastname_guest', 'doc_guest', 'num_doc_guest', 'origin_guest', 'phone_guest']" :route="'guest'"/>    

@endsection




