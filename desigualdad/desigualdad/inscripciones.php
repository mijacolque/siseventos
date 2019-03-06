<?php
header ("Location: index.php");
?>
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
        
        if(!empty($_POST['consultar']))
        {

            $ci=$_POST['carnet'];
            $fn=$_POST['fechanac'];
            $edad=2018-date("Y", strtotime($fn)); 
  

            $consulta="https://test.agetic.gob.bo/ea/api/v1/personas?ci=".$ci."&fecha_nacimiento='".$fn."'";

            $header= array();
            $header[]='Authorization: Token token=3dc6e48c8c91e4b61cf3490b96c0cbe0142537285c89b63daf940992c36891d8931244a7d36892102aa88ed88a61f8c5c2716077841ee89639926001f27b8cb6';

            $curl=curl_init();

            /*curl_setopt($curl, CURLOPT_URL,"https://test.agetic.gob.bo/ea/api/v1/personas?ci=6496384&fecha_nacimiento='10-12-1987'");*/

            curl_setopt($curl, CURLOPT_URL,$consulta);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,$header);

            

            $result=curl_exec($curl);
            curl_close($curl);

            $result=json_decode($result,true);

            //print_r($result);
 

            $nombres=$result['personas'][0]['nombres'];
   
            $apellidos=$result['personas'][0]['paterno'].' '.$result['personas'][0]['materno'];
            $nacimiento=$result['personas'][0]['fecha_nacimiento'];





        }


