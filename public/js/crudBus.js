$(document).ready(function(){
    
    $('#crearbus').on('shown.bs.modal', function (event) {
        console.log('Ventana Modal Crear Bus Iniciado');
        jQuery('#enviarbus').click(function(e){
                 //e.preventDefault();
                 var file_data = $('#foto').prop('files')[0];   
                 var form_data = new FormData();
                 form_data.append('foto', file_data);
                 form_data.append('nombre',jQuery('#nombre').val());
                 form_data.append('cedula',jQuery('#cedula').val());
                 form_data.append('celular',jQuery('#celular').val());
                 form_data.append('numero',jQuery('#numero').val());
                 form_data.append('placa',jQuery('#placa').val());
                 form_data.append('capacidad',jQuery('#capacidad').val());   
                 $.ajaxSetup({
                    headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });
                 jQuery.ajax({
                    dataType: 'json',
                    url: 'bus',
                    type: 'POST',
                    data:form_data,
                    processData:false,
                    cache:false,
                    contentType: false,
                    success: function(result){
                        if(result.success=="true")
                        {
                            alert("Datos Guardados Exitosamente..")
                            document.location.href="{{URL::to('bus')}}";
                        }
                         
                    },error: function(result){
                        
                        $('#error-nombre').html(result.responseJSON.nombre);
                        $('#error-cedula').html(result.responseJSON.cedula);
                        $('#error-celular').html(result.responseJSON.numero);
                        $('#error-placa').html(result.responseJSON.placa);
                        $('#error-capacidad').html(result.responseJSON.capacidad);
                        $('#error-foto').html(result.responseJSON.foto);
                        $('#message-error').fadeIn();
                        /*if (result.status == 422) {
                            console.clear();
                         }*/
                    }
                  });
        });
    
    });

    $(document).on('shown.bs.modal',function(event){
        console.log("ventana modal eliminar bus iniciado");
    });
});


