@extends('layouts/layoutMaster')
@section('content')
@section('title', 'Usuarios')
@role('admin')
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Numero Empleado</th>
            <th>Correo</th>
            <th>Fecha de creacion</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach( $users as $user )
        <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->nempleado}}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at}}</td>
        <td>{{ $user->status }}</td>
        <td>
            
        
        <a href="{{ url('/users/'.$user->id.'/edit') }}" class="btn btn-warning"> Editar</a> |
        
        <form action="{{ url('/users/'.$user->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Deseas borrar a este empleado?')" value="Borrar">
                </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endrole
@endsection