//Configurando Firebase
var config = {
    apiKey: "AIzaSyDnsYm29DuVtm5dMW4TcbNxHKU5myfs9Xw",
    authDomain: "chulios-a0c98.firebaseapp.com",
    databaseURL: "https://chulios-a0c98.firebaseio.com",
    projectId: "chulios-a0c98",
    storageBucket: "chulios-a0c98.appspot.com",
    messagingSenderId: "832011813382"
};
firebase.initializeApp(config);
var storage=firebase.storage();
//Esta funcion me permite obtener los ids de los inputs
function getID(id)
{
    return document.getElementById(id).value;
}
//refrescar pagina
function limpiarcajas(id,result)
{
    return document.getElementById(id).value=result;
}
//creando el JSON de los datos
function arrayJSON(nombre,cedula,celular,email,contrasena,saldo)
{
    var data ={

        nombre:nombre,
        cedula:cedula,
        celular:celular,
        correo:email,
        contrasena:contrasena,
        saldo:saldo

    };
    return data;
}
//creando la funcion para guardar usuario
function guardar_usuario()
{
    var id=firebase.database().ref().child('Usuarios').push().key
    var nombre=getID('nombre');
    var cedula=getID('cedula');
    var celular=getID('celular');
    var email=getID('correo');
    var contrasena=getID('contrasena');
    var saldo=getID('saldo');

    if(id.length==0 || nombre.length==0 || cedula.length==0 || celular.length==0 || correo.length==0 || saldo.length==0)
    {
        alert('Campos Vacios por Rellenar');
    }
    else
    {
        //transformando a JSON los datos
        var arrayData=arrayJSON(nombre,cedula,celular,email,contrasena,saldo);
        console.log(arrayData);
        var tarea=firebase.database().ref("usuario/"+id);
        tarea.set(arrayData);
        alert('Usuario Guardado Exitosamente');
        limpiarcajas("nombre","");
        limpiarcajas("cedula","");
        limpiarcajas("celular","");
        limpiarcajas("contrasena","");
        limpiarcajas("saldo","");
        limpiarcajas("correo","");
    }
}
//inner html
function innerHTML(id,result)
{
    return document.getElementById(id).innerHTML+=result;
}
function table(nombre,cedula,celular,saldo,correo)
{
    return '<tr>'+
        '<td>'+nombre+'</td>'+
        '<td>'+cedula+'</td>'+
        '<td>'+celular+'</td>'+
        '<td>'+saldo+'</td>'+
        '<td>'+correo+'</td>'+
        '</tr>';

}
//listado de Usuarios
function listar_usuarios()
{
    //console.log('si entra a esta funcion');
    var tarea=firebase.database().ref("usuario/");
    tarea.on("child_added",function(data){
        var tareavalue=data.val();
        var result= table(tareavalue.nombre,tareavalue.cedula,tareavalue.celular,tareavalue.saldo,tareavalue.correo);
        //console.log(result);
        innerHTML("cargar_usuarios",result);
    });
}
function subir_imagen_usuario()
{
    //cargando las variables del progress y el input files
    var uploader=document.getElementById('uploader');
    //cargando el archivo de imagen
    var file = document.querySelector('#fileButton').files[0];
    console.log(file);
    // Creando el metadata
    var metadata = {
        contentType: 'image/jpeg'
    };
    //referenciando al storageRef
    var storageRef=storage.ref();
    // Subiendo el Archivo y el metada
    var uploadTask = storageRef.child('imagenes_usuarios/' + file.name).put(file,metadata);
    // escuchando los cambios necesarios
    uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED, // or 'state_changed'
        function(snapshot) {
            // obteniendo el progreso de la barra
            var uploader = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Subiendo Archivo ' + uploader + '% adelante');
            switch (snapshot.state) {
                case firebase.storage.TaskState.PAUSED: // es para pausar
                    console.log('La subida esta Pausada');
                    break;
                case firebase.storage.TaskState.RUNNING: // es para correr
                    console.log('Archivo Subiendo');
                    break;
            }
        }, function(error) {
            switch (error.code) {
                case 'storage/unauthorized':
                    // El usuario no tiene permiso para acceder al objeto
                    break;

                case 'storage/canceled':
                    // El usuario canceló la carga del archivo
                    break;
                case 'storage/unknown':
                    // Se ha producido un error desconocido, inspeccione error.serverResponse
                    break;
            }
        }, function(downloadURL) {
            // Subida completada con éxito, ahora podemos obtener la URL de descarga
            uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                console.log('Archivo disponible en:', downloadURL);

            });
        });
}
function prueba()
{
    var j
    j=subir_imagen_usuario();
    console.log(j);
}