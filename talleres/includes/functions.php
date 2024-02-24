<?php

require_once("db.php");




if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros

        case 'acceso_user':
            acceso_user();
            break;

        case 'cambiar_clave':
            cambiar_clave();
            break;

        case 'insert_profesor':
            insert_profesor();
            break;

        case 'editar_profesor':
            editar_profesor();
            break;

        case 'insert_alumno':
            insert_alumno();
            break;

        case 'editar_alumno':
            editar_alumno();
            break;

        case 'insert_registro':
            insert_registro();
            break;

        case 'editar_registro':
            editar_registro();
            break;

        case 'insert_taller':
            insert_taller();
            break;

         case 'editar_taller':
            editar_taller();
            break;
        

        case 'editar_user':
            editar_user();
            break;       

    }
}


function acceso_user()
{
    include("db.php");
    extract($_POST);

    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $password = $conexion->real_escape_string($_POST['password']);
    session_start();
    $_SESSION['nombre'] = $nombre;


    $consulta = "SELECT * FROM user where nombre='$nombre' and password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    
  
        if(isset($filas['rol'])){ //enfermero
            $_SESSION['rol'] = $filas['rol'];
            $_SESSION['id'] = $filas['id'];

            if ($filas['rol']==3) {
                header('Location: ../views/index2.php');
            } else {
                header('Location: ../views/index.php');
            }

            

        } else {  

           echo "<script language='JavaScript'>
            alert('Usuario o Contraseña Incorrecta');
            location.assign('./_sesion/login.php');
            </script>"; 
            session_destroy();
        }

    
}

function cambiar_clave()
{
    include("db.php");
    extract($_POST);

    $clave1 = $conexion->real_escape_string($_POST['clave1']);
    $clave2 = $conexion->real_escape_string($_POST['clave2']);

    if($clave1===$clave2){
          $consulta = "UPDATE user SET  password='$clave1'  WHERE id = '$id'";
            $resultado = mysqli_query($conexion, $consulta);

            echo "<script language='JavaScript'>
        alert('la clave se cambio correctamente');
        location.assign('/');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('la clave no se cambio !!');
        location.assign('/');
        </script>";
    }

}

function insert_registro()
{
    include "db.php";
    extract($_POST);

    $consulta = "INSERT INTO detalles (Idtaller, Idprofe, Horario) VALUES ('$idtaller','$idprofesor','')";
    $resultado = mysqli_query($conexion, $consulta);
    $iddetalle=mysqli_insert_id($conexion);

    $consulta2 = "INSERT INTO alumno (Iddetalle, Non_alumno, Ape_alumno, Fec_na, Dni, Sexo, Tel_alum, Dir_alum, horario) VALUES ('$iddetalle', '$nombrealumno', '$apellidoalumno','','$dniAlumno','','','','')";
    $resultado2 = mysqli_query($conexion, $consulta2);


    if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/registrar.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/registrar.php');
         </script>";
    }
}


function insert_profesor()
{
    include "db.php";
    extract($_POST);
   

    $consulta = "INSERT INTO profesores (Idprofe, Nom_profe, Ape_profe, Dni, Fec_nac, Sexo, Tel_profe, Dir_profe) VALUES ('','$nomProfe', '$apeProfe', '$dniProfe', '$fecnacProfe', '$sexoProfe', '$telfProfe', '$dirProfe')";
    $resultado = mysqli_query($conexion, $consulta);
    $idcita=mysqli_insert_id($conexion);
  

if ($resultado) {
        echo "  <script language='JavaScript'>
         location.assign('../views/Profesores.php');
         </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/Profesores.php');
         </script>";
    }
   
}



function insert_taller()
{
    include "db.php";
    extract($_POST);
    $consulta = "INSERT INTO taller (Non_taller, Cat_taller) VALUES ('$nombreTaller', '$categoriaTaller')";
    $resultado = mysqli_query($conexion, $consulta);
   
    if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/Talleres.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/Talleres.php');
         </script>";
    }
}


function editar_user()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE user SET nombre = '$nombre', correo = '$correo', password = '$password',
     rol ='$rol' WHERE id = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/usuarios.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/usuarios.php');
         </script>";
    }
}

function editar_profesor()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE profesores SET Nom_profe='$nomProfe', Ape_profe='$apeProfe', Dni='$dniProfe', Fec_nac='$fecnacProfe', Sexo='$sexoProfe', Tel_profe='$telfProfe', Dir_profe='$dirProfe'   WHERE Idprofe = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/Profesores.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/Profesores.php');
         </script>";
    }
}

function editar_alumno()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE alumno SET Non_alumno='$nomAlumno', Ape_alumno='$apeAlumno', Dni='$dniAlumno', Fec_na='$fecnacAlumno', Sexo='$sexoAlumno', Tel_alum='$telfAlumno', Dir_alum='$dirAlumno'   WHERE Idalumno = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/Alumnos.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/Alumnos.php');
         </script>";
    }
}


function editar_taller()
{
    include "db.php";
    extract($_POST);
    $consulta = "UPDATE taller SET Non_taller = '$nombreTaller', Cat_taller='$categoriaTaller' WHERE Idtaller = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);
    
    if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/talleres.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
         alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/talleres.php');
         </script>";
    }

}

function editar_registro()
{
    include "db.php";
    extract($_POST);

    $consulta = "UPDATE detalles SET Idtaller = '$idtaller', Idprofe = '$idprofesor'  WHERE Iddetalle = '$id' ";
    $resultado = mysqli_query($conexion, $consulta);


      if ($resultado) {
        echo "<script language='JavaScript'>
        location.assign('../views/registrar.php');
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Uy no! ya valio hablale al ing :v');
         location.assign('../views/registrar.php');
         </script>";
    }
   
}