<?php
session_start();
include('verifica_login.php');
?>
<?php 
include('conexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Seminario Desigualdad en el Mundo 2018</title>

	
</head>

<body>

<table width="100%" border="5">
   
   <tr><td colspan="3"><h1 align="center"><strong>REPORTE DE VISITAS</strong> </h1></td></tr> 

  <tr>
      <td><h1>Fecha</h1></td>
      <td><h1>Hora</h1></td>
      <td><h1>Visitas</h1></td>
  </tr>

  <?php 

  $registros=mysqli_query($conexion,"select * from visitas") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
  echo "<tr><td>".$reg[0]."</td>";
  echo "<td>".$reg[1]."</td>";
  echo "<td>".$reg[2]."</td></tr>";

}


   ?>
<tr><h1><a href="painel.php">IR MENU PRINCIPAL</a></h1></tr>


</table>

</body>
</html>
