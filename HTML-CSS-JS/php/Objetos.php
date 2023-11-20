<?php
    // Clase Transaccion
    class Transaccion {
        public $monto;
        public $descripcion;
        public $fecha;
        public $tipo_movimiento;
        public $id_cuenta;

        public function __construct($monto, $descripcion, $fecha, $tipo_movimiento, $id_cuenta) {
            $this->monto = $monto;
            $this->descripcion = $descripcion;
            $this->fecha = $fecha;
            $this->tipo_movimiento = $tipo_movimiento;
            $this->id_cuenta = $id_cuenta;
        }
    }

    // Clase Cuenta
    class Cuenta {
        public $id_cuenta;
        public $nombre_cuenta;
        public $saldo;
        public $transacciones =array(); // Array para almacenar objetos de tipo Transaccion
        


        public function __construct($id_cuenta, $nombre_cuenta, $saldo, $transacciones) {
            $this->id_cuenta = $id_cuenta;
            $this->nombre_cuenta = $nombre_cuenta;
            $this->saldo = $saldo;
            $this->transacciones = $transacciones; // Inicializar el array de transacciones
        }
    }


?>