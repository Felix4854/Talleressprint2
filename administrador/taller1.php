<?php 
    session_start();
    # llamamos al archivo de conexion 
    include('conexion.php');
    # instanciamos los parametros de conexion
    $con = connection();   
    # verificar usuario logeado
    if(isset($_SESSION['us_id']) and $_SESSION['us_id'] != 0) { 
        $id_us = $_SESSION['us_id'];
        $sql_usuario = "SELECT  count(*) AS `num` FROM `usuario` WHERE `estado`= 1 AND `id`='$id_us'";
        $query_user = mysqli_query($con, $sql_usuario);
        $rows_ins = mysqli_fetch_array( $query_user); 
        if( $rows_ins['num'] == 0 ){    
            header('location: index.php');
        }
    }  
    #llamamos a todos los datos la tabla usuarios
    //consulta de profesor
    $sql1 = "SELECT * FROM `profesor`";
    $query_profesor = mysqli_query($con, $sql1);
    $sql2 = "SELECT * FROM `disiplina`";
    $quey_disciplina = mysqli_query($con, $sql2);
    $sql3 = "SELECT * FROM `aula`";
    $quey_ubicacion = mysqli_query($con, $sql3);

    #llamada al archivo
    require('log.php');
    #iniciando
    $log = new Log("log.txt");
    #se escribe en el archivo
    $log->writeLine("usuario: ".$_SESSION['us_nm']."][Informacion", "ingreso al area de nuevo taller" );
    #cerramos la funcion
    $log->close();
?>
<!DOCTYPE html>
<html lang="es">
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
    <link type="text/css" href="../assets/plugins/form-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"> 

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
                                <h1><i class="fa fa-book"></i> Gestión de Talleres</h1>
                                <div class="options">
                                    <div class="btn-toolbar">              
                                       
                                    </div>
                                </div>
                            </div>
         <div class="container-fluid">

    <div class="row">
    <div class="col-sm-12">


<?php if (isset($_GET['r']) AND $_GET['r']==2){ ?>    
    <div class="alert alert-dismissable alert-danger">
        <i class="fa fa-fw fa-times"></i>&nbsp; <strong>Error: </strong> La fecha de fin no puede ser anterior a la fecha de inicio.
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
<?php } ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Nuevo taller</h2>
            </div>
            <div class="panel-body">
                <form  class="form-horizontal" name="nuevo" action="tallg1.php" method="post" onsubmit="return validarFechas()">
                    <?php if (isset($_GET['r1']) AND $_GET['r1']==1){ ?>    
                        <div class="alert alert-dismissable alert-danger">
                            <i class="fa fa-fw fa-times"></i>&nbsp; <strong>Error: </strong> el mombre del taller ya existe.
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Nombre del Taller:</label>
                        <div class="col-md-8">                            
                                <input type="text" name="taller" width="100%">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Profesor:</label>
                        <div class="col-md-8">
                            <select name="profesor" id="selector1" class="form-control">
                                    <?php while($row = mysqli_fetch_array($query_profesor)): ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['nombres'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Disciplina:</label>
                        <div class="col-md-8">
                           <select name="disciplina" id="selector1" class="form-control">
                                    <?php while($row = mysqli_fetch_array($quey_disciplina)): ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['disiplina'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Ubicación:</label>
                        <div class="col-md-8">
                           <select name="ubicacion" id="selector1" class="form-control">
                                    <?php while($row = mysqli_fetch_array($quey_ubicacion)): ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['detalle'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                        </div>
                    </div>
                    <?php if (isset($_GET['r2']) AND $_GET['r2']==1){ ?>    
                        <div class="alert alert-dismissable alert-danger">
                            <i class="fa fa-fw fa-times"></i>&nbsp; <strong>Error: </strong> La fecha de inicio no puede ser menor a la fecha de cierre
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Fecha de Inicio:</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <input type="date" name="inicio">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Fecha de Cierre:</label>
                        <div class="col-md-8">                            
                            <div class="input-group">
                                <input type="date" name="fin">
                            </div>
                           
                        </div>
                    </div>
                    <?php if (isset($_GET['r3']) AND $_GET['r3']==1){ ?>    
                        <div class="alert alert-dismissable alert-danger">
                            <i class="fa fa-fw fa-times"></i>&nbsp; <strong>Error: </strong> la hora de ingreso no puede ser menor a la hora de salida
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Hora de ingreso:</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                 <input type="time" name="ingreso">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Hora de salida:</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                 <input type="time" name="salida">
                            </div>
                        </div>
                    </div>
                
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button type="submit" class="btn-success btn"><i class="fa fa-check-circle-o"></i> Aceptar</button>
                            <a href="talleres.php" class="btn-default btn"><i class="fa fa-mail-reply"></i> Cancelar</a>
                        </div>
                    </div>
                </div>
                </form>
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
<script type="text/javascript">
        function validarFechas() {
            var inicio = new Date(document.forms["nuevo"]["inicio"].value);
            var fin = new Date(document.forms["nuevo"]["fin"].value);
            if (fin < inicio) {
                alert("La fecha de fin no puede ser anterior a la fecha de inicio");
                return false; // Detenemos el envío del formulario
            }
            return true; // Permitimos el envío del formulario si las fechas son válidas
        }
    </script>

      


    
    

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
<script type="text/javascript" src="../assets/plugins/form-daterangepicker/daterangepicker.js"></script>                    <!-- Date 
Range Picker -->
<script type="text/javascript" src="../assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>   
<script type="text/javascript" src="../assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>   




<script type="text/javascript" src="../assets/demo/demo-index.js"></script>                                         <!-- Initialize scripts for this page-->
<script type="text/javascript" src="../assets/demo/demo-pickers.js"></script>

    <!-- End loading page level scripts-->

    </body>
</html>