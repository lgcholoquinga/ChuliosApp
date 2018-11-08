<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recarga</title>
</head>
<body>
<h1>Formulario Recargas</h1>
<form id="form-recarga" action="" method="POST">
    <p>Usuario: <input type="text" id="usuario"></p>
    <p>Sede: <input type="text" id="sede"></p>
    <p>Valor: <input type="money" id="valor"></p>
    <p>Fecha: <input type="date" id="fecha"></p>
    <input type="button" value="Detalle" onclick="verDetalle();">
</form>
<script src="https://www.gstatic.com/firebasejs/5.5.7/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        /*apiKey: "AIzaSyDY2jMtT6qOrwZ2EEEKjRmgyhlhdxqsC3A",
        authDomain: "prueba-chulios.firebaseapp.com",
        databaseURL: "https://prueba-chulios.firebaseio.com",
        projectId: "prueba-chulios",
        storageBucket: "prueba-chulios.appspot.com",
        messagingSenderId: "262784884836"*/

         apiKey: "AIzaSyCgQuHTH691gKfcUPUFhE08NTpV9wKpnd4",
         authDomain: "completo-33db6.firebaseapp.com",
         databaseURL: "https://completo-33db6.firebaseio.com",
         projectId: "completo-33db6",
         storageBucket: "completo-33db6.appspot.com",
         messagingSenderId: "328156274891"
         //-------------Firebase Chulios--------------------

    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var frame= document.getElementById('form-recarga');
    var dref1=firebase.database().ref().child('Usuarios');
    var dref = firebase.database().ref().child('Recargas');
    var list= dref.ref().child('8KvDmRbxtThUcdtIrxswDH5ujDY2');
    dref1.on('value', function(snapshot){
        console.log(snapshot.val());
    });

    function verDetalle(){
        list.on('value', function(snapshot){
            usuario.innerText(snapshot.val());
        });
    }

</script>
</body>
</html>