<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Cliente.php");

$cliente = new Cliente();

if (!empty($_GET["operacion"])) {
    switch($_GET["operacion"]){
        case "listarClientes":
            $datos=$cliente->get_clientes();
            $res['success']= true;
            $res['datos'] = $datos;
        break;
        default:
            $res['success']= false;
            $res['datos'] = "Operacion no existe";
    }
} else {
    $res['success']= false;
	$res['datos'] = 'Error en parametros --operacion';
}
echo json_encode($res);