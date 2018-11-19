@extends('layouts.app')
@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h2><center>Listado de Buses </strong>"Cooperativa Flor del Valle"</strong></center></h2>
            </div>
            <div class="panel-body">
              <a href="#" class="btn btn-success">Panel Administración</a>
              <button type="button" data-toggle="modal" data-target="#crearbus" class="btn btn-success">Agregar Bus</button>
              <a href="{{url('/createqr')}}" class="btn btn-primary">Generar QR</a>
              <hr>
              <div id="listar_buses">
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/crudBus.js') }}"></script>
    <script>
       $(document).ready(function(){
          listar_buses();
       });
       $(document).on('click','.pagination li a',function(e){
         e.preventDefault();
         var url=$(this).attr('href');
         $.ajax({
          type:'GET',
            url:url,
            success:function(data)
            {
               $('#listar_buses').empty().html(data);
            }
         });
       });
       var listar_buses=function()
        {
          $.ajax({
            type:'GET',
            url:'{{url('listar_buses')}}',
            success:function(data)
            {
               $('#listar_buses').empty().html(data);
            }
          });
        }
    </script>
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
          
        <div id="message-error" class="alert alert-danger danger" role="alert" style="display:none;">
                  <strong id="error-nombre"></strong>
                  <br>
                  <strong id="error-cedula"></strong>
                  <br>
                  <strong id="error-celular"></strong>
                  <br>
                  <strong id="error-numero"></strong>
                  <br>
                  <strong id="error-placa"></strong>
                  <br>
                  <strong id="error-capacidad"></strong>
                  <br>
                  <strong id="error-foto"></strong>
        </div>
        <form id="form" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre Propietario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingrese Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="cedula">Cédula Identidad:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cedula" name="cedula"  placeholder="Ingrese una Cédula Válida">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Celular:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese una Célular Válido">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Numero Bus:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="numero" name="numero"  placeholder="Ingrese Capacidad del Bus">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Placa Bus:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="placa" name="placa"  placeholder="Ingrese Placa del Bus">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Capacidad:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingrese Capacidad del Bus">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="foto">Foto:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            </div>
                        </div>        
          </div>    
          <div class="modal-footer">
            <center>
            <button type="button" class="btn btn-primary" id="enviarbus">Guardar Datos</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
            </center>
          </div>
        </form>
    </div>
  </div>
</div>   
@endsection
