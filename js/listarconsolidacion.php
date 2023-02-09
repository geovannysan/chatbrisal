<?php
include('conexion.php');
header("Content-Type: application/json");
$data = array();
$comprobante = $_GET['id_registro'];
if(empty($comprobante)){
    
}
$query = $connection->prepare("SELECT * FROM CONSOLIDAR WHERE id_registro=:id_registro");
$query->bindParam("id_registro", $id_registro, PDO::PARAM_INT);
$query->execute();
if ($query->rowCount() > 0) {
    $data['status'] = true;
    $data['result'] = $query;
    echo json_encode($data);
    return;
}

