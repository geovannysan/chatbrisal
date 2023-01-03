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
<html lang="es">

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
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/fontello.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




  <script src="https://jsuites.net/v4/jsuites.js"></script>
  <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>


  <link href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
  <nav class="navbar navbar-expand-lg  " style="font-size: 1.1rem; background: #0e385e">
    <div class="container-fluid ">
      <a class="navbar-brand d-none" href="#"><img style="height: 60px;" src="img/logo/logo-meganet-blanco.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
          <li class="nav-item me-4">
            <a class="nav-link active text-white" aria-current="page" href="../">Inicio</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#"> Bienvenido: <?php echo $_SESSION['nombre'] ?> </a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="logout.php"> salir</a>
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
      <script>
        function editar(e) {
          document.getElementById("nombre").value = e.Nombre
          document.getElementById("apellido").value = e.Apellido
          document.getElementById("manzana").value = e.MZ
          document.getElementById("villa").value = e.Villas
          document.getElementById("Cedular").value = e.Celular
          document.getElementById("correo").value = e.Correo
          document.getElementById("identificador").value = e.id
          // console.log(e);
        }

        function editarpropi() {
          const form = new FormData(document.getElementById("registro"))
          const {
            Cedular,
            correo
          } = Object.fromEntries(form.entries())
          if (Object.values(Object.fromEntries(form.entries())).every(e => e)) {

            document.getElementById("registro").classList.add('was-validated')

            let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (!emailRegex.test(correo)) {
              jSuites.notification({
                error: 1,
                name: 'Error',
                message: "Formato de correo inválido ",
              })
              return
            }


            $.ajax({
              type: "POST",
              url: "editar.php",
              data: {
                ...Object.fromEntries(form.entries())
              },
              success: function(datos) {
                if (datos.status) {
                  $('#exampleModal').modal('hide')
                  jSuites.notification({
                    error: 0,
                    name: 'Actualización exitosa ',
                    message: datos.result,
                  })
                  document.getElementById("registro").reset();
                  document.getElementById("registro").classList.remove('was-validated')
                } else {
                  jSuites.notification({
                    error: 1,
                    name: 'Hubo un error',
                    message: datos.result,
                  })
                }
              },
              error: function(error) {
                jSuites.notification({
                  error: 1,
                  name: 'Hubo un error',
                  message: "Verifique su conexión o intente mas tarde",
                })
              }
            })
          } else {
            jSuites.notification({
              error: 1,
              name: 'Error',
              message: "Datos incompletos",
            })
            document.getElementById("registro").classList.add('was-validated')
          }

        }
      </script>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button class="close" data-dismiss="modal" aria-label="Close">
                <span>X</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="registro" class="  g-3 needs-validation" novalidate>
                <div class="row">
                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    <div class="invalid-feedback">
                      Ingrese su Nombre
                    </div>
                  </div>
                  <input style="display:none" class="d-none" type="password" name="identificador" id="identificador">
                  <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                    <div class="invalid-feedback">
                      Ingrese su Apellido
                    </div>
                  </div>

                </div>

                <div class="row ">
                  <div class="col-6">
                    <label for="validationCustom03" class="form-label">MZ</label>
                    <input type="number" class="form-control" id="manzana" name="manzana" required>
                    <div class="invalid-feedback">
                      Ingrese el número de MZ
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="validationCustom03" class="form-label">Villa</label>
                    <input type="number" class="form-control" id="villa" name="villa" required>
                    <div class="invalid-feedback">
                      Ingrese el numero de villa
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="Cedular" name="Cedular" minlength="10" required>
                    <div class="invalid-feedback">
                      Ingrese un numero Celular
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Correo</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" class="form-control" id="correo" name="correo" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Ingrese un Correo Electrónico
                      </div>
                    </div>
                  </div>
                </div>



              </form>





            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-primary" onclick="editarpropi()">Editar</button>
            </div>
          </div>
        </div>
      </div>
      <table class="table  dt-responsive nowrap" id="example" style="width:100%">

        <thead>
          <tr>

            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">MZ</th>
            <th scope="col">Villas</th>
            <th scope="col">Cellular</th>
            <th scope="col">Correo</th>
            <th> Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($value = $bd->fetch_row($query4)) { ?>
            <tr>
              <td><?php echo  $value['Nombre'] ?> </td>
              <td><?php echo  $value['Apellido'] ?> </td>
              <td><?php echo  $value['MZ'] ?> </td>
              <td><?php echo  $value['Villas'] ?> </td>
              <td><?php echo  $value['Celular'] ?> </td>
              <td><?php echo  $value['Correo'] ?> </td>

              <td> <button class=" btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick='editar(<?php echo json_encode($value) ?>)'> <i class="fa fa-edit"></i> </button> </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>

    </div>
  </div>
  <div class=" w-100 h-25 fixed-bottom ">
  </div>
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [{
          extend: 'excelHtml5',
          text: '<i class="fa fa-file-excel-o"> Excel</i>',
          title: "Informe ",
          className: 'btn btn-success',
          titleAttr: 'Excel',
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5]
          }
        }, ]
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>