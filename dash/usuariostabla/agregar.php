<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flecha Roja</title>
    <link rel="stylesheet" href="estilos/agregar.css">
    <link rel="shortcut icon" href="/A/img/logofr1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form action="" method="POST">
                    <div class="form-group text-center pt-3">
                        <h1>Agregar Usuario</h1>
                    </div>
                    <!-- Funcion -->
                    <?php
                    include("conexion.php");

                    if (!empty($_POST["registro"])) {

                        if (
                            empty($_POST["usuario"])
                            or empty($_POST["matricula"])
                            or empty($_POST["fn"])
                            or empty($_POST["area"])
                            or empty($_POST["correo"])
                            or empty($_POST["contraseña"])
                            or empty($_POST["id_cargo"])
                        ) {
                            echo 'Uno de los campos esta vacio';
                        } else {
                            $usuario = $_POST["usuario"];
                            $matricula = $_POST["matricula"];
                            $fn = $_POST["fn"];
                            $area = $_POST["area"];
                            $correo = $_POST["correo"];
                            $contraseña = $_POST["contraseña"];
                            $id_cargo = $_POST["id_cargo"];
                            $sql = $conexion->query(" insert into usuarios(usuario,matricula,fn,area,correo,contraseña,id_cargo)values('$usuario','$matricula','$fn','$area','$correo','$contraseña','$id_cargo') ");
                            if ($sql == 1) {
                                header("Location: /A/dash/tables.php");
                            } else {
                                echo 'error usuario no registrado';
                            }
                        }
                    }
                    ?>
                    <!-- Fin Funcion -->
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" name="usuario" class="form-control" placeholder="Nombre de Usuario"><br>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" name="matricula" class="form-control" placeholder="Matricula"><br>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="date" name="fn" class="form-control" placeholder="Fecha de Nacimiento"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <select name="area" class="form-control" name="area">
                        <option value="Area">Area</option> 
                        <option value="Alta Direccion">Alta Direccion</option>
                        <option value="Direcciones de Area">Direcciones de Area</option>
                        <option value="Gerencia de Calidad">Gerencia de Calidad</option>
                        <option value="Gerencia de Area y Zona">Gerencia de Area y Zona</option>
                        <option value="Jefaturas">Jefaturas</option>
                        <option value="Coordinaciones y Supervisores">Coordinaciones y Supervisores</option>
                        <option value="Niveles Operativos">Niveles Operativos</option>
                    </select>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="email" name="correo" class="form-control" placeholder="Correo Electronico"><br>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" name="contraseña" class="form-control" placeholder="Contraseña"><br>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" name="id_cargo" class="form-control" placeholder="Cargo"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" name="registro" class="btn btn-block ingresar" value="AGREGAR">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <a href="/A/dash/tables.php"><input type="submit" name="regreso" class="btn btn-block ingresar" value="REGRESAR"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>