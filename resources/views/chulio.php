<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chulios</title>
</head>
<body>
<h1>Datos Chulios</h1>
<form id="form-Chulio" class="" method="POST" action="">
    <p>Nombre:  <input type="text" maxlength="100" id="nombre"></p>
    <p>Cedula:  <input type="text" maxlength="10" id="cedula"></p>
    <p>Celular:  <input type="text" maxlength="10" id="celular"></p>
    <p>Direccion: <input id="direccion"></p>
    <p>Contraseña: <input type="password" id="pass"></p>
    <button id="guardar">Guardar</button>
</form>
<script src="https://www.gstatic.com/firebasejs/5.5.6/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyDY2jMtT6qOrwZ2EEEKjRmgyhlhdxqsC3A",
        authDomain: "prueba-chulios.firebaseapp.com",
        databaseURL: "https://prueba-chulios.firebaseio.com",
        projectId: "prueba-chulios",
        storageBucket: "prueba-chulios.appspot.com",
        messagingSenderId: "262784884836"
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var lastIndex = 0;

    // Add Data
    $('#guardar').on('click', function(){
        var values = $("#form-Chulio").serializeArray();
        var nombre = values[0].value;
        var cedula = values[1].value;
        var celular = values[2].value;
        var direccion = values[3].value;
        var pass = values[4].value;
        var chulioID = lastIndex+1;

        firebase.database().ref('chulios/' + chulioID).set({
            nombre: nombre,
            cedula: cedula,
            celular: celular,
            direccion: direccion,
            pass: pass,
        });

    });
</script>
</body>
</html>
