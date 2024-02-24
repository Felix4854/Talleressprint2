<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {
    header("Location: _sesion/login.php");
}

?>
       

<div class="modal fade" id="registronuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Registro</h3>
                <button type="button" class="btn btn-black" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../includes/functions.php" method="POST" onsubmit="return confirmDesactiv()">
                    <div class="form-group">
                        <label for="nombrealumno" class="form-label">Nombre Taller</label>
                        <input type="text" id="nombreTaller" name="nombreTaller" class="form-control" required>
                    </div>                   

                    <div class="form-group ">
                        <label>Categoria</label><br>
                        <select class="form-control" id="categoriaTaller" name="categoriaTaller" style=" width:100%; ">
                            <option value="0">--Selecciona una opcion--</option>                         
                            <option value="ARTE">Arte</option>
                            <option value="BAILE">Baile</option>
                            <option value="DEPORTES">Deportes</option>
                        </select>
                    </div>                               

                    <input type="hidden" name="accion" value="insert_taller">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                        <a href="registrar.php" class="btn btn-danger">Cancelar</a>

                    </div>
            </div>
        </div>

        </form>
    </div>
</div> 
<script type="text/javascript">
    function confirmDesactiv()
{
   return confirm("Esta seguro de la creación de la cita?")
}
</script>
   