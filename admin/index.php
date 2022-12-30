<?php
session_start();
if (@!isset($_SESSION['nombre'])) {
    header('location:http://localhost/chatbrisana/');
}

include("conexion.php");
$bd = new Conect_MySql();
header('Content-Type: text/html; charset=utf-8');
//$datosx = json_encode($valorx);
//$datosy = json_encode($valory);

//$que = $bd->execute("SET lc_time_names = 'ES_EC'");
$query4 = $bd->execute("select * from usurarios ");
        
?>
<html
    lang="es">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');
    </style>

<!--Analytics-->

<!--Fin Analytics-->

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximun-scalable=1.0, maximun-scalable=1.0">
<title>Panel</title>
<link rel="icon" href="" type="image/x-icon" />

<!--CSS-->
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/animate.css">
<link rel="stylesheet" href="../css/fontello.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://jsuites.net/v4/jsuites.js"></script>
  <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg  " style="font-size: 1.1rem; background: #0e385e">
    <div class="container-fluid ">
      <a class="navbar-brand d-none" href="#"><img style="height: 60px;" src="img/logo/logo-meganet-blanco.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
          <li class="nav-item me-4">
            <a class="nav-link active text-white" aria-current="page" href="../">Inicio</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#"> Bienvenido: <?php echo $_SESSION['nombre'] ?> </a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="logout.php" > salir</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href=""></a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-none text-white btn border border-info px-3 rounded-pill fw-bold" href="#"></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <div class=" container    pt-7 h-75">
        <div class="card py-2 mt-3">
            <div class="card-titel p-2">
                Lista de registro
            </div>
        </div>
     <div class="pt-5">
    <table class="table  dt-responsive nowrap" id="example"style="width:100%">

  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">MZ</th>
      <th scope="col">Villas</th>
      <th scope="col">Cellular</th>
      <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
 <?php 
while($value = $bd->fetch_row($query4)){?>
                                            <tr>
                                            <td><?php echo  $value['Nombre'] ?> </td>
                                            <td><?php echo  $value['Apellido'] ?> </td>
                                            <td><?php echo  $value['MZ'] ?> </td>
                                            <td><?php echo  $value['Villas'] ?> </td>
                                            <td><?php echo  $value['Celular'] ?> </td>
                                            <td><?php echo  $value['Correo'] ?> </td>
</tr>
   <?php }?>
    
  </tbody>
</table>

</div> 
</div>
<script>
    $(document).ready(function () {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        }
    });
});
    </script>
</body>
</html>

