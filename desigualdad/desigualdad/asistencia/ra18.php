<?php
session_start();
include('verifica_login.php');
?>

<?php

$id=$_GET['id'];

$conexion=mysqli_connect("localhost","fciudadano","sjcL74MwNkuCg7ErfWiMvfdhbpCRou","fcinscripciones") or
    die("Problemas con la conexión");


$registros=mysqli_query($conexion,"select asistencia18
                        from inscripciones where id_inscripcion=$id") or
  die("Problemas en el select:".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($registros))
{
  $existe=$reg[0];
}


if($existe=='SI')

{

 
 echo '<script type="text/javascript">
 alert("Participante ya registrado");
window.location="painel.php";
</script>';
 

}	

else{

	$registros=mysqli_query($conexion,"update inscripciones
                          set asistencia18='SI'
                        where id_inscripcion='$id'") or
  die("Problemas en el select:".mysqli_error($conexion));
  
 echo '<script type="text/javascript">
 alert("Asistencia 3 creada satisfactoriamente");
window.location="painel.php";
</script>';

}


  
?>
