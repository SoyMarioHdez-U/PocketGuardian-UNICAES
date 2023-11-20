<?php
    session_start();

    include 'conexion_be.php';
    include 'procesos_cuenta_be.php';
    include 'Objetos.php';
    
    $correo_electronico = $_SESSION['usuario'];

      //Obtener el ID para luego mostrar el total de su cuenta
      $id_usuario = obtenerID($conexion, $correo_electronico);
      //echo " | Id del usuario es: $id_usuario";
    
      $cuentas = obtenerDatosCompletosDeCuentas($conexion, $id_usuario);
      
      //Atributos propios de la transacción
      $monto = $_POST['monto'];
      $descripcion = $_POST['descripcion'];
      $id_cuenta = $_POST['cuenta'];
      $tipo_transaccion = $_POST['tipo_transaccion'];
      $fecha = $_POST['fecha'];

    
/*
    //Validar que todos los campos estén llenos
    if (empty($monto)||empty($descripcion)||empty($id_cuenta)||empty($tipo_transaccion)) {
        echo '
            <script>
                alert("Por favor llena todos los campos.");
                window.location = "../html/prueba_insertar.php";
            </script>
        ';
        exit(); 
    }
*/
    // Convierte la fecha al formato de MySQL
    $fecha_mysql = date("Y-m-d", strtotime($fecha));

    $query = "INSERT INTO transacciones(monto, descripcion, fecha, id_cuenta, id_tipo) 
              VALUES($monto, '$descripcion', '$fecha_mysql', $id_cuenta, $tipo_transaccion)";

    //verificar que no se repita el nombre de la cuenta
    $insertar_transaccion = mysqli_query($conexion, $query);

    if($insertar_transaccion){
        echo '
        <script>
            alert("Transacción almacenada con éxito");
            window.location = "../html/Cuentas.php";
        </script>
        ';
    }
    else{
        echo '
        <script>
            alert("Algo salió mal :( Intenta de nuevo.");
            window.location = "../html/prueba_insertar.php";
        </script>
    ';
    }

    mysqli_close($conexion);

?>