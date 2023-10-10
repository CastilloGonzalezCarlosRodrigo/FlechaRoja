<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flecha Roja</title>
</head>
<body>
    <!-- Funcion -->
<?php 
include("conexion.php");

$id = $_GET['id'];
$sql = "DELETE FROM schedule_list WHERE id='".$id."'";

$delQuery =mysqli_query($conexion,$sql);

if($delQuery==true){
    echo "<script>";
    echo "window.location.href = 'calendario.php'";
    echo "</script>";
} 
else{
    die("El dia no fue eliminado correctamente" . mysqli_error($conexion));
}


// Cierra la conexion a la base de datos 
mysqli_close($conexion);

// Redirecciona a la tabla de calendario
header("Location: /A/dash/calendario.php");

?>
<!-- Fin Funcion -->
<div>
    <Button>Regresar</Button>
</div>
</body>
</html>


