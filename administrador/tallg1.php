<?php
# llamamos al archivo de conexion 
include('conexion.php');

# instanciamos los parametros de conexion
$con = connection();

# Recuperamos los datos del formulario
$id_disciplina = $_POST['disciplina'];
$id_profesor = $_POST['profesor'];
$taller = $_POST['taller'];
$ubicacion = $_POST['ubicacion'];
$inicio = $_POST['inicio'];
$fin = $_POST['fin'];
$ingreso = $_POST['ingreso'];
$salida = $_POST['salida'];

# Verificamos si la fecha de fin es posterior a la fecha de inicio
if ($fin < $inicio) {
    # Si la fecha de fin es anterior a la fecha de inicio, redirigimos con un mensaje de error
    header("location: talleres.php?error=La fecha de fin no puede ser anterior a la fecha de inicio");
    exit();
}

# Realizamos la inserción en la base de datos
$sql = "INSERT INTO `taller` (`disiplina_id`, `profesor_id`, `aula_id`, `taller`, `inicio`, `fin`, `estado`, `ingreso`, `salida`) VALUES ('$id_disciplina', '$id_profesor', '$ubicacion', '$taller', '$inicio', '$fin', '1', '$ingreso', '$salida')";
$query = mysqli_query($con, $sql);

# Verificamos si la inserción fue exitosa
if ($query) {
    header("location: talleres.php");
} else {
    # Si hubo un error en la inserción, puedes manejarlo aquí
    echo "Error al insertar el taller.";
}
?>