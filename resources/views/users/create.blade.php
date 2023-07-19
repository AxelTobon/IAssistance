@extends('layouts/layoutMaster')
@section('content')
 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div clas="col-md-12">
                <form action="{{ url('/users') }}" method="post" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Usuario</h4>
                        <div class="form-group">
                        <label for="Nombre"> Numero de empleado </label>
                        <input type="numeric" class="form-control" name='nempleado' value="{{ isset($empleado->nempleado)?$empleado->nempleado:old('nempleado') }}" id='nempleado' placeholder="Introduzca su nombre">
                    </div>
                    <div class="form-group">
                        <label for="Nombre"> Nombre </label>
                        <input type="text" class="form-control" name='Nombre' value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id='Nombre' placeholder="Introduzca su nombre">
                    </div>

                    <div class="form-group">
                        <label for="Correo"> Correo </label>
                        <input type="email" class="form-control" name='Correo' id='Correo' value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" placeholder="Introduzca su correo">
                    </div>

                    <div class="form-group">
                        <label for="Contraseña"> Contraseña </label>
                        <input type="password" class="form-control" name='Contraseña' id='Contraseña' value="{{ isset($empleado->Contraseña)?$empleado->Contraseña:old('Contraseña') }}" placeholder="Introduzca su contraseña">
                    </div>

                    


                    <input type="submit" class="btn btn-success" value="Guardar datos">
                    <a class="btn btn-primary" href="{{url('/') }}"> Regresar </a>
                    <br>
                </div>
                </div>
                </form>

    </div>
   </div>
  </div>
 </div>


@endsection