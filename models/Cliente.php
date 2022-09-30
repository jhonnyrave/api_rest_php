<?php
    
    class Cliente extends Conectar
    {
        public function get_clientes() {
            $conectar = parent::conexion();
            $sql = "SELECT * FROM clientes ";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>