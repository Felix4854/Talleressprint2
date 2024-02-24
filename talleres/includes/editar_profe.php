<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

include "db.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM profesores as p where p.Idprofe=$id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>


<form action="../includes/functions.php" method="POST" onsubmit="return confirmDesactiv()">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                     <h3 class="text-center">Editar Datos de Profesor</h3>
                    <br>
                    <div class="form-group">
                        <label for="nomProfe" class="form-label">Nombres</label>
                        <input type="text" id="nomProfe" name="nomProfe" class="form-control" value="<?php echo $usuario['Nom_profe']  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="apeProfe" class="form-label">Apellidos</label>
                        <input type="text" id="apeProfe" name="apeProfe" class="form-control" value="<?php echo $usuario['Ape_profe']  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dniProfe" class="form-label">Documento de Identidad</label>
                        <input type="text" id="dniProfe" name="dniProfe" class="form-control" value="<?php echo $usuario['Dni']  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecnacProfe" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="fecnacProfe" name="fecnacProfe" class="form-control"  value="<?php echo $usuario['Fec_nac']  ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sexoProfe" class="form-label">Sexo</label>
                        <select class="form-control" id="sexoProfe" name="sexoProfe" style=" width:100%; ">
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
                        <label for="telfProfe" class="form-label">Telefono</label>
                        <input type="text" id="telfProfe" name="telfProfe" class="form-control" value="<?php echo $usuario['Tel_profe'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dirProfe" class="form-label">Dirección</label>
                        <input type="text" id="dirProfe" name="dirProfe" class="form-control" value="<?php echo $usuario['Dir_profe'] ?>" required>
                    </div>
                                    
                    <input type="hidden" name="accion" value="editar_profesor">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                        <a href="../views/Profesores.php" class="btn btn-danger">Cancelar</a>

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