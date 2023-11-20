<?php

session_start();
  include '../php/conexion_be.php';
  include '../php/procesos_cuenta_be.php';
  include '../php/Objetos.php';


  if(!isset($_SESSION['usuario'])){
    echo '
      <script>
        alert("Por favor, inicia sesión");
      </script>
    ';
    header("location: ../html/login.php");
    session_destroy();
    die();

    
  }
  $correo_electronico = $_SESSION['usuario'];
      //Obtenemos nombre y apellido del usuario para mostrarlo
      $nombre_usuario = obtenerNombre($conexion, $correo_electronico);
      $apellido_usuario = obtenerApellido($conexion, $correo_electronico);
      
      //Obtenemos la cantidad de cuentas que tiene el usuario
      $total_cuentas = obtenerNumeroCuentas($conexion, $correo_electronico);
  //    echo "El usuario $nombre_usuario $apellido_usuario tiene $total_cuentas cuenta(s).";

      //Obtener el ID para luego mostrar el total de su cuenta
      $id_usuario = obtenerID($conexion, $correo_electronico);
      //echo " | Id del usuario es: $id_usuario";




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar cuentas y registros</title>
</head>
<body>
    
<!--Formulario de login y registro-->
<div class="form-container2">
               
               <form action="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/insertar_cuentas_be.php" method="POST" class="formulario-login">
                   <h1>PocketGuardian</h1>
                   <h2>Añadir cuenta </h2>
                   Nombre de la cuenta: <input class="datos" type="text" placeholder="Nombre"  name="nombre_cuenta">
                   
                   
                   <button class="botones">Añadir</button>
   

   
                   
                
   
               </form>

               <form action="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/registro_usuario_be.php" method="POST" class="formulario-login">
                   <h1>PocketGuardian</h1>
                   <h2>Añadir transacción</h2>
                   Monto: $ <input class="datos" type="number" inputmode="numeric" placeholder="Monto"  name="monto">
                   Descripción: <input class="datos" type="text" placeholder="Descripción"  name="descripción">
                   <select name="cuenta">
                        <option value="value1">Cuenta 1</option>
                        <option value="value2" selected>Cuenta 2</option>
                        <option value="value3">Cuenta 3</option>
                    </select>
                   
                   <button class="botones">Añadir</button>
   
   
                   
                
   
               </form>
           </div>

    
</body>
</html>