<?php
    // Clase Transaccion
    class Transaccion {
        public $monto;
        public $descripcion;
        public $fecha;

        public function __construct($monto, $descripcion, $fecha) {
            $this->monto = $monto;
            $this->descripcion = $descripcion;
            $this->fecha = $fecha;
        }
    }

    // Clase Cuenta
    class Cuenta {
        public $id_cuenta;
        public $nombre_cuenta;
        public $saldo;
        public $transacciones; // Array para almacenar objetos de tipo Transaccion
        


        public function __construct($id_cuenta, $nombre_cuenta, $saldo = 0, $transacciones) {
            $this->id_cuenta = $id_cuenta;
            $this->nombre_cuenta = $nombre_cuenta;
            $this->saldo = $saldo;
            $this->transacciones = array(); // Inicializar el array de transacciones
        }
    }


?>