<?php

  session_start();
  include '../php/conexion_be.php';

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

        // Consultar la base de datos para obtener el nombre y apellido del usuario
        $consulta_usuario = mysqli_query($conexion, "SELECT nombre, apellido FROM usuario WHERE correo='$correo_electronico'");
        
        // Verificar si la consulta fue exitosa
        if($consulta_usuario){
            // Obtener los datos del usuario
            $fila_usuario = mysqli_fetch_assoc($consulta_usuario);
            $nombre_usuario = $fila_usuario['nombre'];
            $apellido_usuario = $fila_usuario['apellido'];


            
        }

  //Obtenemos el número de cuentas y generamos
?>


<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cuentas</title>
        
        <link rel="stylesheet" href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/css/estilos.css">
        <script type='text/javascript' src='http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/js/sidebar.js'></script>
        
    </head>
    <body>
    


        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/png/pgLogo4.png" width="10%" height="20%">    PocketGuardian</div>
                    <div class="Desconectar"><a class="desconectar1" href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/cerrar_sesion.php">Desconectar</a></div>
                </div>
                </div>
            </div>
            <div class="mensajeBienvenida">
            <?php
            // Mostrar mensaje de bienvenida
            echo "Bienvenido, " . $nombre_usuario . " " . $apellido_usuario;
            ?>
            </div>
            <div class='sidebar-menu'>
                
                <ul>
                  <li class='active'>
                    <a class='expandable' href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/html/Cuentas.php" title='Cuentas'>
                        <img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/Png/cuentas.png" width="70%" height="70%">
                      <span class='expanded-element'>Cuentas</span>
                    </a>
                  </li>
                  
                  <li>
                    <a class='expandable' href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/html/Estadisticas.php" title='Estadisticas'>
                        <img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/Png/grafico.png" width="60%" height="60%">
                      <span class='expanded-element'>Estadisticas</span>
                    </a>
                  </li>
                  <li>
                    <a class='expandable' href='http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/html/Configuraciones.html' title='Configuraciones'>
                        <img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/Png/confi.png" width="60%" height="60%">
                      <span class='expanded-element'>Configuraciones</span>
                    </a>
                  </li>
                </ul>
        </div>
            </div>
        </div>

        <div class="cuentas">

        </div>
        <div class="footer">
            <div class="logoFooter"></div>
            <div class="socialNetworks">
                <a href="http://www.facebook.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/facebook.png"></a>
                <a href="http://www.twitter.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/twitter.png"></a>
                <a href="http://www.instagram.com"><img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/img/instagram.png"></a>
            </div>
                <p>© 2023 PocketGuardian</p>
                <p class="lastFooter">Tecnologías Web - Universidad Católica de El Salvador</p>
            </div>
        </div>
        <div class="fondo">
        
        </div>
        <script type='text/javascript' src='C:/wamp64/www/PocketGuardian-UNICAES/HTML-CSS-JS/js/sidebar.js'></script>
    </body>
</html>
