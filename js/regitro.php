<?php
include('conexion.php');

header("Content-Type: application/json");
$data = array();

    $username = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $manz = $_POST['manz'];
    $vill = $_POST['vill'];
    $Cedular = $_POST['Cedular'];
    $Correo = $_POST['Correo'];
    $query = $connection->prepare("INSERT INTO usurarios(Nombre,Apellido,MZ,Villas,Celular,Correo) VALUES (:username,:apellido,:manz,:vill,:Cedular,:Correo)");
        $query->bindParam("nombre", $username, PDO::PARAM_STR);
        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam("manz", $manz, PDO::PARAM_STR);
        $query->bindParam("vill", $vill, PDO::PARAM_STR);
        $query->bindParam("Cedular", $Cedular, PDO::PARAM_STR);
        $query->bindParam("Correo", $Correo, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            $data['status'] = true;
            $data['result'] = $result;
         
            echo json_encode($data);
        } else {
            $data['status'] = true;
            $data['result'] = $result;
         
            echo json_encode($data);
        }


?>