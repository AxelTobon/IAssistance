@extends('layouts/layoutMaster')
@section('content')






@role('admin')
<form action="{{ url('/users/'.$users->id ) }}" method="post" enctype="multipart/form-data" >
<div class="form-group">
     <label for="name"> Nombre </label>
     <input type="text" class="form-control" name='name' value="{{ isset($users->name)?$users->name:old('name') }}" id='name' placeholder="Introduzca su nombre">
</div>
<div class="form-group">
     <label for="nempleado"> Numero Empleado </label>
     <input type="text" class="form-control" name='nempleado' value="{{ isset($users->nempleado)?$users->nempleado:old('nempleado') }}" id='nempleado' placeholder="Introduzca su numero de empleado">
</div>

<div class="form-group">
    <label for="email"> Correo </label>
    
    <input type="email" class="form-control" name='email' id='email' value="{{ isset($users->email)?$users->email:old('email') }}" placeholder="Introduzca su correo">
</div>

<div class="form-group">
    <label for="status"> Estatus </label>
    <br>
    <!-- <input type="status" class="form-control" name='status' id='status' value="{{ isset($users->status)?$users->status:old('status') }}" placeholder="Introduzca su correo"> -->
    <select name="status" id="status"
    id='status' value="{{ isset($users->status)?$users->status:old('status') }}">

  <option value="Activo">Activo</option>
  <option value="Inactivo">Inactivo</option>

</select>

</div>
@csrf
{{ method_field('PATCH') }}
<input type="submit" class="btn btn-success" value="Guadar datos">
<a class="btn btn-primary" href="{{url('users/') }}"> Regresar </a>
</form>
@endrole

@endsection