@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h3>INGRESAR DATOS DEl CHULIO</h3></center>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal"  action="{{url('Chulio')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <a href="{{url('/')}}" class="btn btn-success"><i class="icon-home"></i>Panel Administración</a>
                        <hr>
                        <div class="form-group">
                            <label for="Usuario" class="control-label col-md-3">Usuario:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario">
                                @if($errors->has('usuario'))
                                <span class="help-block"><strong>{{ $errors->first('usuario') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Nombre" class="control-label col-md-3">Nombre:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre">
                                @if($errors->has('nombre'))
                                <span class="help-block"><strong>{{ $errors->first('nombre') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cedula" class="control-label col-md-3">Cedula:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="cedula" maxlength="10"  onkeypress="return valida(event)" placeholder="Ingrese Cedula">
                                @if($errors->has('cedula'))
                                <span class="help-block"><strong>{{ $errors->first('cedula') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="celular" class="control-label col-md-3">Celular:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="celular" maxlength="10" onkeypress="return valida(event)" placeholder="Ingrese Celular" >
                                @if($errors->has('celular'))
                                <span class="help-block"><strong>{{ $errors->first('celular') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="control-label col-md-3">Dirección:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="direccion" placeholder="Ingrese Direccion" >
                                @if($errors->has('direccion'))
                                <span class="help-block"><strong>{{ $errors->first('direccion') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contrasenia" class="control-label col-md-3">Contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="contrasenia" placeholder="Ingrese Contraseña" >
                                @if($errors->has('contrasenia'))
                                <span class="help-block"><strong>{{ $errors->first('contrasenia') }}</strong></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="BUS_id_bus" class="control-label col-md-3">Placa Bus:</label>
                            <div class="col-md-8">
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

                        <div class="form-group">
                            <center>
                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Guardar Datos</button>
                                <a href="{{url('/Chulio')}}" class="btn btn-danger"><i class="icon-squared-cross"></i> Cancelar</a>
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
@endsection