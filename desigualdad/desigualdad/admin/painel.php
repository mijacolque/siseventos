<?php
session_start();
include('verifica_login.php');
include('conexion.php');
$usuario=$_SESSION['usuario'];
$registros=mysqli_query($conexion,"select tipo from usuarios where usuario='$usuario'") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
    if($reg[0]=='admin')
    {
        header('Location: painel_admin.php');
    }

    if($reg[0]=='voluntario')
    {

      header('Location: painel_voluntario.php');
    }

}

mysqli_close($conexion);


?>
