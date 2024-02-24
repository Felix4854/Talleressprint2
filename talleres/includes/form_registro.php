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
                        <label for="nombrealumno" class="form-label">Nombre Alumno</label>
                        <input type="text" id="nombrealumno" name="nombrealumno" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidoalumno" class="form-label">Apellido Alumno</label>
                        <input type="text" id="apellidoalumno" name="apellidoalumno" class="form-control" required>
                    </div>
                     <div class="form-group">
                        <label for="dniAlumno" class="form-label">Documento de Identidad</label>
                        <input type="text" id="dniAlumno" name="dniAlumno" class="form-control" required>
                    </div>
                    

                    <div class="form-group ">
                        <label>Taller</label><br>
                        <select class="form-control" id="idtaller" name="idtaller" style=" width:100%; ">
                            <option value="0">--Selecciona una opcion--</option>
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM taller order by Non_taller asc";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
  echo '<option value="'.$consulta['Idtaller'].'">'.$consulta['Non_taller'].'</option>';
                            }

                            ?>

                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Profesor</label>
                        <select class="form-control" id="idprofesor" name="idprofesor">
                            <option value="0">--Selecciona una opcion--</option>
                            <?php

                            include("db.php");
                            //Codigo para mostrar categorias desde otra tabla
                            $sql = "SELECT * FROM profesores order by Nom_profe asc ";
                            $resultado = mysqli_query($conexion, $sql);
                            while ($consulta = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $consulta['Idprofe'] . '">'.$consulta['Nom_profe']." ".$consulta['Ape_profe']. '</option>';
                            }

                            ?>

                        </select>
                    </div>                   

                    <input type="hidden" name="accion" value="insert_registro">
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
   