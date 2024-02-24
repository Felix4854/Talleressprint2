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
                <h3 class="modal-title" id="exampleModalLabel">Registro Profesor</h3>
                <button type="button" class="btn btn-black" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../includes/functions.php" method="POST" onsubmit="return confirmDesactiv()">
                    <div class="form-group">
                        <label for="nomProfe" class="form-label">Nombres</label>
                        <input type="text" id="nomProfe" name="nomProfe" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apeProfe" class="form-label">Apellidos</label>
                        <input type="text" id="apeProfe" name="apeProfe" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dniProfe" class="form-label">Documento de Identidad</label>
                        <input type="text" id="dniProfe" name="dniProfe" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecnacProfe" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" id="fecnacProfe" name="fecnacProfe" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label for="sexoProfe" class="form-label">Sexo</label>
                        <select class="form-control" id="sexoProfe" name="sexoProfe" style=" width:100%; ">
                            <option value="F">Femenino</option>
                             <option value="M">Masculino</option>                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telfProfe" class="form-label">Telefono</label>
                        <input type="text" id="telfProfe" name="telfProfe" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dirProfe" class="form-label">Dirección</label>
                        <input type="text" id="dirProfe" name="dirProfe" class="form-control" required>
                    </div>
                                    
                    <input type="hidden" name="accion" value="insert_profesor">
                    <br>

                    <div class="mb-3">

                        <input type="submit" value="Guardar" id="register" class="btn btn-success" name="registrar">
                        <a href="Profesores.php" class="btn btn-danger">Cancelar</a>

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
   