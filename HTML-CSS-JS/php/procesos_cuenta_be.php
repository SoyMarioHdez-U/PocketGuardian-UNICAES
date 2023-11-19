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


?>