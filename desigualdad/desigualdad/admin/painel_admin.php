<?php
session_start();
include('verifica_login.php');
?>
<?php 
include('conexion.php');
$reginscritos=mysqli_query($conexion,"select count(ci) from encuesta") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($regi=mysqli_fetch_array($reginscritos))
{
  $inscritos=$regi[0];

}

$regvisitas=mysqli_query($conexion,"select count(nrovisitas) from visitas") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($regv=mysqli_fetch_array($regvisitas))
{
  $visitas=$regv[0];

}


mysqli_close($conexion);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Seminario Desigualdad en el Mundo 2018</title>

	
</head>

<body>

<table width="100%" border="5">
   
   <tr><td colspan="2"><h1 align="center"><strong>REPORTE DE ENCUESTAS</strong> </h1></td></tr> 

  <tr>
      <td><h1>Número de encuestas</h1></td>
      <td><h1>Número de visitantes de la página</h1></td>
  </tr>
  <tr>
      <td><h1 align="center"><?php echo $inscritos; ?></h1></td>
      <td><h1 align="center"><?php echo $visitas; ?></h1></td>
  </tr>
  <tr><td><h3 align="center"><a href="detalleinscritos.php">VER DETALLE INSCRITOS</a></h3></td> <td><h3 align="center"><a href="detallevisitas.php">VER DETALLE VISITAS</a></h3></td></tr>
  <tr><td colspan="2"><h1 align="center"><strong><a href="logout.php">SALIR</a></strong> </h1></td></tr> 
</table>

</body>
</html>
