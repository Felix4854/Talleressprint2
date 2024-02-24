<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

include "db.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM alumno as a where a.Idalumno=$id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>


<form action="../includes/functions.php" method="POST" onsubmit="return confirmDesactiv()">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                     <h3 class="text-center">Editar Datos de Alumno</h3>
                    <br>
                    <div class="form-group">
                        <label for="nomAlumno" class="form-label">Nombres</label>
                        <input type="text" id="nomAlumno" name="nomAlumno" class="form-control" value="<?php echo $usuario['Non_alumno']; ?>"  required>
                    </div>
                    <div class="form-group">
                        <label for="apeAlumno" class="form-label">Apellidos</label>
                        <input type="text" id="apeAlumno" name="apeAlumno" class="form-control" value="<?php echo $usuario['Ape_alumno']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dniAlumno" class="form-label">Documento de Identidad</label>
                        <input type="text" id="dniAlumno" name="dniAlumno" class="form-control" value="<?php echo $usuario['Dni']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecnacAlumno" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="fecnacAlumno" name="fecnacAlumno" class="form-control" value="<?php echo $usuario['Fec_na']; ?>"   required>
                    </div>
                    <div class="form-group">
                        <label for="sexoAlumno" class="form-label">Sexo</label>
                        <select class="form-control" id="sexoAlumno" name="sexoAlumno" style=" width:100%; ">
                            
                            <?php if($usuario['Sexo']=='F'){ ?>
                                 <option value="F" selected>Femenino</option>
                             <option value="M">Masculino</option>   
                            <?php } else { ?>
                                 <option value="F">Femenino</option>
                             <option value="M" selected>Masculino</option>   
                            <?php } ?>
                                                   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telfAlumno" class="form-label">Telefono</label>
                        <input type="text" id="telfAlumno" name="telfAlumno" class="form-control" value="<?php echo $usuario['Tel_alum']; ?> " required>
                    </div>
                    <div class="form-group">
                        <label for="dirAlumno" class="form-label">Dirección</label>
                        <input type="text" id="dirAlumno" name="dirAlumno" class="form-control" value="<?php echo $usuario['Dir_alum']; ?> " required>
                    </div>
                                    
                    <input type="hidden" name="accion" value="editar_alumno">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                        <a href="../views/alumnos.php" class="btn btn-danger">Cancelar</a>

                    </div>
            </div>
        </div>
</div></div>
</form>



<script type="text/javascript">
    function confirmDesactiv()
{
   return confirm("Esta seguro de guardar esta cita?")
}
</script>
   
<?php include_once "footer.php"; ?>
    <?php include "../includes/form_clave.php"; ?>