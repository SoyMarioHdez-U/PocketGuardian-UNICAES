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

      //Obtener los nombres de las cuentas
      $cuentas = obtenerDatosCompletosDeCuentas($conexion, $id_usuario);
    //  foreach ($cuentas as $nombre) {
//        echo $nombre . "<br>";
    //}



?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estadísticas</title>
        
        
        <link rel="icon" href="../Png/pgLogo1" type="image/png">


        <link rel="stylesheet" href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/css/estilos.css">
        <link rel="stylesheet" href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/css/cheques.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script type='text/javascript' src='http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/js/sidebar.js'></script>
        <script  type='text/javascript' src='http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/js/modal.js'></script>

    </head>
    <body>
      <!--  Aquí envío el dato de cuántas cuentas posee el usuario !-->
      <script>
        var totalCuentas = <?php echo $total_cuentas; ?>;
        var nombresCuenta = <?php echo json_encode($cuentas); ?>;
        console.log(<?php echo $id_usuario; ?>);
      </script>

        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/png/pgLogo4.png" width="10%" height="20%">    PocketGuardian</div>
                    <div class="Desconectar"><a class="desconectar1" href="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/php/cerrar_sesion.php">Desconectar</a></div>
                </div>
                </div>
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
            
            <div class = "contenedor"> <!-- Contenerdor de espacio de la pagina-->
            
            <div class="estadisticas"> <!-- Contenerdor de los cheques creados -->
                
                <!-- Espacio para los contenedores creados -->
                <div class="menu-flotante" id="floatmenu">
                  <div class="menu">
                      <i id="mainIcon" class='bx bx-message-square-add'></i>
                  </div>

                  <div class="submenu">
                      <i id="cuentaIcon" style="--i:1;" class='bx bxs-wallet'>Cuenta</i>
                      <i id="transaccionIcon" style="--i:2;" class='bx bx-dollar-circle'>Transaccion</i>
                  </div>
                </div>
                

            </div>

            
           <div class="modal_cuenta cuentas hide">
          
            <div class="modal_containerC">
              <h2 class="titulo-modal">Crear Nueva Cuenta</h2>
              <i class='bx bxs-wallet'></i>
              <input class="datos"  type="texto"  placeholder="Nombre de Cuenta" nombre="Nueva_cuenta">
              <input type="button" class="boton" id="Agregar" value="Añadir">
              <input type="button" class="boton" id="cancelar" value="Cancelar">
              
            </div>  

            <div class="modal_cuenta trans ">
          
            <div class="modal_containerC">
              <h2 class="titulo-modal">Crear Nueva Cuenta</h2>
              <i class='bx bx-dollar-circle'></i>
              <input class="datos"  type="texto"  placeholder="Monto" nombre="Monto">
              <input class="datos"  type="texto"  placeholder="Descripcion" nombre="Descripcion">
              <input class="datos"  type="combobox" placeholder="select" nombre="cuentas">
              <input type="button" class="boton" id="Agregar" value="Añadir">
              <input type="button" class="boton" id="cancelar" value="Cancelar">
              
            </div>  
        
    </div>


           </div>

            
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
        <script src="http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/js/cuenta.js"></script>
        <script type='text/javascript' src='http://localhost/PocketGuardian-UNICAES/HTML-CSS-JS/js/sidebar.js'></script>
        <script>
          var menu = document.querySelector("#floatmenu");
            menu.onclick =function(){
              menu.classList.toggle("active");
          }
        </Script>

        
    </body>
</html>