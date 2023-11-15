<?php


    $conexion = mysqli_connect("localhost", "root", "catolica", "pocketguardian");

    if($conexion){
        echo 'Conectado existosamente a la Base de Datos';
    }
    else{
        echo 'Fallamos, jefe :(';
    }


?>