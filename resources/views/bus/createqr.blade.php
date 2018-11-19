@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h2><center>Generar Codigo QR Buses </strong>"Cooperativa Flor del Valle"</strong></center></h2>
        </div>
        <div class="panel-body">
          <a href="#" class="btn btn-success">Panel de Administración</a>
          <a href="{{url('/bus')}}" class="btn btn-success">Listado de Buses</a>
          <hr>
          <div class="alert alert-danger">
            <center><h4>Selecciona una de las Placas del Bus para poder generar un QR </h4></center>
          </div>
          <center>
            <form id="frm">
            <select  name="placabus" id="placabus">
                   <option value="selec" selected>Selecciona una Placa Bus</option>
                   @foreach($bus as $bus)
                       <option value="{{$bus->PLACA_BUS}}" >{{$bus->NOMBRE_PROP}}</option>
                    @endforeach
            </select>
            <hr>
            <div id="generar">
            <button class="btn btn-primary" id="ajaxSubmit">Generar QR</button>
            </div>
            
            </form>        
            <div id="resultado">
            </div>
            <hr>
            <div id="update">
                        <form class="form-horizontal"  action="{{route('bus.storeqr')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        
                                <input type="hidden" name="id" id="id" value="{{$bus->PLACA_BUS}}">
                                
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Guardar QR</button>
                                        <a href="{{url('/createqr')}}" class="btn btn-danger"><i class="icon-squared-cross"></i> Cancelar</a>
                                        <a href="#" class="btn btn-info">Descargar QR</a>
                                    </center>
                                </div>
                            </div>
                            
                        </form>   
              </div>     
          </center>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Cragando el script para generar el qr bs -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script>

  jQuery(document).ready(function(){
            jQuery('#update').hide();  
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();

              $.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               var placa=jQuery('#placabus').val();
               console.log(placa);
               jQuery.ajax({
                  url: '{{ url('/bus/postqr') }}',
                  type: 'POST',
                  data: {
                     placa: jQuery('#placabus').val()
                  },
                  success: function(result){
                     //jQuery('.alert').show();
                     //jQuery('.alert').html(result.success);
                     jQuery('.alert').html(result.success);
                     jQuery('#resultado').html(result);  
                     jQuery('#update').show();
                     jQuery('#generar').hide();
                  },error: function(data){
                        alert("Fallo al Crear QR bus");
                  }
                });
            });
  });
</script> 
@endsection