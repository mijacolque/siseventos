<?php error_reporting(0); ?>
<?php 
include('admin/conexion.php');

$fechavisita=date('j-m-y');
$hora = date("H:i:s");  

$regvisitas=mysqli_query($conexion,"select nrovisitas from visitas") or
  die("Problemas en el select ver".mysqli_error($conexion));

while ($reg=mysqli_fetch_array($regvisitas))
{
  $visitas=$reg[0];

}

$visitas=$visitas+1;
mysqli_query($conexion,"insert into visitas(fecha,hora,nrovisitas) values ('$fechavisita','$hora',$visitas)") or
  die("Problemas en el select insert".mysqli_error($conexion));
mysqli_close($conexion);

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
    
</head>
<body>
    <!-- Whole page container -->
    <div class="page-container">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-0 fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse p-o" id="navbarNav">
                <ul class="navbar-nav mx-auto d-flex align-items-center p-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                
             <!--   <li class="nav-item">
                    <a class="nav-link" href="#people-showcase">Expositores</a>
                </li> -->
                
               <li class="nav-item">
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

          <!-- bienvenidas section -->
        <section id="bienvenidas-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 bienvenidas-bg"></div>
                    <div class="col-md-7">
                    	<?php
                    		$hoy= date('j');
                    		$fe=4;
                 
                    		$fech=$fe-$hoy;
                    		if($fech==0)
                    		{
                    			echo '<h3 class="text-right p-4">Hoy a las <span class="green-clr">19:30</span></h3>';
                    		}
                    		else{

                    			echo ' 	<h3 class="text-right p-4">Faltan <span class="green-clr">'.$fech.'</span> d&iacute;a(s)</h3>';

                    		}
                    	?>
 					<!--	<h3 class="text-right p-4">Faltan <span class="green-clr"><?php $hoy= date('j'); echo 4-$hoy ;
 ?></span> d&iacute;a(s)</h3>-->
                        <div class="py-5">
                            <h2 class="py-3 " style="color: #000;">Bienvenida/o :</h2>
                        <p align="justify">
                            La Vicepresidencia del Estado Plurinacional de Bolivia les da la bienvenida al Seminario Internacional: “Comunicación y Revolución en RR. SS.” a desarrollarse el día 4 de diciembre a horas 19:00, en el Auditorio del Banco Central de Bolivia en la ciudad de La Paz.
                        </p>
                        <p align="justify">
                           El mismo contará con la presencia de Mario Riorda, consultor en estrategia y comunicación política, y de Ángel Beccassino, estratega de comunicación política, periodista y publicista. Comentará el vicepresidente Álvaro García Linera.   
                        </p>
                        <p align="justify">
                           Esperamos que este seminario nos permita reflexionar sobre la construcción colectiva de respuestas a los desafíos planteados por los nuevos mecanismos de propaganda y difusión de contenidos electorales y mediáticos, para resguardar la democracia y el acceso veraz a la información de todas y todos los ciudadanos en nuestro país.
                        </p>
                        <p>
                            Los esperamos.
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- People section -->
        <div id="people-showcase" class="d-flex align-items-center">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 people-col ">
                        <div class="person-title">
                            <h2 class="text-black">Exponen :</h2>
                        </div>
                        <div class="person-pic">
                            <a href="expositores.html#winnie-byanyima-section"><img class="img-fluid" src="images/mario.jpg" ></a>
                        </div>
                        <div class="person-name text-center mt-5">
                            <h3 class="text-black">Mario Riorda</h3>
                            <p align="justify" style="color: #000;">Presidente de ALICE (Asociación Latinoamericana de Investigadores en Campañas Electorales), Director de la maestría de comunicación política, escuelas de posgrados en comunicación de la Universidad Austral, ha escrito 15 libros sobre comunicación política, es conductor y coproductor de la serie documental “En el nombre del pueblo”.</p>
                        </div>
                    </div>

                     <div class="col-md-4 people-col ">
                        <div class="person-title">
                            <h2 class="text-white"></h2>
                        </div>
                        <div class="person-pic">
                            <a href="expositores.html#winnie-byanyima-section"><img class="img-fluid" src="images/angel.jpg" ></a>
                        </div>
                        <div class="person-name text-center mt-5">
                            <h3 class="text-black">Ángel Beccassino</h3>
                            <p align="justify" style="color: #000;">Conferencista habitual en congresos y cumbres mundiales de comunicación política y coautor del libro sobre este tema, premiado en los Victory Awards 2016, Washington Academy of Political Arts and Sciences.  Creador de transgresoras campañas para gobiernos y proyectos políticos en diversos países, es autor del libro “Los Estados Unidos de Trump”.</p>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="col-md-6 people-col">
                            <div class="person-title">
                                <h2 class="text-black mr-3">Comenta</h2>
                            </div>
                            <div class="person-pic">
                                <img class="img-fluid" src="images/alvaro.jpg" >
                            </div>
                            <div class="person-name text-center mt-5">
                                <h3 class="text-black">Álvaro Garcia Linera</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- registrate-section -->
        <div class="col-md-6  registrate-sm-bg mx-auto">
        </div>
        <div id="registrate-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mr-auto d-flex justify-content-center text-center">
                        <div class="registrate-img d-flex align-items-center ">
                                <a class="registrate-btn" href="inscripciones.php#register-section" role="button">
                                        <h1 align="center" style="font-size:100px ">Regístrate</h1>
                                    </a>
                        </div>
                    </div>
                    <div class="col-md-6 registrate-2nd-col">

                    </div>
                    
                    
                </div>
            </div>
        </div>

        <!-- notacias section -->
    <!--    <div id="noticias-section" class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6">
                            
                        <h1 class="py-2">Noticias</h1>
                        <div class="noticias-img">
                            <img class="img-fluid" src="images/noticias-img.jpg" alt="">
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                            <h2 class="text-right orange-clr pb-3">+Noticias</h2>
                            <h2>LA SEDE DEL SEMINARIO SERA EN LA PAZ</h2>
                            <h2 class="orange-clr">4/09/17</h2>
                            La Vicepresidencia del Estado Plurinacional de Bolivia, el Banco Mundial, el Programa de Naciones Unidas para el Desarrollo (PNUD) y Oxfam International les dan la bienvenida al 1er Seminario Internacional de Desigualdad a desarrollarse el día 19 de octubre  en la ciudad de Cochabamba Bolivia.
                            <p>La Vicepresidencia</p>
                            <h2 class="text-right orange-clr pb-3">Ver mas</h2>
                    </div>
                    
                </div>
            </div>
        </div>-->

        <!-- llegar-section -->
        


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
