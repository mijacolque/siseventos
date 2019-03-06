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
      <td> <h1 align="center">REGISTRAR ASISTENCIA</h1></td>
    </tr>
    <tr><td><h2><a href="qr.php">Por Código QR</a></h2></td></tr>
    <tr><td><h2><a href="asistencia.php">Por Nro. Carnet de identidad</a></h2></td></tr>
    <tr><td><h2><a href="painel_voluntario.php">Atras</a></h2></td></tr>
    

  </table>


</body>
</html>