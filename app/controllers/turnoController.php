<?php
    require_once('../models/turnoModel.php');
    echo 'Soy el controlador';

    class TurnoController {
        private $turno;

        function __construct(){
            $this->turno = new TurnoModelo();
        }

        public function listar(){
            $resultado = $this->turno->listar();
            print_r($resultado);
            
        }
    }

    $turno = new TurnoController();
    $turno->listar();
?>