<?php
    session_start();
    include 'conexion_be.php';

    $correo_electronico = $_POST['correo_electronico'];
    $password = $_POST['password'];
    //Buscar la contraseña encriptada
    //$password = hash('sha512', $password);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo='$correo_electronico'
                                  AND contra='$password'");


    if(mysqli_num_rows($validar_login)>0){
        $_SESSION['usuario'] = $correo_electronico;
        
        echo '
            <script>
                window.location = "../html/Cuentas.php";
            </script>
        ';
        
        exit;
    }
    else{
        echo '
            <script>
                alert("El usuario no existe o la contraseña es incorrecta. Verifique los datos introducidos.");
                window.location = "../html/login.php";
            </script>
        ';
        exit;
    }

    
?>