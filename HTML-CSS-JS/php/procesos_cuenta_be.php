<?php

function obtenerNumeroCuentas($conexion, $correo_electronico) {
    $query = "SELECT u.id_usuario, u.nombre, u.apellido, u.correo, COUNT(c.id_cuenta) as total_cuentas
              FROM usuario u
              LEFT JOIN cuenta c ON u.id_usuario = c.id_usuario
              WHERE u.correo = '$correo_electronico'
              GROUP BY u.id_usuario, u.nombre, u.apellido, u.correo";

    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $total_cuentas = $fila['total_cuentas'];

        return $total_cuentas;
    }

    // Si hay un error en la consulta, podrías manejarlo de alguna manera (lanzar una excepción, devolver un valor predeterminado, etc.).
    return 0; // Por ejemplo, devolver 0 si no se pudo obtener el número de cuentas.
}

function obtenerNombre($conexion, $correo_electronico){
    // Consultar la base de datos para obtener el nombre y apellido del usuario
    $consulta_usuario = mysqli_query($conexion, "SELECT nombre, apellido FROM usuario WHERE correo='$correo_electronico'");
        
    // Verificar si la consulta fue exitosa
    if($consulta_usuario){
        // Obtener los datos del usuario
        $fila_usuario = mysqli_fetch_assoc($consulta_usuario);
        $nombre_usuario = $fila_usuario['nombre'];
    }
    return $nombre_usuario;

}

function obtenerApellido($conexion, $correo_electronico){
    // Consultar la base de datos para obtener el nombre y apellido del usuario
    $consulta_usuario = mysqli_query($conexion, "SELECT nombre, apellido FROM usuario WHERE correo='$correo_electronico'");
        
    // Verificar si la consulta fue exitosa
    if($consulta_usuario){
        // Obtener los datos del usuario
        $fila_usuario = mysqli_fetch_assoc($consulta_usuario);
        $apellido_usuario = $fila_usuario['apellido'];            
    }
    return $apellido_usuario;
}

function obtenerDatosDeCuentas($conexion, $id_usuario){
    // Consulta SQL para obtener los nombres de cuenta del usuario específico
    $consulta_cuentas = "SELECT nombre_cuenta FROM cuenta WHERE id_usuario = '$id_usuario'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta_cuentas);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Inicializar un array para almacenar los nombres de cuenta
        $nombresDeCuenta = array();

        // Recorrer los resultados y almacenar los nombres de cuenta en el array
        while ($fila = $resultado->fetch_assoc()) {
            $nombresDeCuenta[] = $fila['nombre_cuenta'];
        }

        return $nombresDeCuenta;

    } else {
        // Manejar el caso en el que la consulta falla
        echo "Error en la consulta: " . $conexion->error;
    }
}



function obtenerID($conexion, $correo_electronico){
    // Consultar la base de datos para obtener el nombre y apellido del usuario
    $consulta_id = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE correo='$correo_electronico'");
        
    // Verificar si la consulta fue exitosa
    if($consulta_id){
        // Obtener los datos del usuario
        $fila_usuario = mysqli_fetch_assoc($consulta_id);
        $id_usuario = $fila_usuario['id_usuario'];            
        return $id_usuario;
    }
    return 0;
}

function obtenerBalance($conexion, $id_usuario){
    // Consultar la base de datos para obtener el nombre y apellido del usuario
    $consulta_balance = mysqli_query($conexion, "SELECT SUM(CASE WHEN id_tipo = 0 THEN monto ELSE -monto END) AS balance FROM transacciones WHERE id_cuenta = $id_usuario");
        
    // Verificar si la consulta fue exitosa
    if($consulta_balance){
        // Obtener los datos del usuario
        $fila_usuario = mysqli_fetch_assoc($consulta_balance);
        $balance = $fila_usuario['balance'];            
        return $balance;
    }
    return 0;
}



?>