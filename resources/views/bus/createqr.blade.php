@extends('layouts.app')
@section('content')
<!-- PHP crear qr bus -->
<?php
  $dir='storage/qr_bus/';
  $filename='';
  if(!file_exists($dir))
    mkdir($dir);
    if(isset($_GET['w1']))
    {
      $filename=$dir.$_GET['w1'].'.png';
      $tamanio=15;
      $level='H';
      $frameSize=5;
      $contenido=$_GET['w1'];
      QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
    }
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h2><center>Generar Codigo QR Buses </strong>"Cooperativa Flor del Valle"</strong></center></h2>
        </div>
        <div class="panel-body">
          <a href="#" class="btn btn-success">Panel de Administración</a>
          <a href="{{url('/bus')}}" class="btn btn-success">Listado de Buses</a>
          <hr>
          <div class="alert alert-danger">
            <center><h4>Selecciona una de las Placas del Bus para poder generar un QR </h4></center>
          </div>
          <select  name="placabus" id="placabus" onchange="obtenerplaca();">
                 <option value="selec" selected>Selecciona una Placa Bus</option>
                 @foreach($bus as $bus)
                     <option value="{{$bus->PLACA_BUS}}" >{{$bus->NOMBRE_PROP}}</option>
                 @endforeach
          </select>
          <hr>
          <img width="100px" src="<?php echo $filename; ?>">
        </div>
      </div>
    </div>
  </div>
</div>
<!--Cragando el script para generar el qr bs -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script>
    console.log('Abriendo Javascript');
    function obtenerplaca()
    {
      var dato=document.getElementById("placabus").value;
      location.href="?w1=" + dato;
    }
</script>
@endsection
