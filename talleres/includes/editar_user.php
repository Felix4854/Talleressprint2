<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){
     header("Location: _sesion/login.php");
	
	}

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$id = $_GET['id'];
include "db.php";
$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>


    <link rel="stylesheet" href="../../css/fontawesome-all.min.css">
	<link rel="stylesheet" href="../../css/2.css">
	<link rel="stylesheet" href="../../css/estilo.css">
</head>

<body>



    <form  action="functions.php" id="form" method="POST" onsubmit="return confirmDesactiv()">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                     
                            <h3 class="text-center">Editar el registro de <?php echo $usuario ['nombre']; ?> </h3>
                            <br>    
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" value="<?php echo $usuario ['nombre']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="No se puede repetir con alguno de la lista..." value="<?php echo $usuario ['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario ['password']; ?>">
                            </div>
                      
                            <div class="form-group">
                                  <label for="rol_id" class="form-label">Rol de usuario:</label>
                                  <select name="rol" id="rol" class="form-control" required >
                                 

                                   <?php

                            include("db.php");
                            $sql = "SELECT * FROM roles ";
                            $resultado3 = mysqli_query($conexion, $sql);
                           $consulta2 = mysqli_fetch_assoc($resultado3);


                            do {

                                if($usuario['rol']==$consulta2['id']){ 
                                        echo '<option value="' . $consulta2['id'] . '" selected>' . $consulta2['rol'] . '</option>';
                                } else {
                                    echo '<option value="' . $consulta2['id'] . '">' . $consulta2['rol'] . '</option>';
                                }


                            }while ($consulta2 = mysqli_fetch_assoc($resultado3));

                            ?>




                                  <input type="hidden" name="accion" value="editar_user">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                               </select>
                            </div>
                           
                               <br>
                                <div class="mb-3">
                                    
                                <button type="submit" id="form" name="form" class="btn btn-success" >Editar</button>
                               <a href="../views/usuarios.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
     <script type="text/javascript">
    function confirmDesactiv()
{
   return confirm("Esta seguro de guardar este usuario?")
}
</script>
    <?php  include_once "footer.php"; ?>
        <?php include "../includes/form_clave.php"; ?>

</body>
</html>