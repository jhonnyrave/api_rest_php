<?php
    header('Content-Type: application/x-www-form-urlencoded');
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    
    $usuario = new Usuario();
    $headers = getallheaders();
    $user_header = $headers["X_USUARIO"];
    $pasword_header = $headers["X_PASSWORD"];

    $data = json_decode(file_get_contents('php://input'), true);
    $user = $data['usuario'];
    $password =  $data['clave'];

    if ($user_header != $user) {
        $res['success']= false;
        $res['datos'] = "Valor user diferente a header X_USUARIO";
        echo json_encode($res);
        return;
    }

    if ($pasword_header != $password ) {
        $res['success']= false;
        $res['datos'] = "Valor password diferente a header X_PASSWORD";
        echo json_encode($res);
        return;
    }
   
    $password = base64_decode($password);
    $datos=$usuario->get_consulta_usuario($user,$password);

    if (!empty($datos)) {
        $id = $datos['id_usuario'];
        $response=$usuario->registro_ingreso($id);
        $datos=$usuario->get_consulta_usuario($user,$password);
        $res['success']= true;
        $res['datos'] = 'Bienvenido';
        $res['fecha_ingreso'] = $datos['fecha_ultimo_ingreso'];
    } else {
        $res['success']= false;
        $res['datos'] = "Usuario o contraseña incorrectos";
    }
    echo json_encode($res);
?>