<?php
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['correo'] = $correo;
$conn = mysqli_connect("localhost", "root", "", "flecha_roja");
$consulta = "SELECT * FROM usuarios WHERE correo='$correo' and contraseña='$contraseña'";
$resultado = mysqli_query($conn, $consulta);
$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo'] == 2) { //cliente
    header("location:home.html"); 
} else {
    echo "<script>alert('Correo o Contraseña Incorrectos');</script>";
    header("location:index.html"); 
}

if ($filas['id_cargo'] == 1) { //administrador
    header("location:dash/index.html");
} else {
    echo "<script>alert('Correo o Contraseña Incorrectos');</script>";
?>


    <?php
    include("index.html");

    ?>


    <?php

}


mysqli_free_result($resultado);
mysqli_close($conn);
    ?> 

     
