@extends('layouts/layoutMaster')
@section('content')
@section('title', 'Solicitudes')



<h1>SOLICITUDES</h1>

@if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <form action="{{ url('/solicitud') }}" method="post">
    @csrf
<div class="form-group">
        <!-- <label for="Tipo"> Tipo de solicitud </label>
        <select name="Tipo" id="Tipo">
        <option type="text"  value="Economico">Economico</option>
        <option value="Incapacidad">Incapacidad</option>
        <option value="Retardo">Retardo</option>
        </select> -->
        <!-- <input type="text" class="form-control" name='Nombre' value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id='Nombre' placeholder="Introduzca su nombre"> -->
        <!-- <label for="Tipo"> Nombre del profesor </label>
        <input type="text" name='nombre_empleado' id='nombre_empleado' class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese su nombre"> -->

    </div>

    <!-- <div class="form-group">
        <br>
        <label for="Desc"> Numeros del empleado </label>
        <input type="number" name='numero_empleado' id='numero_empleado' class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese su numero de empleado">
        <br>
    </div> -->


    <div class="form-group">
        <br>
        <label for="Desc"> Numeros del empleado </label>
        <select name="numero_empleado" id="numero_empleado" onchange="getUserName()" class="form-select" aria-label="Default select example" >
    @foreach ($users as $user)
        <!-- <option value="{{ $user->nempleado }}">{{ $user->nempleado }}</option> -->
        <option class="employee-option" value="{{ $user->nempleado }}" data-name="{{ $user->name }}">{{ $user->nempleado }}</option>
        
    @endforeach
</select>

        <br>
    </div>



    <div class="form-group">
        <!-- <label for="Tipo"> Tipo de solicitud </label>
        <select name="Tipo" id="Tipo">
        <option type="text"  value="Economico">Economico</option>
        <option value="Incapacidad">Incapacidad</option>
        <option value="Retardo">Retardo</option>
        </select> -->
        <!-- <input type="text" class="form-control" name='Nombre' value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id='Nombre' placeholder="Introduzca su nombre"> -->

        <label for="Tipo"> Nombre del profesor </label>
        <input type="text" name='nombre_empleado' id='nombre_empleado'  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese su nombre" readonly>
        
        

        <!-- <input type="text" name="employee_name" id="employee_name" readonly> -->

    </div>


    <div class="form-group">
        <br>
        <label for="Desc"> Adscripción </label>
        <!-- <input type="text" name='adscripcion' id='adscripcion' class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese adscripción"> -->


        <select name="adscripcion" id="adscripcion" class="form-select" aria-label="Default select example">
    @foreach ($adscripcions as $id => $adscripcion)
        <option value="{{ $adscripcion }}">{{ $adscripcion }}</option>
    @endforeach
</select>


        
        <br>
    </div>



    <!-- <div class="form-group">
        <label for="Foto"> Adjuntar archivos </label>
        @if(isset($empleado->Foto))
            <br>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width='350' alt="">
        @endif
        <br>
        <input type="file" class="form-control" name='Foto' id='Foto' value='' value="Buscar foto">
    </div> -->
    <br>


<input type="submit" class="btn btn-success" value="Enviar">
<a class="btn btn-primary" href="{{url('/solicitud/index') }}"> Regresar </a>
<br>
</form>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var options = document.getElementsByClassName('employee-option');
        var employeeNameInput = document.getElementById('nombre_empleado');

        Array.prototype.forEach.call(options, function(option) {
            option.addEventListener('click', function() {
                var selectedName = option.getAttribute('data-name');
                employeeNameInput.value = selectedName;
            });
        });
    });
</script>
@endsection