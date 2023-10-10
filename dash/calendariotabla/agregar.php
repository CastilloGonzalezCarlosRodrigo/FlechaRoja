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
                    <h1 class="text-light">Agendar Evento</h1>
                </div>
                <!-- Funcion -->
                    <?php
                    include("conexion.php");

                    if (!empty($_POST["registro"])) {

                        if (
                            empty($_POST["title"])
                            or empty($_POST["description"])
                            or empty($_POST["start_datetime"])
                            or empty($_POST["end_datetime"])
                            or empty($_POST["color"])
                        ) {
                            echo 'Uno de los campos esta vacio';
                        } else {
                            $title = $_POST["title"];
                            $description = $_POST["description"];
                            $start_datetime = $_POST["start_datetime"];
                            $end_datetime = $_POST["end_datetime"];
                            $color = $_POST["color"];
                            $sql = $conexion->query(" insert into schedule_list(title,description,start_datetime,end_datetime,color)values('$title','$description','$start_datetime','$end_datetime','$color') ");
                            if ($sql == 1) {
                                header("Location: /A/dash/calendario.php");
                            } else {
                                echo 'error dia no registrado';
                            }
                        }
                    }
                    ?>
                    <!-- Fin Funcion -->
                    <div class="form-group mx-sm-4 pt-3">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="title"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" name="description"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <label>Inicio</label>
                        <input type="date" class="form-control" name="start_datetime"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <label>Final</label>
                        <input type="date" class="form-control" name="end_datetime"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-1">
                        <label>Color</label>
                        <input type="text" class="form-control" name="color"><br>
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" class="btn btn-block ingresar" name="registro" value="AGREGAR">
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <a href="/A/dash/calendario.php"><input class="btn btn-block ingresar" value="REGRESAR"></a>
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