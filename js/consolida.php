<?php
include('conexion.php');
header("Content-Type: application/json");
$data = array();
$comprobante = $_POST['comprobante'];
$propietario = $_POST['propietario'];
$imagen = $_POST['imagen'];
$Valor = $_POST['Valor'];
$usuario = $_POST['usuario'];
$id_registro = $_POST['id_registro'];
$banco = $_POST['banco'];
$cuenta = $_POST['cuenta'];
$metodo = $_POST['metodo'];
if (empty($metodo)  || empty($propietario)  || empty($comprobante) || empty($imagen) ||  empty($Valor) || empty($usuario) || empty($id_registro) || empty($cuenta) || empty($banco)) {
    $data['status'] = false;
    $data['result'] = "complete los datos";
    echo json_encode($data);
    return;
}
$query = $connection->prepare("SELECT * FROM CONSOLIDAR WHERE comprobante=:comprobante");
$query->bindParam("comprobante", $comprobante, PDO::PARAM_INT);
$query->execute();
if ($query->rowCount() > 0) {
    $data['status'] = false;
    $data['result'] = "NUMERO DE COMPROBANTE YA REGISTRADO";
    echo json_encode($data);
    return;
}
$query = $connection->prepare("SELECT * FROM CONSOLIDAR WHERE id_registro=:id_registro");
$query->bindParam("id_registro", $id_registro, PDO::PARAM_INT);
$query->execute();
if ($query->rowCount() > 0) {
    $data['status'] = false;
    $data['result'] = "REGISTRO YA CONSOLIDADO";
    echo json_encode($data);
    return;
}
if ($query->rowCount() == 0) {
    try {

        $query = $connection->prepare("INSERT INTO CONSOLIDAR (comprobante,imagen,Valor,fecha,usuario,id_registro,cuenta,banco,propietario,metodo) VALUES (:comprobante,:imagen,:Valor,:fecha,:usuario,:id_registro,:cuenta,:banco,:propietario,:metodo)");
        $query->bindParam("comprobante", $comprobante, PDO::PARAM_INT);
        $query->bindParam("imagen", $imagen, PDO::PARAM_STR);
        $query->bindParam("Valor", $Valor, PDO::PARAM_STR);
        $query->bindParam("fecha", date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $query->bindParam("usuario", $usuario, PDO::PARAM_INT);
        $query->bindParam("id_registro", $id_registro, PDO::PARAM_INT);
        $query->bindParam("cuenta", $cuenta, PDO::PARAM_STR);
        $query->bindParam("banco", $banco, PDO::PARAM_STR);
        $query->bindParam("propietario", $propietario, PDO::PARAM_STR);
        $query->bindParam("metodo", $metodo, PDO::PARAM_STR);
        $result = $query->execute();
        $id = $connection->lastInsertId();
        if ($result) {
            $data['status'] = true;
            $data['result'] = "NUMERO DE COMPROBANTE  REGISTRADO";
            $data['idlast'] =  $id;
            echo json_encode($data);
        } else {
            $data['status'] = false;
            $data['result'] = "Hubo un error!";
            echo json_encode($data);
        }
    } catch (Exception $e) {
        $data['status'] = false;
        $data['result'] = $e->getMessage();
        echo json_encode($data);
    }
}
