<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['nombre'];

if ($actualsesion == null || $actualsesion == '') {
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
</head>
<?php include "../includes/header.php"; ?>
<?php
//if( $actualsesion == "Administrador"){
?>


<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h2 class="subtitle">Bienvenido  <?php echo $_SESSION['nombre']; ?>!</h2>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
                <br>

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#user">
                    <span class="glyphicon glyphicon-plus"></span> Agregar usuario <i class="fa fa-user-plus"></i> </a></button>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Fecha</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <?php

                        include "../includes/db.php";
                        $result = mysqli_query($conexion, "SELECT  user.id, user.nombre, user.correo, user.password, user.fecha,
roles.rol FROM user 
LEFT JOIN roles ON user.rol= roles.id ");
                        while ($fila = mysqli_fetch_assoc($result)) :

                        ?>
                            <tr>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['correo']; ?></td>
                                <td><?php echo $fila['password']; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($fila['fecha'])); ?></td>
                                <td><?php echo $fila['rol']; ?></td>

                                <td>
                                    <a class="btn btn-warning" href="../includes/editar_user.php?id=<?php echo $fila['id'] ?> ">
                                        <i class="fa fa-edit "></i> </a>
                                    <a href="../includes/eliminar_user.php?id=<?php echo $fila['id'] ?> " class="btn btn-danger btn-del">
                                        <i class="fa fa-trash "></i></a></button>
                                </td>
                            </tr>


                        <?php endwhile; ?>
                        <?php
                        //}

                        ?>
                        </tbody>
                    </table>

                    <script src="../package/dist/sweetalert2.all.js"></script>
                    <script src="../package/dist/sweetalert2.all.min.js"></script>
                    <script src="../package/jquery-3.6.0.min.js"></script>
                     <script>
                        $('a.btn-del').on('click', function(e) {
                            return confirm("Esta seguro de eliminar el usuario?")

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

    <?php include "../includes/_sesion/registros.php"; ?>
    <?php include "../includes/form_clave.php"; ?>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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