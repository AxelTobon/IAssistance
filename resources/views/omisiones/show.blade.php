@extends('layouts/layoutMaster')
@section('content')
@section('title', 'Omisiones')

@role('user')
<h1>INCIDENCIAS</h1>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
        <th>Número Empleado</th>
            <th>Nombre Empleado</th>
            <th>Adscripción</th>
            <th>Puesto</th>
            <th>Incidencia</th>
            <th>Fecha</th>
            <th>Motivo</th>
            <th>Notas</th>
            <th>Archivo</th>
            <!-- Agrega aquí las columnas adicionales que necesites mostrar -->
        </tr>
        </thead>
        @foreach ($omisionesA as $omision)
        <tr>
                <td>{{ $omision->numero_empleado }}</td>
                <td>{{ $omision->nombre_empleado }}</td>
                <td>{{ $omision->adscripcion }}</td>
                <td>{{ $omision->puesto }}</td>
                <td>{{ $omision->incidencia }}</td>
                <td>{{ $omision->fecha }}</td>
                <td>{{ $omision->motivo }}</td>
                <td>{{ $omision->notas }}</td>
                <td>
                @if ($omision->archivo)
                <a href="{{ asset('uploads/' . $omision->archivo) }}" download="{{ $omision->archivo }}">{{ $omision->archivo }}</a>
                @else
                    No disponible
                @endif
            </td>
            <!-- Agrega aquí las columnas adicionales que necesites mostrar -->
        </tr>
        @endforeach
    </table>


    <h2>Bajas</h2>
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre Empleado</th>
            <th>Número Empleado</th>
            <th>Fecha</th>
            <th>Descripción de Baja</th>
            <th>Duración de Baja</th>
        </tr>
        </thead>
        @foreach ($bajasA as $baja)
        <tr>
            <td>{{ $baja->id }}</td>
            <td>{{ $baja->nombre_empleado }}</td>
            <td>{{ $baja->numero_empleado }}</td>
            <td>{{ $baja->fecha }}</td>
            <td>{{ $baja->describaja }}</td>
            <td>{{ $baja->durabaja }}</td>
        </tr>
        @endforeach
    </table>


    <h2>Dias Economicos</h2>
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
        <th>ID</th>
            <th>Nombre Empleado</th>
            <th>Número Empleado</th>
            <th>Adscripción</th>
            <th>Solicitudes Hechas</th>
            <th>Fecha</th>
            </tr>
        </thead>
        @foreach ($solicitudesA as $solicitud)
        <tr>
            <td>{{ $solicitud->id }}</td>
            <td>{{ $solicitud->nombre_empleado }}</td>
            <td>{{ $solicitud->numero_empleado }}</td>
            <td>{{ $solicitud->adscripcion }}</td>
            <td>{{ $solicitud->acumulador }}</td>
            <td>{{ $solicitud->created_at }}</td>
        </tr>
        @endforeach
    </table>
    @endrole

    @role('admin')

    <h2> ADMIN</h2>

    <h1>INCIDENCIAS</h1>
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
        <th>Número Empleado</th>
            <th>Nombre Empleado</th>
            <th>Adscripción</th>
            <th>Puesto</th>
            <th>Incidencia</th>
            <th>Fecha</th>
            <th>Motivo</th>
            <th>Notas</th>
            <th>Archivo</th>
            <!-- Agrega aquí las columnas adicionales que necesites mostrar -->
        </tr>
        </thead>
        @foreach ($omisiones as $omision)
        <tr>
                <td>{{ $omision->numero_empleado }}</td>
                <td>{{ $omision->nombre_empleado }}</td>
                <td>{{ $omision->adscripcion }}</td>
                <td>{{ $omision->puesto }}</td>
                <td>{{ $omision->incidencia }}</td>
                <td>{{ $omision->fecha }}</td>
                <td>{{ $omision->motivo }}</td>
                <td>{{ $omision->notas }}</td>
                <td>
                @if ($omision->archivo)
                <a href="{{ asset('uploads/' . $omision->archivo) }}" download="{{ $omision->archivo }}">{{ $omision->archivo }}</a>
                @else
                    No disponible
                @endif
            </td>
            <!-- Agrega aquí las columnas adicionales que necesites mostrar -->
        </tr>
        @endforeach
    </table>


    <h2>Bajas</h2>
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Nombre Empleado</th>
            <th>Número Empleado</th>
            <th>Fecha</th>
            <th>Descripción de Baja</th>
            <th>Duración de Baja</th>
        </tr>
        </thead>
        @foreach ($bajas as $baja)
        <tr>
            <td>{{ $baja->id }}</td>
            <td>{{ $baja->nombre_empleado }}</td>
            <td>{{ $baja->numero_empleado }}</td>
            <td>{{ $baja->fecha }}</td>
            <td>{{ $baja->describaja }}</td>
            <td>{{ $baja->durabaja }}</td>
        </tr>
        @endforeach
    </table>


    <h2>Dias Economicos</h2>
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
        <th>ID</th>
            <th>Nombre Empleado</th>
            <th>Número Empleado</th>
            <th>Adscripción</th>
            <th>Solicitudes Hechas</th>
            <th>Fecha</th>
            </tr>
        </thead>
        @foreach ($solicitudes as $solicitud)
        <tr>
            <td>{{ $solicitud->id }}</td>
            <td>{{ $solicitud->nombre_empleado }}</td>
            <td>{{ $solicitud->numero_empleado }}</td>
            <td>{{ $solicitud->adscripcion }}</td>
            <td>{{ $solicitud->acumulador }}</td>
            <td>{{ $solicitud->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endrole
    

@endsection