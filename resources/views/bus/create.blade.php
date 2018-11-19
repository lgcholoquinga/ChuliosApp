@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h2>Registrar Bus "Flor del Valle"</h2></center>
                </div>
                <div class="panel-body">
                        
                    <form id="form" class="form-horizontal" method="POST" action="{{route('bus.store')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                         <a href="#" class="btn btn-success">Panel Administración</a>
                         <hr>
                        <div class="form-group {{$errors->has('nombre') ? 'has-error' : ''}}">
                            <label class="control-label col-sm-2" for="nombre">Nombre Propietario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingrese Nombre" value="{{old('nombre')}}" required autofocus>
                                @if($errors->has('nombre'))
                                <span class="help-block"><strong>{{ $errors->first('nombre') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group  {{$errors->has('cedula') ? 'has-error' : ''}}">
                            <label class="control-label col-sm-2" for="nombre">Cédula Identidad:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cedula" name="cedula"  placeholder="Ingrese una Cédula Válida" value="{{old('cedula')}}" required>
                                @if($errors->has('cedula'))
                                <span class="help-block"><strong>{{ $errors->first('cedula') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  {{$errors->has('celular') ? 'has-error' : ''}}">
                            <label class="control-label col-sm-2" for="nombre">Celular:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese una Célular Válido" value="{{old('celular')}}" required>
                                @if($errors->has('celular'))
                                <span class="help-block"><strong>{{ $errors->first('celular') }}</strong></span>
                                 @endif
                            </div>
                        </div>

                        <div class="form-group  {{$errors->has('numero') ? 'has-error' : ''}}">
                            <label class="control-label col-sm-2" for="nombre">Numero Bus:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="numero" name="numero"  placeholder="Ingrese Capacidad del Bus" value="{{old('numero')}}" required>
                                @if($errors->has('numero'))
                                <span class="help-block"><strong>{{ $errors->first('numero') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  {{$errors->has('placa') ? 'has-error' : ''}}">
                            <label class="control-label col-sm-2" for="nombre">Placa Bus:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="placa" name="placa"  placeholder="Ingrese Placa del Bus" value="{{old('placa')}}" required>
                                @if($errors->has('placa'))
                                <span class="help-block"><strong>{{ $errors->first('placa') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group  {{$errors->has('capacidad') ? 'has-error' : ''}}">
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
                        

                        <div class="form-group" id="guardar">
                            <center>
                            <button type="submit" class="btn btn-primary" name="enviar" >Guardar</button>
                            <a href="{{url('/bus')}}" class="btn btn-danger" type="button">Cancelar</a>
                            </center>
                        </div>
                         
                    </form>
                </div>
                <div class="panel-footer">
                        <label for=""><strong>Flor del Valle</strong></label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


