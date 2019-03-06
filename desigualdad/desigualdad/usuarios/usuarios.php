 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<table width="100%" border="1"><tr><td>NRO.</td><td>USUARIO</td><td>CONTRASEÑA</td><td>NOMBRE PERSONA</td></tr>


<?php 
$j=0;
echo '<h1 align="center">USUARIOS PROTOCOLO DESIGUALDAD EN EL MUNDO 2018</h1></br></br>';
for ($i=1000; $i <3100 ; $i=$i+70) { 
	
	$j=$j+1;
	$user='protocolo'.$i;
	
	echo '<tr><td>'.$j.'</td>'.'<td>'.$user.'</td>'.'<td>'.$user.'</td><td></td></tr>';

	/*echo $j.'</br>';
	$user='protocolo'.$i;
	echo $user.'</br>';
	echo $user.'</br></br>';
	//echo md5($user).'</br></br>';
	$contrasena=md5($user);
	$rol='protocolo';*/

   /* $conexion=mysqli_connect("localhost","desigualdad","ej2Ieg4beChei6Io1iefugoori7eey3Wee9quohg","desigualdad_web") or
    die("Problemas con la conexión");

	mysqli_query($conexion,"insert into usuarios(usuario,contrasena,tipo) values ('$user','$contrasena','$rol')") or
  die("Problemas en el select".mysqli_error($conexion));*/

}

 ?>
</table>

 </body>
 </html>