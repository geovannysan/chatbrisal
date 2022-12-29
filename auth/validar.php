<?php
session_start();
include('../admin/conexion.php');
if(empty($_POST["username"])&& empty($_POST["pass"])){
  header("Location:http://localhost/chatbrisana/auth/");
  return;
}
$bd = new Conect_MySql();
$u = $_POST["username"];
$c = $_POST["pass"];
$f = $_POST["secret"];
if ($_SESSION['token'] == $f) {
    $res = $bd->login($u);


    if ($row = $bd->fetch_row($res)) {
        if ($c== $row["Password"]) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["nombre"] = $row["Nombre"];
            $_SESSION["Password"] = $row["Password"];   
            echo "<script>location.href='index/../../admin/'</script>";
        } else {
            echo '<html><head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body>
                <script>swal("Write something here:", {
                    title: "Error",
                  text: "Contraseña no válida",
                  icon: "warning",
                })
                .then((value) => {
                  window.location.href="index/../../auth/"
                });</script></body></html>';
        }

    } else {


        echo '<html><head> <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body>
                <script>swal("Write something here:", {
    title: "Error",
  text: "Usuario no válido",
  icon: "warning",
})
.then((value) => {
  window.location.href="index/../../auth/"
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
  window.location.href="index/../../"
});</script></body></html>';
}
?>