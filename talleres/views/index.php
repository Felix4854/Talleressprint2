<?php
// Seguridad de sesiones
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

	if($varsesion== null || $varsesion= ''){

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

    <script src="../js/jquery.min.js"></script>

</head>
<?php include '../includes/header.php'; ?>


<body id="page-top">
        <!-- Begin Page Content -->
        <div class="container-fluid">
        <h1>Bienvenido <?php echo $_SESSION['nombre']; ?> a Sistema de Talleres</h1> 
        <br>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Panel Administrativo</h1>
    
</div>


<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="Alumnos.php" class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Numero de Alumnos</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT Idalumno FROM alumno";
                                $dato = mysqli_query($conexion, $SQL);
                                $fila= mysqli_num_rows($dato);
    
                                echo($fila); ?>
                                
                            </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="Profesores.php" class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Numero de Profesores</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT Idprofe FROM profesores";
                                $dato2 = mysqli_query($conexion, $SQL);
                                $fila2= mysqli_num_rows($dato2);
    
                                echo($fila2); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa-solid fa fa-male fa-2x text-gray-300" aria-hidden="true"></i>
             
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="Talleres.php" class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Numero de Talleres </a>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT Idtaller FROM taller";
                                $dato3 = mysqli_query($conexion, $SQL);
                                $fila3= mysqli_num_rows($dato3);
    
                                echo($fila3); ?>

                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-user-md fa-2x text-gray-300" aria-hidden="true"></i></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="registrar.php" class="text-xs font-weight-bold text-info text-uppercase mb-1">
                           Registrados</a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                               include "../includes/db.php"; 
    
                                $SQL="SELECT * FROM alumno as a, detalles as d, taller as t where a.Iddetalle=d.Iddetalle and d.Idtaller=t.Idtaller";
                                $dato4 = mysqli_query($conexion, $SQL);
                                $fila4= mysqli_num_rows($dato4);
    
                                echo($fila4); ?>

                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include "../includes/form_clave.php"; ?>


</div>

        <!-- End of Content Wrapper -->

    </div>

     <script src="../package/dist/sweetalert2.all.js"></script>
                    <script src="../package/dist/sweetalert2.all.min.js"></script>
                    <script src="../package/jquery-3.6.0.min.js"></script>
    
    <!-- End of Page Wrapper -->  

<?php include '../includes/footer.php'; ?>
</body>

</html>

