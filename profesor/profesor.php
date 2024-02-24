<?php 
    session_start();
    $id_porfesor = $_SESSION['pr_id'];
    include('conexion.php');
    $con = connection(); 
    $sql_profesor = " SELECT `nombres` FROM `profesor` WHERE `id`='$id_porfesor';";
    $query_profe = mysqli_query($con, $sql_profesor);
    $row_profesor = mysqli_fetch_array($query_profe); 
    # llamamos al archivo de conexion 
    
    $sql = "SELECT `taller`.`id` AS `id`,`taller`.`taller` AS `taller`, `profesor`.`nombres` AS `nombres`, `aula`.`detalle` AS `ubicacion`,`disiplina`.`disiplina` AS `disiplina`, DATE_FORMAT(`taller`.`inicio`,'%d/%m/%y') AS `inicio`, DATE_FORMAT(`taller`.`fin`,'%d/%m/%y') AS `fin` FROM `taller`, `profesor`, `disiplina`, `aula` WHERE `aula`.`id`=`taller`.`aula_id` AND`disiplina`.`id`=`taller`.`disiplina_id` AND `profesor`.`id`=`taller`.`profesor_id` AND `taller`.`estado`='1' AND `taller`.`profesor_id` = '$id_porfesor'  ;";
    $query = mysqli_query($con, $sql);
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
        <h1><i class="fa fa-book"></i> Lista de Talleres de: <strong><?php echo $row_profesor['nombres'] ?></strong></h1>
        <div class="options">
            <div class="btn-toolbar">              
               
            </div>
        </div>
    </div>
     <div class="container-fluid">

<!-- -->        
        <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-sky">
            <div class="panel-heading">
                <h2>Relación de talleres: </h2>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Ubicación</th>
                            <th>Taller</th>
                            <th>Disciplina</th>
                            <th>Inicio</th>
                            <th>Cierre</th>
                            <th>Hora de inicio</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
<?php 
#para enumerar los registros
$n = 0;
#creamos un siclo while para llenar la tabla

while ($row = mysqli_fetch_array($query)):
    
?>  
                        <tr>                            
                            <td><?php echo $n = $n +1; ?></td>
                            <td><?php echo $row['ubicacion'] ?></td>
                            <td><?php echo $row['taller'] ?></td>
                            <td><?php echo $row['disiplina'] ?></td>
                            <td><?php echo $row['inicio'] ?></td>
                            <td><?php echo $row['fin'] ?></td>
                            <td><?php echo $row['ingreso'] ?></td>
                            <td>
                                <a href="detalleTaller.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Detalles</a>
                            </td>
                            
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