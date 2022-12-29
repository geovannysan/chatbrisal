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
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximun-scalable=1.0, maximun-scalable=1.0">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Js WoW
 Js WoW-->
<script src="js/wow.min.js"></script>
<script> new WOW().init();</script>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/slider3.jpg);">
                    <span class="login100-form-title-1">
                        Bienvenidos
                    </span>
                </div>

                <form id="login1" action="start/dist/funt3/validar.php" method="post"
                    class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email Requerido">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="username" placeholder="Ingrese Email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Contraseña Requerida">
                        <span class="label-input100">Contraseña</span>
                        <input class="input100" type="password" name="pass" placeholder="Ingrese Contraseña">
                        <span class="focus-input100"></span>
                    </div>
                    <div style="display:none">
                        <span class="label-input100"></span>
                        <input style="display:none" class="input100" type="" name="secret"
                            value="<?php echo $_SESSION['token']; ?>">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">

                    </div>
                    <div class="row">

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                Entrar
                            </button>

                        </div>
                           </div>
                </form>
            </div>
        </div>
    </div>
    

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/bootstrap.bundle.js"></script>
<script src="js/wow.min.js"></script>


</body>

</html>