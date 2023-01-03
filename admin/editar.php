<?php
session_start();
include('../js/conexion.php');

header("Content-Type: application/json");


$data = array();
$identificador= $_POST['identificador'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$manz = $_POST['manzana'];
$vill = $_POST['villa'];
$Cedular = $_POST['Cedular'];
$Correo = $_POST['correo'];
if (empty($nombre) && empty($apellido) && empty($manz) && empty($Cedular) && empty($Correo) && empty($vill)) {
    $data['status'] = false;
    $data['result'] = "complete los datos";

    echo json_encode($data);
} else {
    try {
        $query = $connection->prepare("UPDATE usurarios SET Nombre=:nombre,Apellido=:apellido,MZ=:manz,Villas=:vill,Celular=:Cedular,Correo=:Correo where id =:identificador");
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam("manz", $manz, PDO::PARAM_INT);
        $query->bindParam("vill", $vill, PDO::PARAM_INT);
        $query->bindParam("Cedular", $Cedular, PDO::PARAM_INT);
        $query->bindParam("Correo", $Correo, PDO::PARAM_STR);
        $query->bindParam("identificador", $identificador, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            $data['status'] = true;
            $data['result'] = "Usuario actualizado con exito";

            echo json_encode($data);
        } else {
            $data['status'] = false;
            $data['result'] = "No se pudo editar los datos";

            echo json_encode($data);
        }
    } catch (Exception $e) {
        $data['status'] = false;
        $data['result'] = $e->getMessage();

        echo json_encode($data);
    }
}

?>