<?php

    require_once('../core/ConexionPDO.php')


    class Turno extends ConexionPDO(){
        public $id;
        public $fecha;
        public $detalle;

        public function lisar(){
            $this->query= "SELECT * FROM Turno";
            $this->getRows();
            return $this->rows();
        }

        public function actualizar(){
            $this->query = "UPDATE Turnos
                            SET detalle = $this->detalle
                            WHERE Id = $this->id";
            $this->ejecutar();
            
        }

        public function crear(){
            $this->query = "INSERT INTO Turnos(detalle) VALUES( $this->detalle )";
            $this->ejecutar();

            return $this->ultimoId();
        }

    }

?>