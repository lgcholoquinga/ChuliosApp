@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Listado Chulios</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2><center>Listado de Chulios </strong>"Cooperativa Flor del Valle"</strong></center></h2>
                </div>
                <div class="panel-body">
                    <a href="#" class="btn btn-success">Panel Administración</a>
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#crearchulio">Agregar Chulio</a>
                    <!--<a href="Chulio\create" class="btn btn-success">Agregar Chulio</a>-->

                    <hr>
                    <div class="table table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th><center>No</center></th>
                                <th><center>Usuario</center></th>
                                <th><center>Nombre</center></th>
                                <th><center>Cedula</center></th>
                                <th><center>Celular</center></th>
                                <th><center>Direccion</center></th>
                                <!--<th><center>Bus</center></th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1 ?>
                            @foreach($chulios as $chulio=> $value)
                            <tr>
                                <td><center>{{$no++}}</center></td>
                                <td><center>{{$value->usuario}}</center></td>
                                <td><center>{{$value->nombre}}</center></td>
                                <td><center>{{$value->cedula}}</center></td>
                                <td><center>{{$value->celular}}</center></td>
                                <td><center>{{$value->direccion}}</center></td>

                                <td>
                                    <a href="{{url('/Chulio/'.$value->idchulio)}}" class="btn btn-primary btn-sm"> Detalle</a></td>
                                <td><!--<a href="{{url('/Chulio/'.$value->idchulio.'/edit')}}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>-->
                                    <a href="#" data-id="{{ $value->idchulio }}" class="btn btn-success" data-toggle="modal" data-target="#editarchulio{{ $value->idchulio }}">Editar</a>
                                <!-- formulario modal de Editar -->
                                <div id="editarchulio{{ $value->idchulio }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" name="button" data-dismiss="modal" aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel"><strong>Actualizar Chulio Flor del Valle </strong></h4>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="{{route('Chulio.update',$value->idchulio)}}" enctype="multipart/form-data">

                                                <div class="modal-body">
                                                    {{csrf_field()}}
                                                    {{ method_field('PATCH') }}
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 {{$errors->has('usuario') ? 'has-error' : ''}}" for="usuario">Usuario:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Ingrese Usuario" value="{{$value->usuario}}" readonly>
                                                            @if($errors->has('usuario'))
                                                            <span class="help-block"><strong>{{ $errors->first('usuario') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 {{$errors->has('nombre') ? 'has-error' : ''}}" for="nombre">Nombre:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingrese Nombre" value="{{$value->nombre}}" required autofocus>
                                                            @if($errors->has('nombre'))
                                                            <span class="help-block"><strong>{{ $errors->first('nombre') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 {{$errors->has('cedula') ? 'has-error' : ''}}" for="cedula">Cédula:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="cedula" name="cedula" maxlength="10" onkeypress="return valida(event)" placeholder="Ingrese una Cédula Válida" value="{{$value->cedula}}" required>
                                                            @if($errors->has('cedula'))
                                                            <span class="help-block"><strong>{{ $errors->first('cedula') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="celular">Celular:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="celular" maxlength="10" name="celular" onkeypress="return valida(event)" placeholder="Ingrese una Célular Válido" value="{{$value->celular}}" required>
                                                            @if($errors->has('celular'))
                                                            <span class="help-block"><strong>{{ $errors->first('celular') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="direccion">Dirección:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="Ingrese Direccion" value="{{$value->direccion}}" required>
                                                            @if($errors->has('direccion'))
                                                            <span class="help-block"><strong>{{ $errors->first('direccion') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="contrasenia">Contraseña:</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Ingrese Contraseña" value="{{$value->contrasenia}}" readonly>
                                                            @if($errors->has('contrasenia'))
                                                            <span class="help-block"><strong>{{ $errors->first('contrasenia') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="BUS_id_bus">Placa Bus:</label>
                                                        <div class="col-sm-10">
                                                            <select name="BUS_id_bus" id="BUS_id_bus" class="form-control">
                                                                @foreach($buses as $bus)
                                                                @if($value->BUS_id_bus == $bus->id_bus)
                                                                <option value="{{$bus->id_bus}}">{{$bus->placa_bus}}</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach($buses as $bus)
                                                                <option value="{{$bus->id_bus}}">{{$bus->placa_bus}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if($errors->has('BUS_id_bus'))
                                                            <span class="help-block"><strong>{{ $errors->first('BUS_id_bus') }}</strong></span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </td>
                                <td><button type="button" class="btn btn-danger btn-sm"
                                            data-toggle="modal"
                                            data-target="#eliminarchulio{{$value->idchulio}}">
                                        Eliminar
                                    </button>
                                    <div id="eliminarchulio{{$value->idchulio}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel"><strong>Eliminar</strong></h4>
                                                </div>
                                                <form class="form-horizontal" method="post" action="{{route('Chulio.destroy',$value->idchulio)}}" enctype="multipart/form-data">
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
<script>
    function valida(e){
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }

        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>
</body>
</html>
@endsection
<!-- Ventanas Modales -->
<!-- crear formulario modales -->
<div id="crearchulio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" name="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><strong>Registrar Chulio Flor del Valle </strong></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{url('Chulio')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-sm-2 {{$errors->has('usuario') ? 'has-error' : ''}}" for="usuario">Usuario:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Ingrese Usuario" value="{{old('usuario')}}" required autofocus>
                            @if($errors->has('usuario'))
                            <span class="help-block"><strong>{{ $errors->first('usuario') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 {{$errors->has('nombre') ? 'has-error' : ''}}" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingrese Nombre" value="{{old('nombre')}}" required autofocus>
                            @if($errors->has('nombre'))
                            <span class="help-block"><strong>{{ $errors->first('nombre') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 {{$errors->has('cedula') ? 'has-error' : ''}}" for="cedula">Cédula:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cedula" name="cedula" maxlength="10" onkeypress="return valida(event)" placeholder="Ingrese una Cédula Válida" value="{{old('cedula')}}" required>
                            @if($errors->has('cedula'))
                            <span class="help-block"><strong>{{ $errors->first('cedula') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="celular">Celular:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="celular" maxlength="10" name="celular" onkeypress="return valida(event)" placeholder="Ingrese una Célular Válido" value="{{old('celular')}}" required>
                            @if($errors->has('celular'))
                            <span class="help-block"><strong>{{ $errors->first('celular') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="direccion">Dirección:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="Ingrese Direccion" value="{{old('direccion')}}" required>
                            @if($errors->has('direccion'))
                            <span class="help-block"><strong>{{ $errors->first('direccion') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="contrasenia">Contraseña:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Ingrese Contraseña" value="{{old('contrasenia')}}" required>
                            @if($errors->has('contrasenia'))
                            <span class="help-block"><strong>{{ $errors->first('contrasenia') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="BUS_id_bus">Placa Bus:</label>
                        <div class="col-sm-10">
                            <select name="BUS_id_bus" id="BUS_id_bus" class="form-control">
                                <option value="">--Eliga Bus--</option>
                                @foreach($buses as $bus)
                                <option value="{{$bus->id_bus}}">{{$bus->placa_bus}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('BUS_id_bus'))
                            <span class="help-block"><strong>{{ $errors->first('BUS_id_bus') }}</strong></span>
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