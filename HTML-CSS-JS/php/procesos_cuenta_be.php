<?php
// ... (código de conexión)
include conexion_be;

$sql = "SELECT cuentas.nombre_cuenta, transacciones.monto, transacciones.tipo_movimiento, transacciones.fecha, transacciones.descripcion 
        FROM cuentas 
        JOIN transacciones ON cuentas.id = transacciones.cuenta_id";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Convertir el array a formato JSON
$json_data = json_encode($data);

// Cerrar conexión
$conn->close();

// Enviar datos JSON al frontend
echo $json_data;

?>