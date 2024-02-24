<?php 
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();    
    $id = $_GET['id'];
    #llamamos a todos los datos la tabla usuarios
    $sql = "SELECT `taller`.`id` AS `id`,`taller`.`taller` AS `taller`, `profesor`.`nombres` AS `nombres`, `aula`.`detalle` AS `ubicacion`,`disiplina`.`disiplina` AS `disiplina`, DATE_FORMAT(`taller`.`inicio`,'%d/%m/%y') AS `inicio`, DATE_FORMAT(`taller`.`fin`,'%d/%m/%y') AS `fin`, DATE_FORMAT(`taller`.`ingreso`,'%H:%i') AS `ingreso`, DATE_FORMAT(`taller`.`salida`,'%H:%i') AS `salida` FROM `taller`, `profesor`, `disiplina`, `aula` WHERE `aula`.`id`=`taller`.`aula_id` AND`disiplina`.`id`=`taller`.`disiplina_id` AND `profesor`.`id`=`taller`.`profesor_id` AND `taller`.`estado`='1' AND `taller`.`id`='$id' ;";
    $query = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($query);
    #-- lista de alumnos inscritos
    $sqlAlumnos = "SELECT `inscrito`.`id` AS `id`, `alumno`.`id` AS `ida`, `alumno`.`dni` AS `dni`, `alumno`.`nombres` AS `nombres`, `alumno`.`correo` AS `correo` FROM `alumno`, `inscrito` WHERE `alumno`.`estado` = 1 AND `inscrito`.`alumno_id` = `alumno`.`id` AND `inscrito`.`taller_id`='$id' AND `inscrito`.`estado`=1;";
    $query_alum=mysqli_query($con, $sqlAlumnos);
    //determinando la zona horaria:
    date_default_timezone_set('America/Lima');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistema de Tallerres</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenger Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=RobotoDraft:300,400,400italic,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,400italic,600,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 10]>
        <script type="text/javascript" src="../assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="../assets/js/placeholder.min.js"></script>
    <![endif]-->

    <link type="text/css" href="../assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="../assets/css/styles.css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="../assets/plugins/jstree/dist/themes/avenger/style.min.css" rel="stylesheet">    <!-- jsTree -->
    <link type="text/css" href="../assets/plugins/codeprettifier/prettify.css" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="../assets/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">              <!-- iCheck -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="../assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
        <script type="text/javascript" src="../assets/plugins/charts-flot/excanvas.min.js"></script>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    
<link type="text/css" href="../assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet">   <!-- DateRangePicker -->
<link type="text/css" href="../assets/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">                  <!-- FullCalendar -->
<link type="text/css" href="../assets/plugins/charts-chartistjs/chartist.min.css" rel="stylesheet">                 <!-- Chartist -->

    </head>

    <body class="infobar-offcanvas">
<!-- cabecera -->        
        <?php include('overall/cabecera.php') ?>
<!-- fin de cabecera -->

        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-midnightblue">
                    <?php include('overall/menu.php') ?>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <div class="page-heading">            
        <h1><i class="fa fa-book"></i> Gestión de Talleres</h1><br/>
        <h3>Taller: <strong><?php echo $row['taller']?></strong> | Profesor: <strong><?php echo $row['nombres']?></strong> | Disciplina: <strong><?php echo $row['disiplina']?></strong></h3>
        <h4>Ubicación: <strong><?php echo $row['ubicacion']?></strong> | Inicio: <strong><?php echo $row['inicio']?></strong> Cierre: <strong><?php echo $row['fin']?></strong></h4>
        <h4>Hora de ingreso: <strong><?php echo $row['ingreso']?></strong> | Hora de salida: <strong><?php echo $row['salida']?></strong>
        <div class="options">
            <div class="btn-toolbar">
                <a href="talleres.php" class="btn btn-info"><i class="fa  fa-reply"></i> REGRESAR</a>
            </div>
        </div>
    </div>
     <div class="container-fluid">

<!-- -->        
        <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-sky">
            <div class="panel-heading">
                <h2>Relación de Alumnos inscritos: </h2>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>Asistencia</th>
                            <th>Detalles</th>
                            
                        </tr>
                    </thead>
                    <tbody>
<?php 
#para enumerar los registros
$n = 0;
#creamos un siclo while para llenar la tabla

while ($rowc = mysqli_fetch_array($query_alum)):
    
?>  
                        <tr>                            
                            <td><?php echo $n = $n +1; ?></td>
                            <td><?php echo $rowc['dni'] ?></td>
                            <td><?php echo $rowc['nombres'] ?></td>
                            <td><?php echo $rowc['correo'] ?></td>                            
                            <td>
