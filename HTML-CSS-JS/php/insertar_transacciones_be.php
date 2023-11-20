<?php
    session_start();

    include 'conexion_be.php';
    include 'procesos_cuenta_be.php';
    
    $correo_electronico = $_SESSION['usuario'];

      //Obtener el ID para luego mostrar el total de su cuenta
      $id_usuario = obtenerID($conexion, $correo_electronico);
      //echo " | Id del usuario es: $id_usuario";
    
      $cuentas = obtenerDatosCompletosDeCuentas($conexion, $id_usuario);
      
      //Atributos propios de la transacción
      $monto = $_POST['monto'];
      $monto = $_POST['monto'];
    

    //Validar que todos los campos estén llenos
    if (empty($nombre_cuenta)) {
        echo '
            <script>
                alert("Por favor llena todos los campos.");
                window.location = "../html/prueba_insertar.php";
            </script>
        ';
        exit(); 
    }

    $query = "INSERT INTO cuenta(nombre_cuenta, id_usuario) 
              VALUES('$nombre_cuenta', '$id_usuario')";

    //verificar que no se repita el nombre de la cuenta
    $verificar_cuenta = mysqli_query($conexion, "SELECT * FROM cuenta WHERE id_usuario='$id_usuario' AND nombre_cuenta='$nombre_cuenta';");

    if(mysqli_num_rows($verificar_cuenta)>0){
        echo '
        <script>
            alert("Usted ya posee una cuenta con ese nombre, ingrese uno nuevo.");
            window.location = "../html/prueba_insertar.php";
        </script>
        ';
        mysqli_close($conexion);
        
    }



    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
            alert("Cuenta almacenada con éxito");
            window.location = "../html/Cuentas.php";
        </script>
        ';
    }
    else{
        echo '
        <script>
            alert("Algo salió mal :( Intenta de nuevo.")
        </script>
    ';
    }

    mysqli_close($conexion);

?>