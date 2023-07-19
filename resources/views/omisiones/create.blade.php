@extends('layouts/layoutMaster')
@section('content')
@section('title', 'Omisiones')


<h1>JUSTIFICACIÓN DE INCIDENCIAS</h1>

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

    <form action="{{ url('/omisiones') }}" method="post" enctype="multipart/form-data">
    @csrf

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
    
        <label for="Tipo"> Nombre del profesor </label>
        <input type="text" name='nombre_empleado' id='nombre_empleado'  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese su nombre" readonly>    

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
    <div>
    <label for="Desc"> Puesto </label>
    <input type="text" name='puesto' id='puesto'  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese su puesto">    
    <br>
    </div>

    <div>
    <h2>Incidencias</h2>
    <br>
    <input type="checkbox" class="form-check-input" name="incidencia[]" value="retardo"> RETARDO<br>
<input type="checkbox" class="form-check-input" name="incidencia[]" value="falta"> FALTA<br>
<input type="checkbox" class="form-check-input" name="incidencia[]" value="omision_entrada"> OMISIÓN ENTRADA<br>
<input type="checkbox" class="form-check-input" name="incidencia[]" value="omision_salida"> OMISIÓN DE SALIDA<br>
<input type="checkbox" class="form-check-input" name="incidencia[]" value="salida_anticipada"> SALIDA ANTICIPADA<br>
    </div>
    <br>

    <div>
    <h2>Fecha de incidencia</h2>
    <!-- <input type="date" name="fecha" required> -->
    <input type="date" id="fecha" name="fecha" readonly>
    </div>

    <br>    
    <h2>Motivo</h2>
<div>
    <label>
        <input type="radio" name="motivo" class="form-check-input" value="comision_trabajo" required>
        Comisión de trabajo
    </label>
</div>

<div>
    <label>
        <input type="radio" name="motivo" class="form-check-input" value="cursos" required>
        Cursos
    </label>
</div>

<div>
    <label>
        <input type="radio" name="motivo" class="form-check-input" value="Artículo 7 del CCT" required>
        Artículo 7 del CCT
    </label>
</div>

<div>
    <label>
        <input type="radio" name="motivo" class="form-check-input" value="otro" required>
        Otro
    </label>
</div>

<div id="input-container" style="display: none;">
    <label for="motivo_text"></label>
    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="motivo_text" id="motivo_text" placeholder="" required>
</div>

<br>

<input type="file" name="archivo">

<br>

<div>
<label for="notas">Notas</label>
<input type="text" name='notas' id='notas'  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Ingrese su notas">       
</div>
 
<input type="submit" class="btn btn-success" value="Enviar">
<a class="btn btn-primary" href="{{url('/solicitud/index') }}"> Regresar </a>
</form>


<script>
    document.querySelectorAll('input[name="motivo"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            var inputContainer = document.getElementById('input-container');
            var motivoInput = document.getElementById('motivo_text');

            inputContainer.style.display = 'none';
            motivoInput.placeholder = '';

            if (this.value === 'comision_trabajo') {
                motivoInput.placeholder = 'Lugar a donde se comisionó:';
                motivoInput.value = '';
            } else if (this.value === 'cursos') {
                motivoInput.placeholder = 'Lugar donde se asiste y nombre del curso:';
                motivoInput.value = '';
            } else if (this.value === 'Artículo 7 del CCT') {
                motivoInput.placeholder = 'Artículo 7 del CCT';
                motivoInput.value = 'Artículo 7 del CCT';
            } else if (this.value === 'otro') {
                motivoInput.placeholder = 'otro motivo:';
                motivoInput.value = '';
            }

            inputContainer.style.display = 'block';
        });
    });
</script>
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

<script>
  // Obtiene la fecha actual en formato YYYY-MM-DD
  var today = new Date().toISOString().split('T')[0];
  
  // Asigna la fecha actual al valor del input
  document.getElementById('fecha').value = today;
</script>
@endsection