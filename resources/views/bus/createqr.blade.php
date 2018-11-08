@extends('layouts.app')
@section('content')
<?php
  $dir='storage/qr_bus/';
  $filename='';
  if(!file_exists($dir))
    mkdir($dir);
    if(isset($_GET['qrbutton']))
    {
      $filename=$dir.$_GET['placabus'].'.png';
      $tamanio=15;
      $level='H';
      $frameSize=5;
      $contenido=$_GET['placabus'];
      QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
    }
 ?>
<h2>Placas de Buses fLOR del valle por generar</h2>
<form  method="get">
           {{csrf_field()}}
           <div class="form-group">
           <label class="control-label col-sm-2" for="nombre">Placa Bus:</label>
           <div class="col-sm-10">
             <select class="placabus" name="placabus">
                 <option value="">Selecciona una Placa Bus</option>
                 @foreach($bus as $bus)
                     <option value="{{$bus->PLACA_BUS}}" >{{$bus->NOMBRE_PROP}}</option>
                 @endforeach
             </select>
              <br>
              <button type="submit" name="qrbutton" class="btn btn-primary btn-sm">Generar Qr Bus</button>
              <hr>
           </div>
           </div>
</form>
<img src="<?php echo $filename; ?>">
@endsection
