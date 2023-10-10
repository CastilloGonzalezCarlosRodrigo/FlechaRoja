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
  if (isset($_POST['enviar'])) {
    //aqui entra cuando se presiona el boton enviar
    $id=$_POST["id"];
    $usuario = $_POST["usuario"];
    $matricula = $_POST["matricula"];
    $fn = $_POST["fn"];
    $area = $_POST["area"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $id_cargo = $_POST["id_cargo"];

    //Actualizar usuarios

    $sql = "UPDATE usuarios SET
    usuario='" . $usuario . "',
    matricula='" . $matricula . "',
    fn='" . $fn . "',
    area='" . $area . "',
    correo='" . $correo . "',
    contraseña='" . $contraseña . "',
    id_cargo='" . $id_cargo . "'
    WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
      echo "<script languaje='JavaScript'>
              alert('Los datos se actualizaron correctamente
                     de la BD');
                     location.assign('/A/dash/tables.php');
                     </script>
                     ";
    } else {
      echo "<script languaje='JavaScript'>
              alert('Los datos no se actualizaron correctamente
                     de la BD');
                     location.assign('/A/dash/tables.php');
                     </script>
                     ";
    }
    mysqli_close($conexion);
            // Redireccion a la pagina de las tablas de usuarios
           header("Location: /A/dash/tables.php"); 
  } else {

    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id='" . $id . "'";
    $resultado = mysqli_query($conexion, $sql);

    $mostrar = mysqli_fetch_assoc($resultado);
    $usuario = $mostrar['usuario'];
    $matricula = $mostrar['matricula'];
    $fn = $mostrar['fn'];
    $area = $mostrar['area'];
    $correo = $mostrar['correo'];
    $contraseña = $mostrar['contraseña'];
    $id_cargo = $mostrar['id_cargo'];

    mysqli_close($conexion);

  ?>
  <!-- Fin Funcion -->
          <div class="container">
            <div class="row justify-content-center pt-5 mt-5 m-1">
                <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                    <div class="form-group text-center pt-3">
    <h1>Editar Usuario</h1>
                    </div>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="form-group mx-sm-4 pt-3">
      <label>Usuario</label>
      <input type="text" name="usuario" class="form-control" value="<?php echo $usuario; ?>"> <br>
    </div>
    <div class="form-group mx-sm-4 pt-3">
      <label>Matricula</label>
      <input type="text" name="matricula" class="form-control" value="<?php echo $matricula; ?>"> <br>
    </div>
    <div class="form-group mx-sm-4 pt-3">
      <label>Fecha de Nacimiento</label>
      <input type="date" name="fn" class="form-control" value="<?php echo $fn; ?>"> <br>
    </div>
    <div class="form-group mx-sm-4 pb-1">
                        <select name="area" class="form-control" value="<?php echo $area; ?>" name="area">
                        <option value="area">Area</option> 
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
      <label>Correo</label>
      <input type="text" name="correo" class="form-control" value="<?php echo $correo; ?>"> <br>
    </div>
    <div class="form-group mx-sm-4 pt-3">
      <label>Contraseña</label>
      <input type="text" name="contraseña" class="form-control" value="<?php echo $contraseña; ?>"> <br>
    </div>
    <div class="form-group mx-sm-4 pt-3">
      <label>Cargo</label>
      <input type="text" name="id_cargo" class="form-control" value="<?php echo $id_cargo; ?>"> <br>
    </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      
      <div class="form-group mx-sm-4 pb-2">
      <input type="submit" class="btn btn-block ingresar" name="enviar" value="ACTUALIZAR">
      </div>
      <div class="form-group mx-sm-4 pb-2">
      <a href="/A/dash/tables.php" class="olvide"><input class="btn btn-block ingresar" value="REGRESAR"></a>
      </div>
    </form>
    </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php
  }
  ?>

</body>

</html>