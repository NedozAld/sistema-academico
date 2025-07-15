@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mi Perfil</h1>
    <ul>
        <li><strong>Cédula:</strong> {{ $estudiante->idest }}</li>
        <li><strong>Nombre:</strong> {{ $estudiante->nombresest }} {{ $estudiante->apellidosest }}</li>
        <li><strong>Dirección:</strong> {{ $estudiante->direccionest }}</li>
        <li><strong>Email:</strong> {{ $estudiante->mailest }}</li>
        <li><strong>Fecha de nacimiento:</strong> {{ $estudiante->nacimientoest }}</li>
    </ul>
</div>
@endsection
