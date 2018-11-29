@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Detalle Recarga Flor del Valle</title>
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
                        <a href="{{url('/Recargas')}}" class="btn btn-success"><i class="icon-list"></i> Listado Recarga</a>
                        <hr>
                        <div class="alert alert-info">
                            <hr>
                            <center><h3><strong>Datos</h3></center>
                            <hr>
                            @foreach($usuarios as $usuario)
                            @if($recarga->USUARIO_id_usuario == $usuario->id_usuario)
                            <h4><strong>Usuario:</strong>{{$usuario->nombre_usuario}}</h4>
                            @endif
                            @endforeach
                            @foreach($sedes as $sede)
                            @if($recarga->SEDE_id_usuario == $sede->id_sede)
                            <h4><strong>Sede:</strong>{{$sede->nombre_sede}}</h4>
                            @endif
                            @endforeach
                            <h4><strong>Valor:</strong>{{$recarga->valor_recarga}}</h4>
                            <h4><strong>Fecha:</strong>{{$recarga->fecha_recarga}}</h4>

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
