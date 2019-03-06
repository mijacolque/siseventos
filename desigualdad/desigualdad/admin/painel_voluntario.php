<?php
session_start();
include('verifica_login.php');
include('conexion.php');
$usuario=$_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
  <table border="5" width="100%">

    <tr>
      <td> <h1 align="center">Hola <?php echo $usuario.' '; ?>¿que deseas hacer?</h1></td>
    </tr>
    <tr><td><h2><a href="inscribir.php">Inscribir</a></h2></td></tr>
    <tr><td><h2><a href="asistencia/index.php">Registrar asistencia</a></h2></td></tr>
    <tr><td><h2><a href="logout.php">Salir</a></h2></td></tr>
    

  </table>


</body>
</html>