<?php
    require_once('config.php');
    // Clase de conexión que sera heredad por las clases del los modelos
    class ConexionPDO {
        private $servername = SERVIDOR_HOST;
        private $dbname = NOMBRE_DB;
        private $username = USUARIO_DB;
        private $password = CLAVE_DB;
        private $objPDO;
        public $estado;
        protected $query = "";
        protected $rows = array();

        //Conexion a la db
        function __construct(){
            $this->conectar();
        }

        // Inicia conexion
        private function conectar(){
            try {

                $this->objPDO = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password,
                                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ) );
                $this->objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->estado = 'Conectado';
            } catch (PDOException $e) {
                echo $e->getMessage();
                $this->estado = "ERROR: " . $e->getMessage();
            }
        }
        //cerrar conexion
        private function desconectar(){
            $this->objPDO = null;
            $this->estado = 'Desconectado';

        }
        // Ejecutar query para obtener Datos (Rows)
        public function getRows(){

            try {
                $consulta = $this->objPDO->prepare($this->query);
                $consulta->execute();
                $this->rows = $consulta->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                $this->estado = "ERROR: " . $e->getMessage();
            }
        }

        // Retorn ultimo id
        public function ultimoId(){
            return $this->objPDO->lastInsertId();
        }

    }

?>