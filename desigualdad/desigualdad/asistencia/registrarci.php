<?php
session_start();
include('verifica_login.php');
include('conexion.php');


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <title>Hello, world!</title>
  </head>
  <body>
 
 
    </br></br></br><?php
header("Content-Type: text/html;charset=utf-8");

$ci=$_POST['ci'];


$registros=mysqli_query($conexion,"select ci,nombres,apellidos from inscritos where ci=$ci") or
  die("ERROR EN EL QR-NO PERTENECE AL EVENTO</br></br>".mysqli_error($conexion));

$reg=mysqli_fetch_array($registros);

if(!empty($reg[0]))

{
        $nombrecompleto=utf8_encode($reg[1]).' '.utf8_encode($reg[2]);

  echo '<h3 align="center">Nombre Completo : </br></br>'.$nombrecompleto.'</h3></br></br></br>';

  echo '<input type="hidden" name="ci" value="'.$reg[0].'">';
  echo '<input type="hidden" name="nombrecompleto" value="'.$nombrecompleto.'">';

$hora=date('h-i-s');



        $registros1=mysqli_query($conexion,"select ci from asistentes_seminario where ci=$ci") or
  die("Problemas en el select:".mysqli_error($conexion));

  $reg1=mysqli_fetch_array($registros1);

      if(empty($reg1[0]))

      {
            

       mysqli_query($conexion,"insert into asistentes_seminario(ci,nombre_completo,hora) values ('$ci','$nombrecompleto','$hora')") or
        die("ERROR EN EL QR-NO PERTENECE AL EVENTO".mysqli_error($conexion)); 


        echo '<h3 align="center">REGISTRO DE ASISTENCIA CORRECTO</h3>';

      }

      else

      {

      echo '<h3 align="center">REGISTRO DE ASISTENCIA DUPLICADO</h3>';

    }


  }

  else

  {

    echo '<h3 align="center">PERSONA NO REGISTRADA</h3>';
  }



?>

</br></br><center>  <input type="button" onclick="javascript:window.location='ci.php';" value="Registrar otra persona" style="width: 200px;  "></center>

</br></br><center>  <input type="button" onclick="javascript:window.location='logout.php';" value="SALIR DEL PROGRAMA"></center>


  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>