<?php error_reporting(0); ?>
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
    <script src="sweetalert.min.js"></script>

    
</head>
<body>

<?php 

$email_1='eventos@vicepresidencia.gob.bo';
$email_2='mijacolque@gmail.com ';
require('fpdf/fpdf.php');
require 'phpqrcode/qrlib.php';
require 'phpmailer/PHPMailerAutoload.php';

//Fecha y hora 

$fecha=date('j-m-y');
$hora=date('h-i-s');
$hoy= date('j');




    if(!empty($_POST['enviar']))
    {


    	$ci=$_POST['ci'];
    	$p1=$_POST['p1'];
    	$p2=$_POST['p2'];
    	$p31=$_POST['p31'];
    	$p32=$_POST['p32'];
    	$p33=$_POST['p33'];
    	$p34=$_POST['p34'];
    	$p35=$_POST['p35'];
    	$p36=$_POST['p36'];

    	$p4=$_POST['p4'];
    	$p5=$_POST['p5'];
    	$p6=$_POST['p6'];
    	$p7=$_POST['p7'];
    	$p8=$_POST['p8'];

        
     /*   $mail=new PHPMailer();
        $mail->isSMTP();

        $mail->Host='mail.vicepresidencia.gob.bo';
        $mail->SMTPAuth=true;
        $mail->AddCC($email_1);
        $mail->AddBCC($email_2);
        $mail->Username='eventos@vicepresidencia.gob.bo';   
        $mail->Password='Ev3nt0svpr2018';
        //$mail->SMTPSecure='tls';
        $mail->Port=25;

        $mail->setFrom('eventos@vicepresidencia.gob.bo','EVENTOS VICEPRESIDENCIA');
        $mail->addAddress($correo);
        $mail->Subject='Seminario Internacional Desigualdad en el Mundo 2018';

        $mail->Body=utf8_decode('
        <html>
        <head>
          <title>Seminario Internacional Desigualdad en el Mundo 2018</title>
        </head>
        <body>
          
          <p>¡Hola! ').utf8_decode($nombres).utf8_decode(' :</p>
          <p align="justify">Muchas gracias por su participación en el Seminario Internacional Desigualdad en el Mundo 2018. Le informamos que puede acceder a las fotos del evento a través de nuestro sitio web:</strong>.
        </p>

        <p>Asimismo, antes de enviarle su certificado de participación, le solicitamos su colaboración en una encuesta de evaluación del evento. La recolección de esta información tiene como fin mejorar el desarrollo del próximo Seminario Internacional Desigualdad en el Mundo 2019 y generar conocimientos colectivos que contribuyan a seguir pensando juntos respuestas para el abordaje de estas problemáticas en Bolivia. </p>

        <p>Acceda click aquí para acceder a la encuesta o ingrese al siguiente link: https://www.desigualdad.bo/encuesta.php?am='.$ci*3.' .</p>
        <p>Desde ya, muchas gracias por su cooperación</p>
        <p>Esperamos contar con su presencia en el próximo seminario. </p>
        <p>Saludos,</p>
        <p>Grupo organizador</p>
        
        </body>
        </html>
        ');
        
        //$mail->addAttachment($dest);
        $mail->IsHTML(true);
        
        $mail->send();*/

       /* $conexion=mysqli_connect("localhost","mijacolque","mija162911","desigualdad") or
    die("Problemas con la conexión");*/

          $conexion=mysqli_connect("localhost","desigualdad","ej2Ieg4beChei6Io1iefugoori7eey3Wee9quohg","desigualdad_web") or
    die("Problemas con la conexión");

    $p2bd=utf8_decode($p2);
    $p5bd=strtoupper(utf8_decode($p5));
    $p7bd=strtoupper(utf8_decode($p7));
    $p8bd=strtoupper(utf8_decode($p8));


mysqli_query($conexion,"insert into encuesta(ci,p1,p2,p31,p32,p33,p34,p35,p36,p4,p5,p6,p7,p8) values ('$ci','$p1','$p2bd','$p31','$p32','$p33','$p34','$p35','$p36','$p4','$p5bd','$p6','$p7bd','$p8bd')") or
  die("Problemas en el select".mysqli_error($conexion));
		

		mysqli_close($conexion);


		



        echo '<script>
        swal("Muchas gracias","Encuesta realizada con éxito","success")
            .then((value) => {
              window.location="index.php";}
        );</script>';



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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="expositores.html">Expositores</a>
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

          </div>

          <!-- register-section -->
          <div id="register-section" class="bg-light py-5">
              <div class="register-section-header">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-10">
                              <h2 class="blue-clr"><strong>Encuesta de satisfacción</strong></h2>
                              <p align="justify">Bienvenidos/as :</p>
                              <p align="justify">La presente encuesta tiene como propósito conocer la percepción de los y las participantes respecto al Seminario y mirada sobre la desigualdad en Bolivia. </p>
                              <p align="justify">La información será utilizada sólo con fines estadísticos que serán plasmados en un documento de lecciones aprendidas sobre el presente seminario.  </p>
                              <p align="justify">Gracias por su cooperación. </p>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="register-section-form" id="form">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-7">

                           
                                <form action="encuesta.php#form" method="POST" >
                                         <div class="form-row b-none">
                                          <div class="form-group col-md-6">
                                            <label for="inputnumber4">1. ¿Asistió al seminario ?</label></br></br>
                                            <h4>Si <input type="radio" name="p1" value="SI" required > &nbsp;&nbsp;<a href="index.php" style="color: #000;">NO</a></h4> 
                                             <input type="hidden" name="ci" value="<?php echo $_REQUEST['am']/3; ?>">
                                            
                                          </div>



                                        </div>


                                        <div class="form-row">

                                            <div class="form-group col-md-6" style="color: #104d64;">
                                                    <label for="inputZip" class="radio-label">2.¿Cómo supo del evento?</label>
                                                    <input type="radio" name="p2" class="radio-input" required required value="Difusión en aulas universitarias" > Difusión en aulas universitarias</br>
                                                    <input type="radio" name="p2" class="radio-input" required value="Facebook" required > Facebook</br>

                                                   <input type="radio" name="p2" class="radio-input" required value="Twitter" required > Twitter</br>
                                                   <input type="radio" name="p2" class="radio-input" required value="Página web" required > Página web</br>
                                                   <input type="radio" name="p2" class="radio-input" required value="Spot publicitario" required > Spot publicitario</br>
                                                   <input type="radio" name="p2" class="radio-input" required value="Radio" required > Radio</br>
                                                   <input type="radio" name="p2" class="radio-input" required value="Afiches" required > Afiches</br>
                                            </div>

                                            <div class="form-group col-md-6" style="color: #104d64;">
												</br><input type="radio" name="p2" class="radio-input" required value="Prensa escrita(Periódicos)" required > Prensa escrita(Periódicos)</br>
												<input type="radio" name="p2" class="radio-input" required value="Whatsapp" required > Whatsapp</br>
												<input type="radio" name="p2" class="radio-input" required value="Registro en universidades" required > Registro en universidades</br>
												<input type="radio" name="p2" class="radio-input" required value="Correo electrónico" required > Correo electrónico</br>
												<input type="radio" name="p2" class="radio-input" required value="Entrevistas televisivas" V > Entrevistas televisivas</br>
												<input type="radio" name="p2" class="radio-input" required value="Amigos/conocidos" required > Amigos/conocidos</br>
												<input type="radio" name="p2" class="radio-input" required value="Otro" required > Otro</br>
                                            </div>
                                        </div>
                                        

                                        <div class="form-row">
                                                
                                        <div class="form-group col-md-12">
                                        <label>3. Por favor valore los siguientes aspectos del evento:</label></br></br>
                                        <label>- Facilidad para inscribirese en el evento via web :</label></br>
                                        </div>

                        
                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p31" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p31" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p31" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p31" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p31" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        <div class="form-group col-md-12">
                                        
                                       
                                        <label>- Información previa sobre detalles prácticos del evento :</label></br>
                                        </div>

                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p32" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p32" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p32" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p32" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p32" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                          <div class="form-group col-md-12">
                                        
                                       
                                        <label>- Calidad de las instalaciones :</label></br>
                                        </div>

                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p33" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p33" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p33" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p33" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p33" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        <div class="form-group col-md-12">
                                        
                                       
                                        <label>- Puntualidad :</label></br>
                                        </div>

                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p34" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p34" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p34" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p34" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p34" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        <div class="form-group col-md-12">
                                        
                                       
                                        <label>- Contenido de las presentaciones :</label></br>
                                        </div>

                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p35" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p35" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p35" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p35" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p35" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        <div class="form-group col-md-12">
                                        
                                       
                                        <label>- Seminario en general :</label></br>
                                        </div>

                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p36" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p36" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p36" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p36" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p36" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        </div>
                                        

                                        <div class="form-row">
                                                
                                        <div class="form-group col-md-12">
                                            <label>4. ¿Recomendarías este evento a otras personas?</label></br>
                                            <h4>Si <input type="radio" name="p4" value="SI" required > No <input type="radio" name="p4" value="NO" required ></h4>
                                            </div>

                                        </div>
                                        
                                        <div class="form-row">         
                                            <div class="form-group col-md-12">
                                                <label >5. ¿Quisiera agregar alguna sugerencia para siguientes seminarios?</label>
                                                <input type="text" class="form-control" name="p5"  ></br>
                                            </div>

                                            <div class="form-group col-md-12">
                                        
                                       
                                        <label>6. ¿Cómo ve el avance del actual Gobierno de Bolivia en temas de Desigualdad? :</label></br>
                                        </div>

                                        <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p6" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p6" class="radio-input" required value="MUY BUENO" >
										 Bueno&nbsp;&nbsp;<input type="radio" name="p6" class="radio-input" required value="BUENO" > 
										 Regular&nbsp;&nbsp;<input type="radio" name="p6" class="radio-input" required value="REGULAR" > 
										 Pobre&nbsp;&nbsp;<input type="radio" name="p6" class="radio-input" required value="POBRE" > 
                                         </br> </br>

                                        </div>

                                          <div class="form-group col-md-12">
                                                <label >7. ¿Cuál considera usted que son las principales causas de Desigualdad en Bolivia ?</label></br></br>
                                                <input type="text" class="form-control" name="p7" ></br>
                                            </div>


                                          <div class="form-group col-md-12">
                                                <label >8. Comentarios</label>
                                                <input type="text" class="form-control" name="p8" ></br>
                                            </div> 
                                              
                                    
                        </div>
                        

                        <p><small>Los datos proporcionados serán utilizados unicamente para fines del Seminario Internacional Desigualdad en el Mundo 2018.</small></p>
                                        
                                        <div class="form-group text-center">
                                               <input type="submit" name="enviar" value="Enviar encuesta" style="background-color: #104d64; color: #fff; width: 250px; height: 60px; font-size: 30px; ">

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