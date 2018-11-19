<?php
    $dir='storage/qr_bus/';
    $filename=$dir.$placa.'.png';
    $tamanio=15;
    $level='H';
    $frameSize=5;
    $contenido=$placa;
    QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);
    echo'<img width="300px" src="'.$filename.'"/>';
?>