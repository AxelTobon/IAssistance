@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
<h4>Home Page</h4>
<!-- <h4>Contenido publico</h4> -->
@role('admin')
<h4>Contenido ADMIN</h4>
@endrole
@role('user')
<h4>Usuarios</h4>
<!-- 
<h4>Pase de lista</h4>


<button class="btn btn-primary d-grid w-100" type="submit">Asistencia</button> -->




@endrole
<img src="{{asset('assets/img/Logo.jpg')}}" class="img-fluid" alt="Logo" style="display: block; margin: 0 auto;>
@endsection
