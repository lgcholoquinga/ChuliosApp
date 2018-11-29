@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><h3>ACTUALIZAR DATOS DEl CHULIO</h3></center>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal"  action="{{route('Chulio.update',$chulio->idchulio)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{ method_field('PATCH') }}
                        <a href="{{url('/')}}" class="btn btn-success"><i class="icon-home"></i>Panel Administración</a>
                        <hr>
                        <div class="form-group">
                            <label for="Usuario" class="control-label col-md-3">Usuario:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" value="{{$chulio->usuario}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Nombre" class="control-label col-md-3">Nombre:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="{{$chulio->nombre}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cedula" class="control-label col-md-3">Cedula:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="cedula" placeholder="Ingrese Cedula" value="{{$chulio->cedula}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="celular" class="control-label col-md-3">Celular:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="celular" placeholder="Ingrese Celular" value="{{$chulio->celular}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="control-label col-md-3">Dirección:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="direccion" placeholder="Ingrese Direccion" value="{{$chulio->direccion}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contrasenia" class="control-label col-md-3">Contraseña:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="contrasenia" placeholder="Ingrese Contraseña" value="{{$chulio->contrasenia}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="BUS_id_bus" class="control-label col-md-3">Placa Bus:</label>
                            <div class="col-md-8">
                                <select name="BUS_id_bus" id="BUS_id_bus" class="form-control">
                                    @foreach($buses as $bus)
                                    @if($chulio->BUS_id_bus == $bus->id_bus)
                                    <option value="{{$bus->id_bus}}">{{$bus->placa_bus}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($buses as $bus)
                                    <option value="{{$bus->id_bus}}">{{$bus->placa_bus}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <center>
                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Guardar Cambios</button>
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
    var select = document.getElementById('BUS_id_bus');
    select.addEventListener('change',
        function(){
            var selectedOption = this.options[select.selectedIndex];
            $("#usuario").val(selectedOption.text);
            console.log(selectedOption.value + ': ' + selectedOption.text);
        });
</script>
@endsection