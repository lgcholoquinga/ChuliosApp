@extends("layouts.app")
@section('content')
<!DOCTYPE html>
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
               <input id="email" type="email" name="email" value="email" placeholder="Ingrese  E-mail">
               <input id="contrasena" type="password" name="contrasena" value="contrasena" placeholder="Ingrese Contraseña">
               <input id="saldo" type="number" name="saldo" value="saldo" placeholder="Ingrese Saldo">
               <button class="btn btn-success" onclick="guardar_usuario()">Guardar</button>
               <br>
               <br>
               <h3>Listado de Usuarios </h3>
               <table class="table table-bordered text-center">
                 <thead>
                   <tr>
                     <th>Nombre</th>
                     <th>Cedula</th>
                     <th>Celular</th>
                     <th>Saldo</th>
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
