<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

include "db.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM alumno as a, detalles as d  where a.Iddetalle=d.Iddetalle and a.Idalumno=$id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>

<form action="../includes/functions.php" method="POST" onsubmit="return confirmDesactiv()">
                 <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                     <h3 class="text-center">Editar Datos del Resgistro</h3>
                    <br>  

                    <div class="form-group">
                        <label for="nombrealumno" class="form-label">Nombre Alumno</label>
                        <input type="text" id="nombrealumno" name="nombrealumno" class="form-control" value="<?php echo $usuario['Non_alumno']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="apellidoalumno" class="form-label">Apellido Alumno</label>
                        <input type="text" id="apellidoalumno" name="apellidoalumno" class="form-control" value="<?php echo $usuario['Ape_alumno']; ?>"  readonly>
                    </div>
                     <div class="form-group">
                        <label for="dniAlumno" class="form-label">Documento de Identidad</label>
                        <input type="text" id="dniAlumno" name="dniAlumno" class="form-control" value="<?php echo $usuario['Dni']; ?>"  readonly>
                    </div>                 
                    <div class="form-group ">
                        <label>Taller</label><br>
                        <select class="form-control" id="idtaller" name="idtaller" style=" width:100%; ">
                            
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM taller order by Non_taller asc";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                             ?>   

                             <?php if($usuario['Idtaller']==$consulta['Idtaller']){ ?>
                                <option value="<?php echo $consulta['Idtaller']; ?>" selected><?php echo $consulta['Non_taller']; ?></option>
                            <?php } else { ?>
                                 <option value="<?php echo $consulta['Idtaller']; ?>"><?php echo $consulta['Non_taller']; ?></option>
                            <?php } ?>
                                

                           <?php 
                            }

                            ?>

                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Profesor</label>
                        <select class="form-control" id="idprofesor" name="idprofesor">
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM profesores order by Nom_profe asc ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {  
                            ?>
                             <?php if($usuario['Idprofe']==$consulta['Idprofe']){ ?>
                                <option value="<?php echo $consulta['Idprofe']; ?>" selected><?php echo $consulta['Nom_profe']." ".$consulta['Ape_profe']; ?></option>
                            <?php } else { ?>
                                 <option value="<?php echo $consulta['Idprofe']; ?>"><?php echo $consulta['Nom_profe']." ".$consulta['Ape_profe']; ?></option>
                            <?php } ?>
                        <?php } ?>

                        </select>
                    </div>                   

                    <input type="hidden" name="accion" value="editar_registro">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                        <a href="../views/registrar.php" class="btn btn-danger">Cancelar</a>

                    </div>
            </div>
        </div></div></div>

        </form>



<script type="text/javascript">
    function confirmDesactiv()
{
   return confirm("Esta seguro de guardar esta cita?")
}
</script>
   
<?php include_once "footer.php"; ?>
    <?php include "../includes/form_clave.php"; ?>