<?php
include('conexion.php');

header("Content-Type: application/json");
$data = array();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $manz = $_POST['manz'];
    $vill = $_POST['vill'];
    $Cedular = $_POST['Cedular'];
    $Correo = $_POST['Correo'];
    if(empty( $nombre) && empty($apellido)&& empty($manz) &&  empty($Cedular) && empty($Correo) && empty($vill)){
        $data['status'] = false;
        $data['result'] = "complete los datos";
     
        echo json_encode($data);
    }
    else{
        $query = $connection->prepare("SELECT * FROM usurarios WHERE Correo=:Correo");
        $query->bindParam("Correo", $Correo, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            $data['status'] = false;
            $data['result'] = "El correo ya esta registrado";
            echo json_encode($data);
        }else{
    $query = $connection->prepare("INSERT INTO usurarios(Nombre,Apellido,MZ,Villas,Celular,Correo) VALUES (:nombre,:apellido,:manz,:vill,:Cedular,:Correo)");
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam("manz", $manz, PDO::PARAM_INT );
        $query->bindParam("vill", $vill, PDO::PARAM_INT );
        $query->bindParam("Cedular", $Cedular, PDO::PARAM_INT );
        $query->bindParam("Correo", $Correo, PDO::PARAM_STR );
        $result = $query->execute();
        if ($result) {
            $data['status'] = true;
            $data['result'] = "Usuario registrado";
         
            echo json_encode($data);
        } else {
            $data['status'] = false;
            $data['result'] =  "No se completo el registro";
         
            echo json_encode($data);
        }}
}

?>