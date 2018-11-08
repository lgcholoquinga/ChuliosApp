@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado Buses</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h2><center>Listado de Buses </strong>"Cooperativa Flor del Valle"</strong></center></h2>
            </div>
            <div class="panel-body">
              <a href="#" class="btn btn-success">Panel Administración</a>
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#crearbus">Agregar Bus</a>
              <a href="{{url('/createqr')}}" class="btn btn-success">Generar Qr Buses</a>
              <hr>
              <div class="table table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Nombre Propietario</center></th>
                      <th><center>Cedula</center></th>
                      <th><center>Celular</center></th>
                      <th><center>Numero Bus</center></th>
                      <th><center>Placa</center></th>
                      <th><center>Capacidad</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no=1 ?>
                      @foreach($bus as $bus=> $value)
                        <tr>
                          <td><center>{{$no++}}</center></td>
                          <td><center>{{$value->NOMBRE_PROP}}</center></td>
                          <td><center>{{$value->CEDULA_PROP}}</center></td>
                          <td><center>{{$value->CELULAR_PROP}}</center></td>
                          <td><center>{{$value->NUMERO_BUS}}</center></td>
                          <td><center>{{$value->PLACA_BUS}}</center></td>
                          <td><center>{{$value->CAPACIDAD_BUS}}</center></td>
                          <td>
                            <a href="{{url('/bus/'.$value->ID_BUS)}}" class="btn btn-primary btn-sm"> Detalle</a></td>
                          <td><a href="{{url('/bus/'.$value->ID_BUS.'/edit')}}" class="btn btn-warning btn-sm">
                              Editar
                            </a></td>
                            <td><button type="button" class="btn btn-danger btn-sm"
                              data-toggle="modal"
                              data-target="#eliminarbus">
                              Eliminar
                            </button>
                            <div id="eliminarbus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"><strong>Eliminar Bus</strong></h4>
                                          </div>
                                          <form class="form-horizontal" method="post" action="{{route('bus.destroy',$value->ID_BUS)}}" enctype="multipart/form-data">
                                          <div class="modal-body">
                                            <center><h1>¿Quieres Eliminar estos datos?</h1></center>
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="foto" value="{{$value->FOTO_BUS}}">
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
<div id="crearbus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" name="button" data-dismiss="modal" aria-label="close">
           <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel"><strong>Registrar Bus Flor del Valle </strong></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{route('bus.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}
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
            <label class="control-label col-sm-2 {{$errors->has('cedula') ? 'has-error' : ''}}" for="nombre">Cédula:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cedula" name="cedula"  placeholder="Ingrese una Cédula Válida" value="{{old('cedula')}}" required>
              @if($errors->has('cedula'))
               <span class="help-block"><strong>{{ $errors->first('cedula') }}</strong></span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Celular:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese una Célular Válido" value="{{old('celular')}}" required>
              @if($errors->has('celular'))
               <span class="help-block"><strong>{{ $errors->first('celular') }}</strong></span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Numero Bus:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="numero" name="numero"  placeholder="Ingrese Capacidad del Bus" value="{{old('numero')}}" required>
              @if($errors->has('numero'))
               <span class="help-block"><strong>{{ $errors->first('numero') }}</strong></span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Placa Bus:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="placa" name="placa"  placeholder="Ingrese Placa del Bus" value="{{old('placa')}}" required>
              @if($errors->has('placa'))
               <span class="help-block"><strong>{{ $errors->first('placa') }}</strong></span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Capacidad:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingrese Capacidad del Bus" value="{{old('capacidad')}}" required>
              @if($errors->has('capacidad'))
               <span class="help-block"><strong>{{ $errors->first('capacidad') }}</strong></span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="foto">Foto:</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
              @if($errors->has('foto'))
               <span class="help-block"><strong>{{ $errors->first('foto') }}</strong></span>
              @endif
            </div>
          </div>
      </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Guardar Datos</button>
          <button class="btn btn-warning" type="button" data-dismiss="modal">Cancelar</button>
        </div>
        </form>
    </div>
  </div>
</div>
