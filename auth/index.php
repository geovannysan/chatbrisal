<?php
session_start();
$hora = date('H:i');
$session_id = session_id();
$tokens = hash('sha256', $hora . $session_id);

$_SESSION['token'] = $tokens;
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
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximun-scalable=1.0, maximun-scalable=1.0">
    <title>Registro</title>
    <link rel="icon" href="" type="image/x-icon" />

    <!--CSS-->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Js WoW
 Js WoW-->
    <script src="js/wow.min.js"></script>
    <script> new WOW().init();</script>
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
            <a class="nav-link text-white" href="#">  </a>
          </li>
          <li class="nav-item me-4">
           
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
    <div class="container d-flex justify-content-center  align-items-center align-items-center h-100   py-3">
        <div class="col-12 col-md-6 border p-3 shadow rounded-3 text-center">
            <div class="container">
                <div class="title py-5">
                    <span class="h5">
                        Bienvenidos
                    </span>
                </div>
                <div class="">
                    <form id="login1" action="validar.php" method="post" class=" row g-3 validate-form needs-validation" novalidate>
                        <div class="row   ">

                            <div class="col-12 py-1" data-validate="Email Requerido">
                                <span class="label-control"></span>
                                <input class="form-control text-center" type="text" name="username" required
                                    placeholder="Ingrese Usuario">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="col-12 py-1" data-validate="Contraseña Requerida">
                                <span class="label-input100"></span>
                                <input class=" form-control text-center" type="password" name="pass" required
                                    placeholder="Ingrese Contraseña">
                                <span class="focus-input100"></span>
                            </div>
                            <div style="display:none">
                                <span class="label-input100"></span>
                                <input style="display:none" class="input100" type="" name="secret" 
                                    value="<?php echo $_SESSION['token']; ?>">
                                <span class="focus-input100"></span>
                            </div>


                        </div>
                        <div class="row py-2">

                            <div class="container-login100-form-btn">
                                <button type="submit" class=" col-6 btn  btn-outline-primary">
                                    Entrar
                                </button>

                            </div>
                        </div>
                    </form>
                    <div>

                    </div>
                </div>
            </div>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script src="../js/bootstrap.bundle.js"></script>
            <script src="../js/wow.min.js"></script>
            <script>
                (() => {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
                })()
            </script>


</body>

</html>