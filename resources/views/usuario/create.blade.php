@extends("layouts.app")
@section('content')
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear un Usuario</title>
  </head>
  <body onload="listar_usuarios()">
    <div class="container">
      <div class="row">   
        <div class="col-md-4">
          <div class="card card-success">
            <div class="card card-header">
              <div class="row">
                <div class="col-md-10">
                  <strong>Agregar Usuario</strong>
                </div>
              </div>
            </div>
            <div class="card-body">
               <h4>Crear un Nuevo Usuario</h4>
               <input id="nombre" type="text" name="nombre" value="nombre" placeholder="Ingrese  Nombre">
               <input id="cedula" type="text" name="cedula" value="cedula" placeholder="Ingrese  Cedula">
               <input id="celular" type="text" name="celular" value="celular" placeholder="Ingrese Celular">
               <input id="correo" type="email" name="email" value="email" placeholder="Ingrese  E-mail">
               <progress value="0" max="100" id="uploader">0%</progress>
               <input id="fileButton" value="upload" type="file" accept="image/*">
               <input id="contrasena" type="password" name="contrasena" value="contrasena" placeholder="Ingrese Contraseña">
               <input id="saldo" type="number" name="saldo" value="saldo" placeholder="Ingrese Saldo">
               <button class="btn btn-success" onclick="guardar_usuario()">Guardar</button>
               <button type="button" class="btn btn-default" onclick="prueba()">Subir</button>
               <br>
               <br>
               <h3>Listado de Usuarios </h3>
               <table class="table table-bordered text-center">
                 <thead>
                   <tr>
                     <th><center>Nombre</center></th>
                     <th><center>Cedula</center></th>
                     <th><center>Celular</center></th>
                     <th><center>Saldo</center></th>
                     <th>E-mail</th>
                   </tr>
                 </thead>
                 <tbody id="cargar_usuarios"></tbody>
               </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script src="{{ asset('js/CrudUsuarioFirebase.js') }}"></script>
  </body>
</html>
@endsection
