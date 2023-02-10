<?php
include('conexion.php');
header("Content-Type: application/json");
$data = array();
$comprobante = $_GET['id'];
if(empty($comprobante)){
    $query = $connection->prepare("SELECT * FROM CONSOLIDAR ");   
    $query->execute();
  // $row = mysqli_fetch_row($query);
  $result = $query->fetchAll(\PDO::FETCH_ASSOC);
    if ($query->rowCount() > 0) {
        $data['status'] = true;
        $data['result'] = $result;
        echo json_encode($data);
        return;
    }else{
        $data['status'] = false;
        $data['result'] =$data;
        echo json_encode($data);
    }  
    return;
}
$query = $connection->prepare("SELECT * FROM CONSOLIDAR WHERE id_registro=:id_registro");
$query->bindParam("id_registro", $comprobante, PDO::PARAM_INT);
$query->execute();
$result = $query->fetchAll(\PDO::FETCH_ASSOC);
if ($query->rowCount() > 0) {
    $data['status'] = true;
    $data['result'] = $result;
    echo json_encode($data);
    return;
}else{
    $data['status']=false;
    $data['result']="no registrado";
    echo json_encode($data);
}
