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
   
   <tr><td colspan="3"><h1 align="center"><strong>REPORTE DE INSCRITOS</strong> </h1></td></tr> 

  <tr>
      <td><h1>CI</h1></td>
      <td><h1>¿Asistió al seminario ?</h1></td>
      <td><h1>¿Cómo supo del evento?</h1></td>
      <td><h1>Facilidad para inscribirese en el evento via web :</h1></td>
      <td><h1>Información previa sobre detalles prácticos del evento :</h1></td>
      <td><h1>Calidad de las instalaciones :</h1></td>
      <td><h1>Puntualidad :</h1></td>
      <td><h1>Contenido de las presentaciones :</h1></td>
      <td><h1>Seminario en general :</h1></td>
      <td><h1>¿Recomendarías este evento a otras personas?</h1></td>
      <td><h1>¿Quisiera agregar alguna sugerencia para siguientes seminarios?</h1></td>
      <td><h1>¿Cómo ve el avance del actual Gobierno de Bolivia en temas de Desigualdad? </h1></td>
      <td><h1>¿Cuál considera usted que son las principales causas de Desigualdad en Bolivia ?</h1></td>
      <td><h1>Comentarios</h1></td>
  </tr>

  <?php 

  $registros=mysqli_query($conexion,"select * from encuesta") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
  echo "<tr><td>".utf8_decode($reg[0])."</td>";
  echo "<td>".utf8_decode($reg[1])."</td>";
  echo "<td>".utf8_decode($reg[2])."</td>";
  echo "<td>".utf8_decode($reg[3])."</td>";
  echo "<td>".utf8_decode($reg[4])."</td>";
  echo "<td>".utf8_decode($reg[5])."</td>";
  echo "<td>".utf8_decode($reg[6])."</td>";
  echo "<td>".utf8_decode($reg[7])."</td>";
  echo "<td>".utf8_decode($reg[8])."</td>";
  echo "<td>".utf8_decode($reg[9])."</td>";
  echo "<td>".utf8_decode($reg[10])."</td>";
  echo "<td>".utf8_decode($reg[11])."</td>";
  echo "<td>".utf8_decode($reg[12])."</td>";

  echo "<td>".utf8_decode($reg[13])."</td></tr>";

}


   ?>

<tr><h1><a href="painel.php">IR MENU PRINCIPAL</a></h1></tr>

</table>

</body>
</html>
