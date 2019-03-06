<?php error_reporting(0); ?>
<?php 
include('admin/conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seminario Internacional: Comunicación y Revolución en RRSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap css file -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Custom css file -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="sweetalert.min.js"></script>

    
</head>
<body>

<?php 


$email_1='mijacolque@gmail.com ';
require('fpdf/fpdf.php');
require 'phpqrcode/qrlib.php';
require 'phpmailer/PHPMailerAutoload.php';

//Fecha y hora 

$fecha=date('j-m-y');
$hora=date('h-i-s');
$hoy= date('j');




    if(!empty($_POST['enviar']))
    {

    	if(!empty($_POST['carnet']))

    	{



        $carnet=strtoupper(trim($_POST['carnet']));
        $nombrecompleto=ucwords($_POST['nombrecompleto']);

        $contacto=strtolower($_POST['contacto']);
        
  

        /*$conexion=mysqli_connect("localhost","fona","fona","desigualdad") or
    die("Problemas con la conexión");*/

            $conexion=mysqli_connect("localhost","mcolquehuanca","eequ0subaifoungohje4ookeel6kay5Equ4thahn","eventos_vicepresidencia") or
    die("Problemas con la conexión");

    $nombresbd=utf8_decode($nombrecompleto);



mysqli_query($conexion,"insert into inscritos(ci,nombres,apellidos,sexo,edad,email,celular,fecha,hora) values ('$carnet','$nombresbd','','','','$contacto','','$fecha','$hora')") or
  die("Problemas en el select".mysqli_error($conexion));



  mysqli_query($conexion,"insert into asistentes_seminario(ci,hora) values ('$carnet','$hora')") or
  die("Problemas en el select".mysqli_error($conexion));
		

		mysqli_close($conexion);


		



        echo '<script>
        swal("Registro realizado con éxito","Por favor revise su correo electrónico","success")
            .then((value) => {
              window.location="index.php";}
        );</script>';


    }
    else
    {

    	    	        echo '<script>
        swal("Error","Por favor ingrese su número de Carnet de Identidad y/o su Fecha de Nacimiento.","error")
            .then((value) => {
              window.location="inscripciones.php";}
        );</script>';
    }

}

  

 ?>



    <!-- Whole page container -->
    <div class="page-container">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-0 fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-o" id="navbarNav">
                <ul class="navbar-nav mx-auto d-flex align-items-center p-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                
             <!--   <li class="nav-item">
                    <a class="nav-link" href="#people-showcase">Expositores</a>
                </li> -->
                
               <li class="nav-item active">
                    <a class="nav-link" href="inscripciones.php">Registro de Participantes</a>
                </li> 
                
               <!--  <li class="nav-item">
                    <a class="nav-link" href="comollegar.php">¿Cómo llegar?</a>
                </li>-->
       
                
                <li class="facebook-icon text-center">
                    <a class="nav-link" href="https://www.facebook.com/events/254985635172092/"><i class="fab fa-facebook-f"></i></a>
                </li>
                </ul>
            </div>
        </nav>

        <!-- seminar showcase -->
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/banners-web-01.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/banners-web-02.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/banners-web-03.png" alt="Third slide">
              </div>
            </div>
          </div>

          <!-- register-section -->
          <div class="register-section-form" id="form">
                          <div class="register-section-header">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-10">
                              <h2 class="blue-clr"><strong>Formulario de Registro</strong></h2>
                              <p align="justify">Para que tu inscripción sea registrada correctamente, por favor, completa los siguientes datos:</p>
                              <p align="justify">Recuerda que esta información servirá para la generación y envío online del certificado después de tu participación en el evento. Adicionalmente recibirás la confirmación vía correo electrónico.</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="register-section-form" id="form">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-7">

                                <form action="inscripciones12.php" method="POST" name="verificar" >
                                        <div class="form-row b-none">
                                          <div class="form-group col-md-6">
                                            <label>Número de carnet de Identidad</label>
                                            <input type="number" class="form-control" name="carnet" value="" required placeholder="Ejemplo: 4158987" >
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label for="inputnumber4">Nombre Completo</label>
                                            
                                            <input type="text" class="form-control" name="nombrecompleto"  required placeholder="Juan Poma"  >
                                          </div>

                                        </div>


                                        <div class="form-row">

                                          

                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Correo electrónico/Teléfono</label>
                                            <input type="text" class="form-control" name="contacto"  required >
                                            </div>

                                          
                                        </div>

                                        
            
                        

                        <p><small>Los datos proporcionados serán utilizados unicamente para fines del Seminario Internacional: Comunicación y Revolución en RRSS.</small></p>
                                        
                                        <div class="form-group text-center">
                                               <input type="submit" name="enviar" value="Inscribirse" style="background-color: #104d64; color: #fff; width: 180px; height: 60px; font-size: 20px; ">

                                        </div>
                                      </form>

                          </div>
                          <div class="col-md-5 form-bg"></div>
                      </div>
                  </div>
              </div>
          </div>

          
        <!-- main footer -->
<footer id="main-footer" class="py-5">
            <div class="row">
                <div class="col-md-12">
                    
                            <h4 align="center">© Vicepresidencia del Estado Plurinacional de Bolivia</h4>
                    
                </div>
                
            </div>
        </footer>


    </div>
    <!-- Whole page container end -->
    
    <!-- jQuery cdn -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- Bootstrap js file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Main js file -->
    <script src="js/main.js"></script>
</body>
</html>
