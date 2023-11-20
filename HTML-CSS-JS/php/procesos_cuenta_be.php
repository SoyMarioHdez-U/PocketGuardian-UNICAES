<?php
//include '../php/Objetos.php';

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
    $consulta_cuentas = "SELECT nombre_cuenta, id_cuenta FROM cuenta WHERE id_usuario = '$id_usuario'";

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


function obtenerDatosCompletosDeCuentas($conexion, $id_usuario){

    // Consulta SQL para obtener LOS DATOS DE LA CUENTA
    $consulta_cuentas = "SELECT c.id_cuenta, c.nombre_cuenta, u.nombre,
                        COALESCE(SUM(CASE WHEN id_tipo = 0 THEN t.monto ELSE -t.monto END), 0) AS balance_total
                        FROM cuenta c
                        JOIN usuario u USING(id_usuario)
                        LEFT JOIN transacciones t ON t.id_cuenta = c.id_cuenta
                        WHERE u.id_usuario = $id_usuario
                        GROUP BY c.id_cuenta, c.nombre_cuenta, u.nombre;";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta_cuentas);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Inicializar un array para almacenar los nombres de cuenta
        $cuentas = array();
        

        // Recorrer los resultados y almacenar los nombres de cuenta en el array
        while ($fila = $resultado->fetch_assoc()) {
            $id_cuenta = $fila['id_cuenta'];
            $nombre_cuenta = $fila['nombre_cuenta'];
            $total = $fila['balance_total'];

            $transacciones = array();    
            
            //AQUÍ HACER EL ARRAY DE TRANSACCIONES
            $consulta_transacciones = "SELECT * FROM transacciones WHERE id_cuenta = $id_cuenta";
            $resultado2 = mysqli_query($conexion, $consulta_transacciones);

            if($resultado2){
                
                
                while($fila2 = $resultado2->fetch_assoc()){
                    $monto = $fila2['monto'];
                    $descripcion = $fila2['descripcion'];
                    $fecha = $fila2['fecha'];
                    $tipo_transaccion = ($fila2['id_tipo'] == 0) ? 'ingreso' : 'egreso';
                    $nuevaTransaccion = new Transaccion($monto, $descripcion, $fecha, $tipo_transaccion, $id_cuenta);
                    $transacciones[] = $nuevaTransaccion;
                }
                
            }
            
            $nuevaCuenta = new Cuenta($id_cuenta, $nombre_cuenta, $total, $transacciones);
            $cuentas[] = $nuevaCuenta;
            
        }
        //var_dump($cuentas);

        return $cuentas;

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

function obtenerIDcuenta($conexion, $id_usuario, $nombre_cuenta){
    $consulta_id_cuenta = mysqli_query($conexion, "SELECT id_cuenta FROM cuenta WHERE nombre_cuenta='$nombre_cuenta' AND id_usuario='$id_usuario'");

    // Verificar si la consulta fue exitosa
    if($consulta_id_cuenta){
        // Obtener los datos del usuario
        $fila_cuenta = mysqli_fetch_assoc($consulta_id_cuenta);
        $id_cuenta = $fila_cuenta['id_cuenta'];            
        return $id_cuenta;
    }
    return 0;
}

function obtenerCuentasUsuario($conexion, $id_usuario){

}

function obtenerBalance($conexion, $id_usuario){
    // Consultar la base de datos para obtener el nombre y apellido del usuario
    $consulta_balance = mysqli_query($conexion, "SELECT SUM(CASE WHEN id_tipo = 0 THEN monto ELSE -monto END) AS balance FROM transacciones WHERE id_cuenta = $id_usuario");
        
    // Verificar si la consulta fue exitosa
    if($consulta_balance){
        // Obtener los datos del usuario
        $fila_usuario = mysqli_fetch_assoc($consulta_balance);
        $balance = ($fila_usuario['balance'] !== NULL) ? $fila_usuario['balance'] : '0';

        return $balance;
    }
    return 0;
}



?>