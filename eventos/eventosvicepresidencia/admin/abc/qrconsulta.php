<?php
session_start();
include('verifica_login.php');
?>

<style type="text/css">
<!--
.Estilo1 {
	font-size: 80px;
	font-weight: bold;
}
.Estilo4 {
	font-size: 40px;
	font-weight: bold;
}
-->
</style>
<table width="100%" border="0">
  <tr>
    <td><div align="center">
      <p class="Estilo1">&nbsp;</p>
      <p class="Estilo1">&nbsp;</p>
      <p class="Estilo1">DATOS PARTICIPANTE :</p>
      <p class="Estilo1">&nbsp;</p>
      <p class="Estilo1">
        <?php
header("Content-Type: text/html;charset=utf-8");

$id=$_GET['id'];

$conexion=mysqli_connect("localhost","fciudadano","sjcL74MwNkuCg7ErfWiMvfdhbpCRou","fcinscripciones") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select nombres,apellidos
                        from inscripciones where id_inscripcion=$id") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
  echo 'Nombre Completo : </br></br>'.utf8_encode($reg[0]).' '.utf8_encode($reg[1]).'</br>';
}

mysqli_close($conexion);

?>
      </p>
      <p class="Estilo1">&nbsp;</p>
     <p class="Estilo4"><a href="ra11.php?id=<?php echo $id;?>">REGISTRAR ASISTENCIA 11</a> </p>
<p class="Estilo4"><a href="ra16.php?id=<?php echo $id;?>">REGISTRAR ASISTENCIA 16</a> </p>
<p class="Estilo4"><a href="ra18.php?id=<?php echo $id;?>">REGISTRAR ASISTENCIA 18 </a> </p>
<p class="Estilo4"><a href="ra23.php?id=<?php echo $id;?>">REGISTRAR ASISTENCIA23</a> </p>
</br></br></br>
<p class="Estilo4"><a href="logout.php">SALIR DEL PROGRAMA</a> </p>
    </div></td>
  </tr>
</table>
