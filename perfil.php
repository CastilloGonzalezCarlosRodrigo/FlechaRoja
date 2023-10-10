<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flecha Roja</title>
    <link rel="Stylesheet" href="css/perfil.css">
    <link rel="shortcut icon" href="img/logofr1.png" type="image/x-icon">
    <!--Iconos-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

</head>

<body>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="img/fondo1.jpg" alt="img-avatar">
                </div>
            </div>
        </div>
        <thead>
        <?php
        session_start();
        include("connection.php");
        
        $correo = $_SESSION['correo'];
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";   
        $resultado = mysqli_query($conn, $sql);
        $mostrar = mysqli_fetch_array($resultado);
        
        if ($mostrar) {
        ?>
        </thead>
        <tbody>
            </tr>
        </tbody>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $mostrar['usuario'] ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i>
                        <td><?php echo $mostrar['matricula'] ?></td>
                    </li>
                    <li><i class="icono fa fa-calendar"></i>
                        <td><?php echo $mostrar['fn'] ?></td>
                    </li>
                    <li><i class="icono fas fa-briefcase"></i>
                        <td><?php echo $mostrar['area'] ?></td>
                    </li>
                    <li><i class="icono fa fa-envelope"></i>
                        <td><?php echo $mostrar['correo'] ?></td>
                    </li>
                </ul>
                <ul class="lista-datos">
                    <a href="home.html">
                        <li><i class="icono fa fa-home"></i> Inicio</li>
                    </a>
                    <a href="index.html">
                        <li><i class="icono fa fa-sign-out"></i> Cerrar Sesion</li>
                    </a>
                </ul>
            </div>
        </div>
    <?php
            }
    ?>
    </section>


</body>

</html>