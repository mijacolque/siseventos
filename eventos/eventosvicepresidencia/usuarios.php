 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<h1 align="center">SEMINARIO INTERNACIONAL: COMUNICACIÓN Y REVOLUCIÓN EN RRSS</h1>
 	<table width="100%" border="1"><tr><td>NRO.</td><td>USUARIO</td><td>CONTRASEÑA</td><td>TIPO USUARIO</td><td>NOMBRE PERSONA</td></tr>


<?php /*
$j=0;
echo '<h1 align="center">USUARIOS PROTOCOLO TIPO QR </h1>';
for ($i=1000; $i <2100 ; $i=$i+70) { 
	
	$j=$j+1;
	$user='protocolo'.$i;
	
	//echo '<tr><td>'.$j.'</td>'.'<td>'.$user.'</td>'.'<td>'.$user.'</td><td></td></tr>';

	//echo $j.'</br>';
	$user='protocolo'.$i;
	//echo $user.'</br>';
	//echo $user.'</br></br>';
	//echo md5($user).'</br></br>';
	$contrasena=md5($user);
	$rol='qrprotocolo';

	echo '<tr><td>'.$j.'</td>'.'<td>'.$user.'</td>'.'<td>'.$user.'</td>'.'<td>'.$rol.'</td><td></td></tr>';

   $conexion=mysqli_connect("localhost","mcolquehuanca","eequ0subaifoungohje4ookeel6kay5Equ4thahn","eventos_vicepresidencia") or
    die("Problemas con la conexión");

	mysqli_query($conexion,"insert into usuarios(usuario,contrasena,tipo) values ('$user','$contrasena','$rol')") or
  die("Problemas en el select".mysqli_error($conexion));

}
*/
 ?>
</table>

<table width="100%" border="1"><tr><td>NRO.</td><td>USUARIO</td><td>CONTRASEÑA</td><td>TIPO USUARIO</td><td>NOMBRE PERSONA</td></tr>


<?php 
$j=0;
echo '<h1 align="center">USUARIOS PROTOCOLO TIPO CI </h1>';
for ($i=2100; $i <3200 ; $i=$i+70) { 
	
	$j=$j+1;
	$user='protocolo'.$i;
	
	//echo '<tr><td>'.$j.'</td>'.'<td>'.$user.'</td>'.'<td>'.$user.'</td><td></td></tr>';

	//echo $j.'</br>';
	$user='protocolo'.$i;
	//echo $user.'</br>';
	//echo $user.'</br></br>';
	//echo md5($user).'</br></br>';
	$contrasena=md5($user);
	$rol='ciprotocolo';

	echo '<tr><td>'.$j.'</td>'.'<td>'.$user.'</td>'.'<td>'.$user.'</td>'.'<td>'.$rol.'</td><td></td></tr>';

   $conexion=mysqli_connect("localhost","mcolquehuanca","eequ0subaifoungohje4ookeel6kay5Equ4thahn","eventos_vicepresidencia") or
    die("Problemas con la conexión");

	mysqli_query($conexion,"insert into usuarios(usuario,contrasena,tipo) values ('$user','$contrasena','$rol')") or
  die("Problemas en el select".mysqli_error($conexion));

}

 ?>
</table>

 </body>
 </html>