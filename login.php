
<?php


$contador = 0;


try {
  $conexion = new PDO('mysql:host=localhost; dbname=pruebas', 'root', 'iusenma');
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexion->exec("SET CHARACTER SET utf8");

  $consulta = "SELECT * FROM usuarios WHERE USUARIO= :usuario";


  $resultado = $conexion->prepare($consulta);

  $usuario = htmlentities(addslashes($_POST["usuario"]));
  $contra = htmlentities(addslashes($_POST["password"]));


  $resultado->bindValue(":usuario", $usuario);
  $resultado->execute();



  while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {

    if (password_verify($contra, $fila['PASSWORD'])) {
      $contador++;
    }
  }


  if ($contador > 0) {

    session_start();
    $_SESSION["usuario"] = $usuario;

    header("Location:registrado_correctamente.php");
  }
} catch (Exception $e) {
  die("Se ha producido el error: " . $e->getMessage());
} finally {
  $conexion = null; //vaciar
}




?>

