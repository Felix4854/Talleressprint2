<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

?>

<div class="modal fade" id="clave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title" id="exampleModalLabel">Cambiar Contraseña 
                </h3>
                <button type="button" class="btn btn-black" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../includes/functions.php" method="POST">
                    

                    <label for="observacion">Ingrese Nueva Clave:</label>
                    <input class="form-control" name="clave1" required type="password" id="clave1" placeholder="Escribe una nueva clave">


                    <label for="observacion">Ingrese Nueva Clave:</label>
                    <input class="form-control" name="clave2" required type="password" id="clave2" placeholder="Repita su  nueva clave">


                    <input type="hidden" name="accion" value="cambiar_clave">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                       
                        <?php 
                         if ($_SESSION['rol']==3) { ?>

                             <a href="../views/index2.php" class="btn btn-danger">Cancelar</a>

            <?php  } else { ?>

                             <a href="../views/index.php" class="btn btn-danger">Cancelar</a>
                
             <?php } ?>

                         
                        

                    </div>
            </div>
        </div>

        </form>
    </div>
</div>