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
              <hr>
              <table class="table table-hover table-striped table-responsive">
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
                    {{csrf_field()}}
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
                          <a href="#" class="btn btn-primary btn-sm"
                            data-id="{{$value->ID_BUS}}"
                            data-nombre="{{$value->NOMBRE_PROP}}"
                            data-cedula="{{$value->CEDULA_PROP}}"
                            data-celular="{{$value->CELULAR_PROP}}"
                            data-numero="{{$value->NUMERO_BUS}}"
                            data-placa="{{$value->PLACA_BUS}}"
                            data-capacidad="{{$value->CAPACIDAD_BUS}}"
                            data-foto="{{$value->FOTO_BUS}}"
                            data-toggle="modal"
                            data-target="#mostarbus">
                            Detalle
                          </a></td>

                        <td><a href="#" class="btn btn-warning btn-sm"
                            data-id="{{$value->ID_BUS}}"
                            data-nombre="{{$value->NOMBRE_PROP}}"
                            data-cedula="{{$value->CEDULA_PROP}}"
                            data-celular="{{$value->CELULAR_PROP}}"
                            data-numero="{{$value->NUMERO_BUS}}"
                            data-placa="{{$value->PLACA_BUS}}"
                            data-capacidad="{{$value->CAPACIDAD_BUS}}"
                            data-foto="{{$value->FOTO_BUS}}"
                            data-toggle="modal"
                            data-target="#editarbus">
                            Editar
                          </a></td>
                          <td><a href="#" class="btn btn-danger btn-sm"
                            data-id="{{$value->ID_BUS}}"
                            data-nombre="{{$value->NOMBRE_PROP}}"
                            data-cedula="{{$value->CEDULA_PROP}}"
                            data-celular="{{$value->CELULAR_PROP}}"
                            data-numero="{{$value->NUMERO_BUS}}"
                            data-placa="{{$value->PLACA_BUS}}"
                            data-capacidad="{{$value->CAPACIDAD_BUS}}"
                            data-foto="{{$value->FOTO_BUS}}"
                            data-toggle="modal"
                            data-target="#eliminarbus">
                            Eliminar
                          </a></td>

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
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Ingrese Nombre" required autofocus>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Cédula:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cedula" name="cedula" value="{{old('cedula')}}" placeholder="Ingrese una Cédula Válida" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Celular:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular')}}" placeholder="Ingrese una Célular Válido" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Numero Bus:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="numero" name="numero" value="{{old('numero')}}" placeholder="Ingrese Capacidad del Bus" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Placa Bus:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="placa" name="placa" value="{{old('placa')}}" placeholder="Ingrese Placa del Bus" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Capacidad:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{old('capacidad')}}" placeholder="Ingrese Capacidad del Bus" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="foto">Foto:</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="foto" name="foto">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="qr">QR Bus:</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="qr" name="qr">
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
