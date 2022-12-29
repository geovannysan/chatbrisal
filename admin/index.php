<?php
session_start();
if (@!isset($_SESSION['u_nombre'])) {
    header('location: index.html/../');
}

include("conexion.php");
header('Content-Type: text/html; charset=utf-8');
$datosx = json_encode($valorx);
$datosy = json_encode($valory);

$que = $bd->execute("SET lc_time_names = 'ES_EC'");
$query4 = $bd->execute("select * from tablas ");
        
?>
/*
while($value = $bd->fetch_row($query4)){?>
                                            <tr>
                                            <td><?php echo  $value['co_nombre'] ?> <?php echo  $value['co_apellido'] ?></td>
    */