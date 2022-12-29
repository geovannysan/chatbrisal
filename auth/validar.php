<?php
session_start();
include('../admin/conexion.php');

$bd = new Conect_MySql();
$u = $_POST["username"];
$c = $_POST["pass"];
$f = $_POST["secret"];
if ($_SESSION['token'] == $f) {
    $res = $bd->login($u);


    if ($row = $bd->fetch_row($res)) {
        if (password_verify($c, $row["u_pass"])) {
            $_SESSION["p_id"] = $row["p_id"];
            $_SESSION["u_id"] = $row["u_id"];
            $_SESSION["u_nombre"] = $row["u_nombre"];

            $_SESSION["u_email"] = $row["u_email"];


            echo "<script>location.href='startbootstrap/index/../../..'</script>";
        } else {
            echo '<html><head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body>
                <script>swal("Write something here:", {
    title: "Error",
  text: "Contraseña no válida",
  icon: "warning",
})
.then((value) => {
  window.location.href="index/../../../../"
});</script></body></html>';
        }

    } else {


        echo '<html><head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body>
                <script>swal("Write something here:", {
    title: "Error",
  text: "Correo no válido",
  icon: "warning",
})
.then((value) => {
  window.location.href="index/../../../../"
});</script></body></html>';



    }
} else {
    echo '<html><head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body>
                <script>swal("Write something here:", {
    title: "Error",
  text: "Acceso no válido",
  icon: "warning",
})
.then((value) => {
  window.location.href="index/../../../../"
});</script></body></html>';
}
?>