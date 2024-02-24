<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if ($varsesion == null || $varsesion = '') {

    header("Location: ../includes/_sesion/login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />  
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> 
<style type="text/css">
    .fl{
        float: left;
    }
</style>
</head>
<?php include "../includes/header.php"; ?>
<body id="page-top">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">           
            <div class="card-header py-3">

            <!--             
                 <form method="post" action="../includes/generarpdfReportecita.php">
                   <div class="fl col-xs-3" style="margin-right: 10px; font-weight: bold;">Ingrese Fechas <input type="date" name="f1" class="form-control"> </div>
                   <div class="fl col-xs-3" style="margin-right: 10px; font-weight: bold;"><span style="color:transparent;">.</span><input type="date" name="f2" class="form-control"></div>
                   <div class="fl col-xs-3" style="margin-right: 10px;"><span style="color:transparent;">.</span><input type="submit" name="mandar" class="form-control btn btn-primary" value="Generar PDF"></div>

                  </form>
              -->
                  <div class="fl col-xs-3" style="margin-right: 10px;"><span style="color:transparent;">.</span><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registronuevo">
                        <span class="glyphicon glyphicon-plus"></span> Nuevo Registro <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>  </div>
              </div>
       
            

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>dni</th>
                                <th>Taller</th>
                                <th>Profesor</th>
                                <th>Horario</th>
                                <th>Acciones..</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        include "../includes/db.php";
                        $result = mysqli_query($conexion, "SELECT * FROM alumno as a, detalles as d, taller as t, profesores as p where a.Iddetalle=d.Iddetalle and d.Idtaller=t.Idtaller and d.Idprofe=p.Idprofe");
                        while ($fila = mysqli_fetch_assoc($result)) :

                        ?>
                            <tr>
                                <td><?php echo $fila['Non_alumno']." ".$fila['Ape_alumno']; ?></td>
                                <td><?php echo $fila['Dni']; ?></td>
                                <td><?php echo $fila['Non_taller']; ?></td>
                                <td><?php echo $fila['Nom_profe']." ".$fila['Ape_profe']; ?></td>
                                <td><?php echo $fila['Horario']; ?></td>
                               

                                <td>
                                    <a class="btn btn-warning" href="../includes/editar_registro.php?id=<?php echo $fila['Idalumno'] ?> " title="Ver Registro">
                                        <i class="fa fa-edit "></i> </a>
                                    
                                    <a class="btn btn-success" href="../includes/editar_alumno.php?id=<?php echo $fila['Idalumno'] ?> " title="Editar Profesor">
                                        <i class="fa fa-user "></i> </a>
                                </td> 
                            </tr>

                        <?php endwhile; ?>

                        </tbody>
                    </table>

 <script src="../package/dist/sweetalert2.all.js"></script>
                    <script src="../package/dist/sweetalert2.all.min.js"></script>
                    <script src="../package/jquery-3.6.0.min.js"></script>
                    <script>
                        $('a.btn-del').on('click', function(e) {
                            return confirm("Esta seguro de eliminar este Registro?")

                        })
                    </script>
                   
                  
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include "../includes/footer.php"; ?>

    <?php include "../includes/form_registro.php"; ?>
    <?php include "../includes/form_clave.php"; ?>


    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
  <!-- select -->
   
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    import DataTable from 'datatables.net-dt';
import 'datatables.net-responsive-dt';
 
let table = new DataTable('#dataTable', {
    responsive: true
});
</script>  

</body>

</html>