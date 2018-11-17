@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Detalle Chulio Flor del Valle</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h1>Cooperativa de Transporte</h1></center>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" id="form">

                        <a href="{{url('/')}}" class="btn btn-success"><i class="icon-home"></i> Panel Administración</a>
                        <a href="{{url('/Chulio')}}" class="btn btn-success"><i class="icon-list"></i> Listado Chulios</a>
                        <hr>
                        <div class="alert alert-info">
                            <hr>
                            <center><h3><strong>Datos Personales</h3></center>
                            <hr>
                            <h4><strong>Usuario:</strong>{{$chulio->usuario}}</h4>
                            <h4><strong>Nombre:</strong>{{$chulio->nombre}}</h4>
                            <h4><strong>Cédula:</strong>{{$chulio->cedula}}</h4>
                            <h4><strong>Celular:</strong>{{$chulio->celular}}</h4>
                            <h4><strong>Direccion:</strong>{{$chulio->direccion}}</h4>
                            @foreach($buses as $bus)
                            @if($chulio->BUS_id_bus == $bus->id_bus)
                            <h4><strong>Placa Bus:</strong>{{$bus->placa_bus}}</h4>
                            @endif
                            @endforeach

                        </div>
                        <hr>
                    </form>
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
