<?php
    
    class Usuario extends Conectar
    {
        public function get_consulta_usuario($usuario,$clave){
            $conectar = parent::conexion();
            $sql ="SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetch();
        }
        
        public function registro_ingreso($id){
            $conectar = parent::conexion();
            $sql = "UPDATE usuarios SET fecha_ultimo_ingreso = NOW()  WHERE id_usuario = '$id'";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>