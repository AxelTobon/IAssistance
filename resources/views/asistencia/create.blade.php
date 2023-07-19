<!-- Enlaces a los archivos CSS y JS de Bootstrap desde una CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Cuando se complete el campo de nombre, enviar el formulario automáticamente
        $('#result').on('input', function() {
            var nameValue = $(this).val().trim();
            if (nameValue !== '') {
                $('#myForm').submit();
            }
        });
    });
</script>


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


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('login') }}">Asistencia Inteligente</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}">Inicio de sesion </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Registro</a>
      </li>
    </ul>
  </div>
</nav>





<h4>CODIGO QR</h4>
<br>






<script type="text/javascript" src="/js/ht.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
</style>
<div class="row">
  <div class="col">
    <div style="width:500px;" id="reader"></div>
  </div><audio id="myAudio1">
  <source src="success.mp3" type="audio/ogg">
</audio>
<audio id="myAudio2">
  <source src="failes.mp3" type="audio/ogg">
</audio>
<script>
var x = document.getElementById("myAudio1");
var x2 = document.getElementById("myAudio2");      
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "gethint.php?q=" + str, true);
    xmlhttp.send();
    $('#myForm').submit();
    window.location.reload()
  }
}

function playAudio() { 
  x.play(); 
} 


  </script>
  <div class="col" style="padding:30px;">
    <h4>RESULTADOS</h4>
    <div>Nombre de empleado</div>
    <form action="{{ url('/asistencia') }}" method="post" id="myForm">
    @csrf
     <!-- <input type="text" name="start" class="form-control" id="result" onkeyup="showHint(this.value)" placeholder="result here"   /> -->
     <input type="text" name="name" class="form-control" id="result" onkeyup="showHint(this.value)" placeholder="Resultado"   />
     

     <button class="btn btn-success" type="submit" name=btnGuardar>Registrar</button></form>
     
  </div>
</div>
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById("result").value = qrCodeMessage;
    showHint(qrCodeMessage);
    //console.log(qrCodeMessage);
playAudio();

}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>

<script>
function PasarValor()
{
document.getElementById("nombre2").value = document.getElementById("nombre1").value;
}
</script>



<br>
<div class="container">

<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                
                <th scope="col">Nombre</th>
                
                <th scope="col">Entrada</th>

                <th scope="col">Salida</th>
            </tr>
        </thead>

    <tbody>
        @foreach( $asistencias as $asistencia )
            <tr>
                <td>{{ $asistencia->id }}</td>
                
                <td>{{ $asistencia->name }}  </td>

                <td>{{ $asistencia->datetime_in }}</td>                             

                <td>{{ $asistencia->datetime_out }}</td> 
            </tr>
        @endforeach
    </tbody>
    </table>




</div>