@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Listado Recargas</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2><center>Listado de Recargas Realizadas </strong>"Cooperativa Flor del Valle"</strong></center></h2>
                </div>
                <div class="panel-body">
                    <a href="#" class="btn btn-success">Panel Administración</a>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#crearrecarga">Agregar Recarga</a>
                    <!--<a href="Chulio\create" class="btn btn-success">Agregar Chulio</a>-->

                    <hr>
                    <div class="table table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Usuario</center></th>
                                <th><center>Sede</center></th>
                                <th><center>Valor</center></th>
                                <th><center>Fecha</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1 ?>
                            @foreach($recargas as $recarga=> $value)
                            <tr>
                                <td><center>{{$no++}}</center></td>
                                @foreach($usuarios as $usuario)
                                @if($value->USUARIO_id_usuario == $usuario->id_usuario)
                                <td><center>{{$usuario->nombre_usuario}}</center></td>
                                @endif
                                @endforeach
                                @foreach($sedes as $sede)
                                @if($value->SEDE_id_sede == $sede->id_sede)
                                <td><center>{{$sede->nombre_sede}}</center></td>
                                @endif
                                @endforeach
                                <td><center>{{$value->valor_recarga}}</center></td>
                                <td><center>{{$value->fecha_recarga}}</center></td>

                                <td>
                                    <a href="{{url('/Recargas/'.$value->id_recarga)}}" class="btn btn-primary btn-sm"> Detalle</a></td>

                                <td><button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#eliminarrecarga{{$value->id_recarga}}">
                                        Eliminar
                                    </button>
                                    <div id="eliminarrecarga{{$value->id_recarga}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel"><strong>Eliminar</strong></h4>
                                                </div>
                                                <form class="form-horizontal" method="post" action="{{route('Recargas.destroy',$value->id_recarga)}}" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <center><h1>¿Quieres Eliminar estos datos?</h1></center>
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection
<!-- Ventanas Modales -->
<!-- crear formulario modales -->
<div id="crearrecarga" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" name="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><strong>Registrar Recarga Flor del Valle </strong></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('Recargas')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-sm-2 {{$errors->has('USUARIO_id_usuario') ? 'has-error' : ''}}" for="USUARIO_id_usuario">Usuario:</label>
                        <div class="col-sm-10">
                            <select name="USUARIO_id_usuario" id="USUARIO_id_usuario" class="form-control">
                                <option value="">--Eliga Usuario--</option>
                                @foreach($usuarios as $user)
                                <option value="{{$user->id_usuario}}">{{$user->nombre_usuario}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('USUARIO_id_usuario'))
                            <span class="help-block"><strong>{{ $errors->first('USUARIO_id_usuario') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 {{$errors->has('SEDE_id_sede') ? 'has-error' : ''}}" for="SEDE_id_sede">Sede:</label>
                        <div class="col-sm-10">
                            <select name="SEDE_id_sede" id="SEDE_id_sede" class="form-control">
                                <option value="">--Eliga Sede--</option>
                                @foreach($sedes as $sed)
                                <option value="{{$sed->id_sede}}">{{$sed->nombre_sede}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sede'))
                            <span class="help-block"><strong>{{ $errors->first('sede') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2 {{$errors->has('valor_recarga') ? 'has-error' : ''}}" for="valor_recarga">Valor Recarga:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="valor_recarga" name="valor_recarga" step="any" placeholder="Ingrese un Valor" value="{{old('valor_recarga')}}" required>
                            @if($errors->has('valor_recarga'))
                            <span class="help-block"><strong>{{ $errors->first('valor_recarga') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_recarga">Fecha:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="fecha_recarga" name="fecha_recarga" placeholder="Ingrese una Fecha" value="{{old('fecha_recarga')}}" required>
                            @if($errors->has('fecha_recarga'))
                            <span class="help-block"><strong>{{ $errors->first('fecha_recarga') }}</strong></span>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Datos</button>
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>