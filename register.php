<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <link rel="shortcut icon" href="img/logofr1.png" type="image/x-icon">
    <title>REGISTRATE</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form action="" method="POST">
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light">REGISTRATE</h1>
                    </div>
                     <?php
                     include("conexion_bd.php");
                     include("controlador_registrar_usuario.php");
                     ?>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" class="form-control" placeholder="Ingrese su Usuario" name="usuario">
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <input type="text" class="form-control" placeholder="Ingrese su Matricula" name="matricula">
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <input type="date" class="form-control" placeholder="Ingrese su Fecha de nacimiento" name="fn">
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <select name="area" class="form-control" name="area">
                        <option value="<?php echo $area; ?>"></option> 
                        <option value="Alta Direccion">Alta Direccion</option>
                        <option value="Direcciones de Area">Direcciones de Area</option>
                        <option value="Gerencia de Calidad">Gerencia de Calidad</option>
                        <option value="Gerencia de Area y Zona">Gerencia de Area y Zona</option>
                        <option value="Jefaturas">Jefaturas</option>
                        <option value="Coordinaciones y Supervisores">Coordinaciones y Supervisores</option>
                        <option value="Niveles Operativos">Niveles Operativos</option>
                    </select>
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <input type="email" class="form-control" placeholder="Ingrese su Correo Electronico" name="correo">
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <input type="password" class="form-control" placeholder="Ingrese una Contraseña" name="contraseña">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" class="btn btn-block ingresar" value="REGISTRAR" name="registro">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                    <a href="index.html" class="olvide"><input class="btn btn-block ingresar" value="VOLVER A INICIAR SESION"></a>
                    </div>
                    <div class="form-group mx-sm-4 text-right">
                        <span class="register.php"><a href="index.html" class="olvide">Ya tienes cuenta?</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>