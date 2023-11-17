<?php

    include 'conexion_be.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo_electronico = $_POST['correo_electronico'];
    $password = $_POST['password'];

    //Esto encripta la contraseña
    //$password = hash('sha512', $password);

    //Validar que todos los campos estén llenos
    if (empty($correo_electronico) || empty($password) || empty($nombre) || empty($apellido)) {
        echo '
            <script>
                alert("Por favor llena todos los campos.");
                window.location = "../html/login.php";
            </script>
        ';
        exit(); 
    }

    $query = "INSERT INTO usuario(nombre, apellido, correo, contra, id_cuenta) 
              VALUES('$nombre', '$apellido', '$correo_electronico', '$password', 0)";

    //verificar que el correo no se repita en la bd
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo_electronico'");

    if(mysqli_num_rows($verificar_correo)>0){
        echo '
        <script>
            alert("Este correo ya estaba registrado. Ingresa a tu cuenta o regístrate con un correo diferente.");
            window.location = "../html/login.php";
        </script>
        ';
        mysqli_close($conexion);
        
    }



    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
            alert("Usuario almacenado con éxito");
            window.location = "../html/login.php";
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