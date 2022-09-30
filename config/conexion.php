<?php
    class Conectar 
    {
        protected $db;
        
        protected function Conexion() {
            try {
				$conectar = $this->db = new PDO("mysql:local=localhost;dbname=Prueba_novatec","root","");
				return $conectar;	
			} catch (Exception $e) {
				print "Error de conexión: " . $e->getMessage() . "<br/>";
				die();	
			}
        }
    }
?>