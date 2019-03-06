<?php
session_start();
include('conexion.php');

if(empty($_POST['usuario']) || empty($_POST['contrasena'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
$contrasena=md5($contrasena);

echo $query = "select usuario from usuarios where usuario = '$usuario' and contrasena = '$contrasena'";

$result = mysqli_query($conexion, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>