<?php // comprobar la fecha de asistencia 
//fecha actual
$fechaAC = date("y-m-d");
$itia = $rowc['ida'];
$itid = $rowc['id'];
$sql_asisFA="SELECT count(`id`)  AS `num` FROM `asistencia` WHERE `inscrito_id`='$itid' AND  `alumno_id`='$itia' AND `fecha`='$fechaAC' ;";
$query_asisFA=mysqli_query($con, $sql_asisFA);
$rowFA = mysqli_fetch_array($query_asisFA);
if($rowFA['num']!=0){
    echo '<a  class="btn btn-danger"><i class="fa fa-pencil"></i> Asistencia</a>';    
} else {
    echo '<a data-toggle="modal" href="#myModal'.$ida = $rowc['id'].'" class="btn btn-success"><i class="fa fa-pencil"></i> Asistencia</a>';
}

?>                                
                                
                                
                                
                            </td>
                            <td>
                                <a href="asistenciaTaller.php?id=<?php echo $rowc['id']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Detalles</a>
                            </td>
                          
                             <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $ida = $rowc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="modal-title">MARCAR ASISTENCIA</h2>
                                        </div>
                                        <div class="modal-body">
                                            <h2>Alumno: <strong><?php echo $rowc['nombres'] ?></strong></h2>
                                            <h2>Fecha: <strong><?php echo date("d/m/y");; ?></strong></h2>
                                            <h2>Hora de Ingreso: <strong><?php echo date("H:i:s")  ?></strong></h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            <a href="asistenciag10.php?idi=<?php echo $rowc['id'] ?>&ida=<?php echo $rowc['ida'] ?>&id=<?php echo $id ?>" class="btn btn-primary">Aceptar</a>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            
                        </tr>
<?php endwhile; ?>                        
                    </tbody>
                </table>

               
            </div>
          </div>
        </div>

    </div>

</div>
    </div>


                        </div> <!-- #page-content -->
                    </div>
                    <?php include('overall/pie.php') ?>
                </div>
            </div>
        </div>


      


    
    

<script type="text/javascript" src="../assets/js/jquery-1.10.2.min.js"></script>                            <!-- Load jQuery -->
<script type="text/javascript" src="../assets/js/jqueryui-1.9.2.min.js"></script>                           <!-- Load jQueryUI -->

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>                                <!-- Load Bootstrap -->


<script type="text/javascript" src="../assets/plugins/easypiechart/jquery.easypiechart.js"></script>        <!-- EasyPieChart-->
<script type="text/javascript" src="../assets/plugins/sparklines/jquery.sparklines.min.js"></script>        <!-- Sparkline -->
<script type="text/javascript" src="../assets/plugins/jstree/dist/jstree.min.js"></script>                  <!-- jsTree -->

<script type="text/javascript" src="../assets/plugins/codeprettifier/prettify.js"></script>                 <!-- Code Prettifier  -->
<script type="text/javascript" src="../assets/plugins/bootstrap-switch/bootstrap-switch.js"></script>       <!-- Swith/Toggle Button -->

<script type="text/javascript" src="../assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="../assets/plugins/iCheck/icheck.min.js"></script>                       <!-- iCheck -->

<script type="text/javascript" src="../assets/js/enquire.min.js"></script>                                  <!-- Enquire for Responsiveness -->

<script type="text/javascript" src="../assets/plugins/bootbox/bootbox.js"></script>                         <!-- Bootbox -->

<script type="text/javascript" src="../assets/plugins/simpleWeather/jquery.simpleWeather.min.js"></script> <!-- Weather plugin-->

<script type="text/javascript" src="../assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script type="text/javascript" src="../assets/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script>     <!-- Mousewheel support needed for jScrollPane -->

<script type="text/javascript" src="../assets/js/application.js"></script>
<script type="text/javascript" src="../assets/demo/demo.js"></script>
<script type="text/javascript" src="../assets/demo/demo-switcher.js"></script>

<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
<script type="text/javascript" src="../assets/plugins/fullcalendar/fullcalendar.min.js"></script>                   <!-- FullCalendar -->

<script type="text/javascript" src="../assets/plugins/wijets/wijets.js"></script>                                   <!-- Wijet -->

<script type="text/javascript" src="../assets/plugins/charts-chartistjs/chartist.min.js"></script>                  <!-- Chartist -->
<script type="text/javascript" src="../assets/plugins/charts-chartistjs/chartist-plugin-tooltip.js"></script>       <!-- Chartist -->

<script type="text/javascript" src="../assets/plugins/form-daterangepicker/moment.min.js"></script>                 <!-- Moment.js for Date Range Picker -->
<script type="text/javascript" src="../assets/plugins/form-daterangepicker/daterangepicker.js"></script>                    <!-- Date Range Picker -->

<script type="text/javascript" src="../assets/demo/demo-index.js"></script>                                         <!-- Initialize scripts for this page-->

    <!-- End loading page level scripts-->

    </body>
</html>