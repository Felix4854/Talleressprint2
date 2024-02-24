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
                           
                   <div class="fl col-xs-3" style="margin-right: 10px;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registronuevo">
                        <span class="glyphicon glyphicon-plus"></span> Nuevo Taller <i class="fa fa-plus-circle" aria-hidden="true"></i> </a></button>
                          </div>
              </div>
       
            

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                        <thead>
                            <tr>
                                <th>Taller</th>
                                <th>Categoria</th>
                                
                                <th>Acciones..</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        include "../includes/db.php";
                        $result = mysqli_query($conexion, "SELECT * FROM taller");
                        while ($fila = mysqli_fetch_assoc($result)) :

                        ?>
                            <tr>
                                <td><?php echo $fila['Non_taller']; ?></td>
                                <td><?php echo $fila['Cat_taller']; ?></td>                               
                                <td>
                                    <a class="btn btn-warning" href="../includes/editar_taller.php?id=<?php echo $fila['Idtaller'] ?> " title="Editar Taller">
                                        <i class="fa fa-edit "></i> </a>                                   
                                    
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

    <?php include "../includes/form_taller.php"; ?>
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