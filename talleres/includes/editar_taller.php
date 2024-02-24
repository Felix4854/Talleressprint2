<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

include "db.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM taller as t where t.Idtaller=$id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include_once "header.php"; ?>


<form action="../includes/functions.php" method="POST" onsubmit="return confirmDesactiv()">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                     <h3 class="text-center">Editar Datos del Taller</h3>
                    <br>
                    <div class="form-group">
                        <label for="nombrealumno" class="form-label">Nombre Taller</label>
                        <input type="text" id="nombreTaller" name="nombreTaller" class="form-control" value="<?php echo $usuario['Non_taller']; ?>" required>
                    </div>                   

                    <div class="form-group ">
                        <label>Categoria</label><br>
                        <select class="form-control" id="categoriaTaller" name="categoriaTaller" style=" width:100%; ">
                            <?php if($usuario['Cat_taller']=="ARTE"){ ?>
                            <option value="ARTE" selected>Arte</option>
                            <option value="BAILE">Baile</option>
                            <option value="DEPORTES">Deportes</option>
                        <?php } ?>
                        <?php if($usuario['Cat_taller']=="BAILE"){ ?>
                            <option value="ARTE" >Arte</option>
                            <option value="BAILE" selected>Baile</option>
                            <option value="DEPORTES">Deportes</option>
                        <?php } ?>
                        <?php if($usuario['Cat_taller']=="DEPORTE"){ ?>
                            <option value="ARTE" >Arte</option>
                            <option value="BAILE">Baile</option>
                            <option value="DEPORTES" selected>Deportes</option>
                        <?php } ?>
                        </select>
                    </div>                       
                                    
                    <input type="hidden" name="accion" value="editar_taller">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                        <a href="../views/talleres.php" class="btn btn-danger">Cancelar</a>

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