?>

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

    	if(!empty($_POST['carnet']))

    	{



        $carnet=strtoupper(trim($_POST['carnet']));
        $nombres=ucwords($_POST['nombres']);
        $apellidos=ucwords($_POST['apellidos']);
        $fecha_nac=$_POST['fechanac'];
        $sexo=$_POST['sexo'];
        $edad=$_POST['edad'];
        $correo=strtolower($_POST['correo']);
        $celular=$_POST['celular'];
        $ciudad=$_POST['ciudad'];
        $grado=$_POST['grado'];
        $profesion=$_POST['profesion'];
        $institucion=strtoupper(utf8_decode($_POST['institucion']));
        $institucion2=strtoupper($_POST['institucion']);

        $nombrecompleto='Nombre completo : '.$nombres.' '.$apellidos;
        $cipdf='Carnet de Identidad : '.$carnet;
        $correopdf='Correo electrónico : '.$correo;

        $url = $carnet;

        QRcode::png($url,"qr.png",QR_ECLEVEL_L,3,1);

        $pdf = new FPDF();
        $pdf->AddFont('AvenirLTStd-Roman','','AvenirLTStd-Roman.php');
        $pdf->AddPage('P');

        $pdf->Image('fondo.jpg',0,0,210,300);
        $pdf->SetFont('AvenirLTStd-Roman','U',18);
        $pdf->SetTextColor(53,119,148);
        //$pdf->Cell(200,110,utf8_decode('Formulario de inscripción'),0,0,'C');
        //$pdf->Text(40,45,'Seminario Desigualdad en el Mundo 2018',0,0,'C');
        $pdf->SetFont('AvenirLTStd-Roman','',14);

        $pdf->Text(30,170,$cipdf,0,0,'C');
        $pdf->Text(30,180,utf8_decode($nombrecompleto),0,0,'C');
        $pdf->Text(30,190,utf8_decode($correopdf),0,0,'C');
        //$pdf->Text(30,210,utf8_decode($fecha),0,0,'C');
        //$pdf->Text(30,230,utf8_decode($hora),0,0,'C');
        $pdf->SetFont('AvenirLTStd-Roman','',11);
        $pdf->Text(35,240,utf8_decode('No olvides llevar tu código QR,  ya que la información provista en el mismo servirá '),0,0,'C');
        $pdf->Text(45,245,utf8_decode('para que podamos verificar tu ingreso y participación el día del evento. '),0,0,'C');
    
        $pdf->Image('qr.png',70,80,70,70);

        $pdf->Output('inscripcion.pdf');

        $mail=new PHPMailer();
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
          <p align="justify">Gracias por inscribirte al Seminario de Desigualdad en el Mundo 2018. Te esperamos el día <strong>23 de noviembre a horas 19:00, en el Hall de la Vicepresidencia del Estado Plurinacional de Bolivia</strong>.
        </p>

        <p>Enviamos adjunto a este correo un código<strong> QR PERSONAL</strong>, que debes <strong>guardar, imprimir o tomarle una foto con tu celular</strong>, para que podamos verificar tu ingreso y participación el día del evento.</p>

        <p>Es importante que llegues <strong>15 minutos antes</strong> para que puedas realizar tu registro.</p>
        <p>Cualquier duda o consulta, estamos a tu disposición.</p>
        <p>Saludos,</p>
        <p>Grupo organizador</p>
        
        </body>
        </html>
        ');




        $path='inscripcion.pdf';
        $mail->addAttachment($path,'inscripcion.pdf', $encoding='base64', $type='.pdf');
        
        //$mail->addAttachment($dest);
        $mail->IsHTML(true);
        
        $mail->send();

        /*$conexion=mysqli_connect("localhost","fona","fona","desigualdad") or
    die("Problemas con la conexión");*/

            $conexion=mysqli_connect("localhost","desigualdad","ej2Ieg4beChei6Io1iefugoori7eey3Wee9quohg","desigualdad_web") or
    die("Problemas con la conexión");

    $nombresbd=utf8_decode($nombres);
    $apellidosbd=utf8_decode($apellidos);
    $gradobd=utf8_decode($grado);
    $profesionbd=utf8_decode($profesion);
    $institucionbd=utf8_decode($institucion2);

mysqli_query($conexion,"insert into inscritos(ci,fecha_nac,nombres,apellidos,sexo,edad,email,ciudad,estudios_alcanzados, profesion,institucion,fecha,hora) values ('$carnet','$fecha_nac','$nombresbd','$apellidosbd','$sexo','$edad','$correo','$ciudad','$gradobd','$profesionbd','$institucionbd','$fecha','$hora')") or
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
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="expositores.html">Expositores</a>
                </li>
                
                <li class="nav-item active">
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

          <!-- register-section -->
          <div id="register-section" class="bg-light py-5">
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

                                <form action="inscripciones.php#form" method="POST" name="verificar" >
                                        <div class="form-row b-none">
                                          <div class="form-group col-md-6">
                                            <label>Número de carnet de Identidad</label>
                                            <input type="number" class="form-control" name="carnet" value="<?php if(!empty($_POST['consultar'])) {echo $ci;}?>" required placeholder="Ejemplo: 4158987" >
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" class="form-control" name="fechanac" value="<?php if(!empty($_POST['consultar'])) {echo $fn;}?>" required placeholder="15-03-1970" >
                                          </div>
                                        <div class="form-group col-md-12">
                                           <input type="submit" name="consultar" value="Verificar" style="background-color: #104d64; color: #fff; width: 130px; height: 50px; font-size: 20px; " >
                                             <!--<button type="submit" class="btn btn-blue px-4">VERIFICAR</button>-->

                                          </div>
                                        </div>
                                </form>    
                                <form action="inscripciones.php#form" method="POST" >
                                         <div class="form-row b-none">
                                          <div class="form-group col-md-6">
                                            <label for="inputnumber4">Nombres</label>
                                            <input type="hidden" name="carnet" value="<?php if(!empty($_POST['consultar'])) {echo $ci;}?>" >
                                             <input type="hidden" name="fechanac" value="<?php if(!empty($_POST['consultar'])) {echo $fn;}?>" >
                                            <input type="text" class="form-control" name="nombres" name="nombres" required value="<?php if(!empty($_POST['consultar'])) {echo $nombres;}?>"   >
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos" required  value="<?php if(!empty($_POST['consultar'])) {echo $apellidos;}?>"  >
                                          </div>


                                        </div>


                                        <div class="form-row">


                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Correo electrónico</label>
                                            <input type="text" class="form-control" name="correo" required >
                                            </div>
                                        </div>
                                        

                                        <div class="form-row">
                                                
                                        <div class="form-group col-md-6">
                                        
                                        </div>
                        
                                        
                                        

                                        <div class="form-row">
                                                
                                        <div class="form-group col-md-12">
                                            
                            
                                            
                                        </div>
                                        
                                        <div class="form-row">         
                                            
                                    
                        </div>
                        

                        <p><small>Los datos proporcionados serán utilizados unicamente para fines del Seminario Internacional Desigualdad en el Mundo 2018.</small></p>
                                        
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
