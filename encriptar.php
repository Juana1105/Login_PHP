<style>
table{
  width: 70%;
  margin: 0 auto;
}
td{
  border: 1px solid black;
  text-align: center;
  padding: 5px 10px 5px 10px;
  width: 16.6%;
  border-collapse: collapse;
  margin: 0;
}
#referencia{
  color: blue;
  font-weight: bold;
}
p{
  font-size: 24px;
  font-weight: bold;
  color: navy;
  text-align: center;
  margin-top: 35px;
}
#done{
  font-size: 3rem;
  border: 1px darkgreen;
  padding:20px;
  color: green;
  background-color: lightgreen;
  width: 70%;
  margin: 0 auto;
  border-radius: 15px;
  margin-top: 2rem;
  margin-bottom: 2rem;
}
</style>


<?php

require("datos_conexion.php");  

$nombre=$_POST["nombre"];
$apellido1=$_POST["apellido1"];
$apellido2=$_POST["apellido2"];
$usuario=$_POST["usuario"];
$password=$_POST["password"];

$pass_cifrada=password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));


    	try{

        $conexion=new PDO('mysql:host=localhost; dbname=pruebas', 'root', 'iusenma');
              
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");

        $consulta="INSERT INTO usuarios (`NOMBRE`, `PRIMER APELLIDO`, `SEGUNDO APELLIDO`, `USUARIO`, `PASSWORD`) VALUES (:nombre, :1apellido, :2apellido, :usuario, :contra)";


        $resultado=$conexion->prepare($consulta);

        $resultado->bindValue(":nombre", $nombre); 
        $resultado->bindValue(":1apellido", $apellido1); 
        $resultado->bindValue(":2apellido", $apellido2); 
        $resultado->bindValue(":usuario", $usuario); 
        $resultado->bindValue(":contra", $pass_cifrada); 

        $resultado->execute();

        echo "<p id='done'>Registro guardado correctamente.</p> <br><br>";
        echo "<table><tr><td>$nombre</td>";
        echo "<td>$apellido1</td>";
        echo "<td>$apellido2</td>";
        echo "<td>$usuario</td>";
        echo "<td>$pass_cifrada </td></tr></table>";


        $resultado->CloseCursor();



      }
      catch(Exception $e){ 
        die ("Se ha producido el error: " . $e->getMessage());
      }
      finally{
        $conexion=null;
      }
  
     
?>


