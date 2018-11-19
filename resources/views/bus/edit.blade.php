@extends('layouts.app')
@section('content')
<div class="container-fluid">
       <div class="row">
           <div class="col-md-6 col-md-offset-3">
               <div class="panel panel-primary">
                 <div class="panel-heading">
                       <center><h3>ACTUALIZAR DATOS DEl BUS</h3></center>
                 </div>
                 <div class="panel-body">

                     <form class="form-horizontal"  action="{{route('bus.update',$bus->ID_BUS)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <a href="{{url('/')}}" class="btn btn-success"><i class="icon-home"></i>Panel Administración</a>
                        <hr>
                        <div class="form-group">
                          <label for="Nombre Propietario" class="control-label col-md-3">Nombre Propietario:</label>
                          <div class="col-md-8">
                           <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="{{$bus->NOMBRE_PROP}}">
                         </div>
                        </div>
                        <div class="form-group">
                          <label for="cedula" class="control-label col-md-3">Cedula:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="cedula" placeholder="Ingrese Cedula" value="{{$bus->CEDULA_PROP}}" readonly>
                        </div>
                        </div>

                        <div class="form-group">
                          <label for="Celular" class="control-label col-md-3">Celular:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="celular" placeholder="Ingrese Celular" value="{{$bus->CELULAR_PROP}}">
                        </div>
                        </div>

                        <div class="form-group">
                          <label for="numero" class="control-label col-md-3">Número Bus:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="numero" placeholder="Ingrese Número Bus" value="{{$bus->NUMERO_BUS}}">
                        </div>
                        </div>

                        <div class="form-group">
                          <label for="capacidad" class="control-label col-md-3">Capacidad Bus:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="capacidad" placeholder="Ingrese Capacidad Bus" value="{{$bus->CAPACIDAD_BUS}}">
                        </div>
                        </div>
                        <div class="form-group">
                          <label for="placa" class="control-label col-md-3">Placa Bus:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control" name="placa" placeholder="Ingrese Placa Bus" value="{{$bus->PLACA_BUS}}" readonly>
                        </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 " for="foto">Foto:</label>
                            <div class="col-md-8">
                              <input type="file" class="form-control" name="foto">
                              <br>
                              <center>
                              <img width="150px" src="{{url('/storage/imagen_bus/'.$bus->FOTO_BUS)}}">
                              </center>
                            </div>
                        </div>
                       <div class="form-group">
                            <center>
                            <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Guardar Cambios</button>
                            <a href="{{url('/bus')}}" class="btn btn-danger"><i class="icon-squared-cross"></i> Cancelar</a>
                            </center>
                          </div>
                       </div>
                 </div>
                 <div class="panel-footer">
                 </div>
               </div>
              </div>
             </form>
           </div>
@endsection
