@extends('layouts/layoutMaster')
@section('content')
@section('title', 'Bajas')


<h1>Bajas</h1>

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

    <form action="{{ url('/bajas') }}" method="post">
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
    <label for="Tipo"> Descripcion de Baja </label>
        <input type="text" name='describaja' id='describaja'  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese la descripcion" >
    </div>
    <div class="form-group">
    <label for="Tipo"> Duracion de Baja </label>
    <select name="durabaja" id="durabaja" class="form-select" aria-label="Default select example">
  <option value="1_Semana">1 Semana</option>
  <option value="2 Semanas">2 Semanas</option>
  <option value="3 Semanas">3 Semanas</option>
  <option value="1 Mes">1 Mes</option>
  <option value="2 Meses">2 Meses</option>
  <option value="3_Meses">3 Meses</option>
  <option value="4_Meses">4 Meses</option>
  <option value="5_Meses">5 Meses</option>
  <option value="6_Meses">6 Meses</option>
  <option value="7_Meses">7 Meses</option>
  <option value="8_Meses">8 Meses</option>
  <option value="9_Meses">9 Meses</option>
  <option value="10_Meses">10 Meses</option>
  <option value="11_Meses">11 Meses</option>
  <option value="1_Año">1 Año</option>
</select>
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