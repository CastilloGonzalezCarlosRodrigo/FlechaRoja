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
$sql = "DELETE FROM usuarios WHERE id='".$id."'";

$delQuery =mysqli_query($conexion,$sql);

if($delQuery==true){
    echo "<script>";
    echo " window. history. back(tables.php)";
    echo "</script>";
} 
else{
    die("El usuario no fue eliminado correctamente" . mysqli_error($conexion));
}


// Cerrar conexion
mysqli_close($conexion);

// Redirigir a pagina de la tabla usuario
header("Location: /A/dash/tables.php");

?>
<!-- Fin Funcion -->
<div>
    <Button>Regresar</Button>
</div>
</body>
</html>


