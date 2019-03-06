<?php error_reporting(0); ?>
<?php 
include('/admin/conexion.php');

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
    <title>Seminario Internacional Desigualdad en el Mundo 2018</title>
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
                
                <li class="nav-item">
                    <a class="nav-link" href="#people-showcase">Expositores</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="inscripciones.php#register-section-form">Registro de Participantes</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="comollegar.php">¿Cómo llegar?</a>
                </li>
       
                
                <li class="facebook-icon text-center">
                    <a class="nav-link" href="https://www.facebook.com/events/195400321349480/"><i class="fab fa-facebook-f"></i></a>
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
                        <h3 class="text-right p-4">Faltan <span class="green-clr"><?php $hoy= date('j'); echo 23-$hoy;
 ?></span> d&iacute;as</h3>
                        <div class="py-5">
                            <h2 class="py-3 ">Bienvenidas/os</h2>
                        <p align="justify">
                            La Vicepresidencia del Estado Plurinacional de Bolivia, Oxfam International, Banco Mundial y el Programa de Naciones Unidas para el Desarrollo (PNUD), les dan la bienvenida al Seminario Internacional de Desigualdad 2018 a desarrollarse el día 23 de noviembre a horas 19:00, en el Hall de la Vicepresidencia de la ciudad de La Paz, Bolivia..
                        </p>
                        <p align="justify">
                            El mismo busca ser un camino de reflexión y encuentro que contribuya a evaluar los avances alcanzados en Bolivia y el mundo, además repensar estrategias para el abordaje de esta problemática de manera integral.    
                        </p>
                        <p align="justify">
                            Esperamos que este seminario nos permita trabajar en la construcción colectiva de respuestas a estos desafíos para resguardar los avances alcanzados y fortalecer la actual promoción del desarrollo sostenible y del Vivir Bien.
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
                    <div class="col-md-6 people-col ">
                        <div class="person-title">
                            <h2 class="text-white">Expone</h2>
                        </div>
                        <div class="person-pic">
                            <a href="expositores.html#winnie-byanyima-section"><img class="img-fluid" src="images/winni.jpg" ></a>
                        </div>
                        <div class="person-name text-center mt-5">
                            <a href="expositores.html#winnie-byanyima-section"><h3 class="text-white">Winnie Byanyima</h3></a>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="col-md-6 people-col">
                            <div class="person-title">
                                <h2 class="text-white mr-3">Comenta</h2>
                            </div>
                            <div class="person-pic">
                                <img class="img-fluid" src="images/alvaro.jpg" >
                            </div>
                            <div class="person-name text-center mt-5">
                                <h3 class="text-center text-white pl-3">&Aacute;lvaro Garc&iacute;a Linera</h3>
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
                                        <img class="img-fluid" src="images/boton-registrate-02.png" alt="">
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
        
        <div id="llegar-section" class="d-flex align-items-center">
            <div class="container ">
                    <h1 class="text-white d-flex align-self-center"> <a href="comollegar.php" style="color: #fff;">¿Cómo llegar?</a></h1>
            </div>
        </div>

        <!-- main footer -->
        <footer id="main-footer" class="py-5">
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                            <img class="img-fluid" src="images/footer-logo-1.png" alt="">
                    </a>
                </div>
                <div class="col-md-3">
                        <a href="#">
                                <img class="img-fluid" src="images/footer-logo-2.png" alt="">
                        </a>
                </div>
                <div class="col-md-3">
                        <a href="#">
                                <img class="img-fluid" src="images/footer-logo-3.png" alt="">
                        </a>
                </div>
                <div class="col-md-3">
                        <a href="#">
                                <img class="img-fluid" src="images/footer-logo-4.png" alt="">
                        </a>
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