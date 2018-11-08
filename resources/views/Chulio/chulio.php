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
    <label>Bus: </label>
    <input type="text" maxlength="100" id="bus">
    <p>Nombre:  <input type="text" maxlength="100" id="nombre"></p>
    <p>Cedula:  <input type="text" maxlength="10" onkeypress="return valida(event)" id="cedula"></p>
    <p>Celular:  <input type="text" maxlength="10" onkeypress="return valida(event)" id="celular"></p>
    <p>Direccion: <input type="text" id="direccion"></p>
    <p>Contraseña: <input type="password" id="pass"></p>
    <input type="button" value="Guardar" onclick="guardarChulio();">
</form>

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

<script src="https://www.gstatic.com/firebasejs/5.5.7/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCgQuHTH691gKfcUPUFhE08NTpV9wKpnd4",
        authDomain: "completo-33db6.firebaseapp.com",
        databaseURL: "https://completo-33db6.firebaseio.com",
        projectId: "completo-33db6",
        storageBucket: "completo-33db6.appspot.com",
        messagingSenderId: "328156274891"
        //-------------Firebase Chulios--------------------

        /*apiKey: "AIzaSyDY2jMtT6qOrwZ2EEEKjRmgyhlhdxqsC3A",
        authDomain: "prueba-chulios.firebaseapp.com",
        databaseURL: "https://prueba-chulios.firebaseio.com",
        projectId: "prueba-chulios",
        storageBucket: "prueba-chulios.appspot.com",
        messagingSenderId: "262784884836"*/
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var frame= document.getElementById('form-Chulio');
    var dref = firebase.database().ref().child('Chulios');
    dref.on('value', function(snapshot){
        console.log(snapshot.val());
    });

    function guardarChulio(){
        console.log(bu);
        var bu = document.getElementById('bus').value;
        var nom = document.getElementById('nombre').value;
        var ced = document.getElementById('cedula').value;
        var cel = document.getElementById('celular').value;
        var dir = document.getElementById('direccion').value;
        var clave = document.getElementById('pass').value;
        dref.push().set({
            bus: bu,
            nombre: nom,
            cedula: ced,
            celular: cel,
            direccion: dir,
            contrasenia: clave
        });
        frame.reset();
    }
</script>
</body>
</html>
