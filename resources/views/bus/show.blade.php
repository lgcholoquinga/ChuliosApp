@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detalle Buses Flor del Valle</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                        <center><h1>Cooperativa de Transporte</h1></center>
                  </div>
                  <div class="panel-body">

                      <form class="form-horizontal" id="form">

                          <a href="{{url('/')}}" class="btn btn-success"><i class="icon-home"></i> Panel Administración</a>
                            <a href="{{url('/bus')}}" class="btn btn-success"><i class="icon-list"></i> Listado Buses</a>
                         <hr>
                          <div class="alert alert-info">
                            <hr>
                             <center><h3><strong>Datos Personales</h3></center>
                             <hr>
                             <h4><strong>Nombre Propietario:</strong>{{$value->NOMBRE_PROP}}</h4>
                             <h4><strong>Cédula:</strong>{{$value->CEDULA_PROP}}</h4>
                             <h4><strong>Celular:</strong>{{$value->CELULAR_PROP}}</h44
                             <hr>
                             <center><h3><strong>Datos Bus</h3></center>
                               <hr>
                             <h4><strong>Número Bus:</strong>{{$value->NUMERO_BUS}}</h4>
                             <h4><strong>Capacidad Bus:</strong>{{$value->CAPACIDAD_BUS}}</h4>
                             <h4><strong>Placa Bus:</strong>{{$value->PLACA_BUS}}</h4>
                          </div>
                         <hr>
                      </form>
                  </div>
                  <div class="panel-footer">
                  </div>
                </div>
            </div>
            <div class="col-md-7">
                     <div class="panel panel-primary">
                       <div class="panel-heading">
                            <center><h1>Flor del Valle</h1></center>
                       </div>
                       <div class="panel-body">
                          <center><h3>Foto Bus:</h3></center>
                          <center>
                          <img width="200px"  src="{{url('/storage/imagen_bus/'.$value->FOTO_BUS)}}">
                        </center>
                       </div>
                       <div class="panel-footer">
                       </div>
                     </div>
            </div>
        </div>
   </div>
  </body>
</html>
@endsection
