<?php
session_start();
include('verifica_login.php');
include('conexion.php');
?>
<?php 

$usuario=$_SESSION['usuario'];
$registros=mysqli_query($conexion,"select tipo from usuarios where usuario='$usuario'") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
    if($reg[0]=='qrprotocolo')
    {
        header('Location: qr.php');
    }

    if($reg[0]=='ciprotocolo')
    {

      header('Location: ci.php');
    }

}

mysqli_close($conexion);

 ?>
