<!DOCTYPE html>
<html lang="en" class="coming-soon">
<head>
    <meta charset="utf-8">
    <title>Gestion de Talleres</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="../assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link type="text/css" href="../assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="../talleres/css/style.css" rel="stylesheet">
    <link type="text/css" href="../assets/css/styles.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="../assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    
    </head>

    <body>
        <!--  <img class="wave"src="../assets/img/wave.png" alt="">  -->
    <div class="contenedor">
    <div class="img">
    <!--<img src="../../img/medicos.png" alt="">-->
    </div>
    <div class="contenido-login">


    <form action="login.php" method="POST">

    <!--<img src="../../img/logo.png" alt="">-->
    <h2>Talleres</h2>
    <h1 class="l">INICIAR SESION</h1>
   
    <div class="input-div nit">
    <div class="i">
    <i class="fas fa-user"></i>
    </div>
    <div class="div">

     <input type="text" placeholder="Usuario" data-parsley-minlength="6" placeholder="At least 6 characters" required name="usuario">
    </div>
    </div>
    <div class="input-div pass">
    <div class="i">
    <i class="fas fa-lock"></i>
    </div>
    <div class="div">

    <input type="password" placeholder="Contraseña" name="pass">

    <input type="hidden" name="accion" value="acceso_user">
    </div>
    </div>

   
   
    <button class="btn"  type="submit"> Iniciar sesion </button> 

    </form>
    

    </div>
    </div>

    <!-- Js personalizado -->
    
	
</body>
        

    </body>
</html>