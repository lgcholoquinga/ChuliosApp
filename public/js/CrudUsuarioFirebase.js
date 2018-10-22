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
        email:email,
        contrasena:contrasena,
        saldo:saldo
 	};
  return data;
}
//creando la funcion para guardar usuario
function guardar_usuario()
{
  var id=firebase.database().ref().child('usuario').push().key
  var nombre=getID('nombre');
  var cedula=getID('cedula');
  var celular=getID('celular');
  var email=getID('email');
  var contrasena=getID('contrasena');
  var saldo=getID('saldo');
  if(id.length==0)
  {
    alert('Campos Vacios por Rellenar');
  }
  else
  {
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
    limpiarcajas("email","");
  }
}
//inner html
function innerHTML(id,result)
{
  return document.getElementById(id).innerHTML+=result;
}
function table(nombre,cedula,celular,saldo,email)
{
  return '<tr>'+
    '<td>'+nombre+'</td>'+
    '<td>'+cedula+'</td>'+
    '<td>'+celular+'</td>'+
    '<td>'+saldo+'</td>'+
    '<td>'+email+'</td>'+
  '</tr>';

}
//listado de Usuarios
function listar_usuarios()
{
  //console.log('si entra a esta funcion');
  var tarea=firebase.database().ref("usuario/");
  tarea.on("child_added",function(data){
    var tareavalue=data.val();
    var result= table(tareavalue.nombre,tareavalue.cedula,tareavalue.celular,tareavalue.saldo,tareavalue.email);
    //console.log(result);
    innerHTML("cargar_usuarios",result);

  });
}
