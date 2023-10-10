<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flecha Roja</title>
    <link rel="stylesheet" href="estilos/editar.css">
    <link rel="shortcut icon" href="/A/img/logofr1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Funcion -->
    <?php
    if (isset($_POST['editar'])) {
        //aqui entra cuando se presiona el boton enviar
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $start_datetime = $_POST["start_datetime"];
        $end_datetime = $_POST["end_datetime"];
        $color = $_POST["color"];

        $sql = "UPDATE schedule_list SET 
        title ='" . $title . "',
        description = '" . $description . "',
        start_datetime = '" . $start_datetime . "',
        end_datetime = '" . $end_datetime . "',
        color = '" . $color . "'
        WHERE id = '" . $id . "'";
        $result = mysqli_query($conexion, $sql);

        if ($result) {
            echo "<script languaje='JavaScript'>
              alert('Los datos se actualizaron correctamente
                     de la BD');
                     location.assign('/A/dash/calendario.php');
                     </script>
                     ";
        } else {
            echo "<script languaje='JavaScript'>
              alert('Los datos no se actualizaron correctamente
                     de la BD');
                     location.assign('/A/dash/calendario.php');
                     </script>
                     ";
        }
        mysqli_close($conexion);
        // Redirecciona a la tabla de calendarios
        header("Location: /A/dash/calendario.php");
    } else {

        $id = $_GET['id'];
        $sql = "SELECT * FROM schedule_list WHERE id='" . $id . "'";
        $delQuery = mysqli_query($conexion, $sql);

        $mostrar = mysqli_fetch_assoc($delQuery);
        $title = $mostrar['title'];
        $description = $mostrar["description"];
        $start_datetime = $mostrar["start_datetime"];
        $end_datetime = $mostrar["end_datetime"];
        $color = $mostrar["color"];

        mysqli_close($conexion);

    ?>
    <!-- Fin Funcion -->
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 m-1">
                <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                    <div class="form-group text-center pt-3">
                        <h1>Editar Evento</h1>
                    </div>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group mx-sm-4 pt-3">
                            <label>Titulo</label>
                            <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>"> <br>
                        </div>
                        <div class="form-group mx-sm-4 pt-3">
                            <label>Descripcion</label>
                            <input type="text" name="description" id="description" class="form-control" value="<?php echo $description; ?>"> <br>
                        </div>
                        <div class="form-group mx-sm-4 pt-3">
                            <label>Comienzo</label>
                            <input type="date" name="start_datetime" id="start_datetime" class="form-control" value="<?php echo $start_datetime; ?>"> <br>
                        </div>
                        <div class="form-group mx-sm-4 pt-3">
                            <label>Final</label>
                            <input type="date" name="end_datetime" id="end_datetime" class="form-control" value="<?php echo $end_datetime; ?>"> <br>
                        </div>
                        <div class="form-group mx-sm-4 pt-3">
                            <label>Color</label>
                            <input type="text" name="color" id="color" class="form-control" value="<?php echo $color; ?>"> <br>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group mx-sm-4 pb-2">
                            <input type="submit" class="btn btn-block ingresar" name="editar" value="ACTUALIZAR">
                        </div>
                        <div class="form-group mx-sm-4 pb-2">
                            <a href="/A/dash/calendario.php" class="olvide"><input class="btn btn-block ingresar" value="REGRESAR"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<?php
    }
?>

</html>