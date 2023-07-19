@extends('layouts/layoutMaster')
@section('content')
@section('title', 'Solicitudes')



<div class="container">
<!-- 
<a href="{{url('solicitud/create')}}" class="btn btn-success"> Dias economicos </a>
<p>Se contará con 14 días económicos disponibles durante el año, para solicitar dichos días deberá levantarse la solicitud hasta un día antes del día económico a tomar únicamente proporcionando el nombre del profesor, numero de empleado y adscripción , este no podrá tomarse y solicitarse después, si esto pasa, será tomado como día de falta. Como máximo se podrán solicitar dos días económicos consecutivos.</p> -->

<br>

<div class="card-group">
  <div class="card">
    <img class="card-img-top" src="..." alt="">
    <div class="card-body">
      <h5 class="card-title">DIAS ECONOMICOS</h5>
      <p class="card-text">
      Se contará con 14 días económicos disponibles durante el año, para solicitar dichos días deberá levantarse 
      la solicitud hasta un día antes del día económico a tomar únicamente proporcionando el nombre del profesor, 
      numero de empleado y adscripción , este no podrá tomarse y solicitarse después, si esto pasa, será tomado como día de falta. 
      Como máximo se podrán solicitar dos días económicos consecutivos. </p>
      <p class="card-text"><small class="text-muted">Solo cuenta con 14 dias disponibles</small></p>
      
    </div>
    <a href="{{url('solicitud/create')}}" class="btn btn-success"> Solicitar </a>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="">
    <div class="card-body">
      <h5 class="card-title">BAJA TEMPORAL</h5>
      <p class="card-text">Las bajas temporales deberán solicitarse con un mes de anticipación en el 
        área de finanzas, se permitirá solicitar la baja temporal sin periodo de anticipación siempre y
         cuando sea de carácter urgente, una vez dado de baja temporal, el estatus del profesor pasara a inacivo.
</p>
      <!-- <p class="card-text"><small class="text-muted">Descripcion</small></p> -->
      
    </div>
    <a href="{{url('bajas/create')}}" class="btn btn-success"> Solicitar </a>
  </div>

  <div class="card">
    <img class="card-img-top" src="..." alt="">
    <div class="card-body">
      <h5 class="card-title">OMISIONES</h5>
      <p class="card-text">Sólo serán permitidas 3 omisiones de entrada o salida por 
        cuatrimistre y estas tendrán que notificarse el mismo día en que estas sean reportadas.
</p>
      <!-- <p class="card-text"><small class="text-muted">Descripcion</small></p> -->
      
    </div>
    <a href="{{url('omisiones/create')}}" class="btn btn-success"> Solicitar </a>
  </div>
 
  </div>
</div>




<!-- <a href="{{url('solicitud/create')}}" class="btn btn-success"> Retardos </a>
<p>Descripcion</p>

<br>
<a href="{{url('solicitud/create')}}" class="btn btn-success"> Vacaciones </a>
<p>Descripcion</p> -->

<br>
</div>

@endsection