<?php 

  header ("Location: http:index.php");
  echo $h;

 ?>
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
        
        if(!empty($_POST['consultar']))
        {

            $ci=$_POST['carnet'];
            $edad=$_POST['edad'];

  

            $registros=mysqli_query($conexion,"select ci,nombres,apellidos,edad,email from bd_eventos where ci='$ci'") or
  die("Problemas en el select:".mysqli_error($conexion));

            while ($reg=mysqli_fetch_array($registros))
            {

                $ci=$reg[0];
                $edad=$reg[3];
                $nombres=utf8_decode($reg[1]);
                $apellidos=utf8_decode($reg[2]);
                $email=$reg[4];
            }

        }


?>

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
        $nombres=ucwords($_POST['nombres']);
        $apellidos=ucwords($_POST['apellidos']);
       
        $sexo=$_POST['sexo'];
        $edad=$_POST['edad'];
        $correo=strtolower($_POST['correo']);
        $celular=$_POST['celular'];
  


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
    //$mail->AddCC($email_1);
    $mail->AddBCC($email_1);
    $mail->Username='eventos@vicepresidencia.gob.bo';   
    $mail->Password='Ev3nt0svpr2018';
        //$mail->SMTPSecure='tls';
    $mail->Port=25;
        //$mail->SMTPSecure='tls';
       

        $mail->setFrom('eventos@vicepresidencia.gob.bo','EVENTOS VICEPRESIDENCIA');
        $mail->addAddress($correo);
        $mail->Subject='Seminarios Internacionales Vicepresidencia';

        $mail->Body=utf8_decode('
        <html>
        <head>
          <title>Seminario Internacional: Comunicación y Revolución en RRSS</title>
        </head>
        <body>
          
          <p>¡Hola! ').utf8_decode($nombres).utf8_decode(' :</p>
          <p align="justify">Gracias por inscribirte al Seminario Internacional: Comunicación y Revolución en RRSS. Te esperamos el día <strong>4 de diciembre a horas 19:00, en el Auditorio del Banco Central de Bolivia </strong>.
        </p>

        <p>Enviamos adjunto a este correo un código<strong> QR PERSONAL</strong>, que debes <strong>guardar, imprimir o tomarle una foto con tu celular</strong>, para que podamos verificar tu ingreso y participación el día del evento.</p>

        <p>Es importante que llegues <strong>30 minutos antes</strong> para que puedas realizar tu registro.</p>
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

            $conexion=mysqli_connect("localhost","mcolquehuanca","eequ0subaifoungohje4ookeel6kay5Equ4thahn","eventos_vicepresidencia") or
    die("Problemas con la conexión");

    $nombresbd=utf8_decode($nombres);
    $apellidosbd=utf8_decode($apellidos);


mysqli_query($conexion,"insert into inscritos(ci,nombres,apellidos,sexo,edad,email,celular,fecha,hora) values ('$carnet','$nombresbd','$apellidosbd','$sexo','$edad','$correo','$celular','$fecha','$hora')") or
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

                                <form action="inscripciones.php#form" method="POST" name="verificar" >
                                        <div class="form-row b-none">
                                          <div class="form-group col-md-6">
                                            <label>Número de carnet de Identidad</label>
                                            <input type="number" class="form-control" name="carnet" value="<?php if(!empty($_POST['consultar'])) {echo $ci;}?>" required placeholder="Ejemplo: 4158987" >
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label>Edad</label>
                                            <input type="number" class="form-control" name="edad" value="<?php if(!empty($_POST['consultar'])) {echo $edad;}?>" required  >
                                          </div>
                                        <div class="form-group col-md-12">
                                           <input type="submit" name="consultar" value="Verificar carnet de identidad" style="background-color: #104d64; color: #fff; width: 300px; height: 50px; font-size: 20px; " >
                                             <!--<button type="submit" class="btn btn-blue px-4">VERIFICAR</button>-->

                                          </div>
                                        </div>
                                </form>    
                                <form action="inscripciones.php#form" method="POST" >
                                         <div class="form-row b-none">
                                          <div class="form-group col-md-6">
                                            <label for="inputnumber4">Nombres</label>
                                            <input type="hidden" name="carnet" value="<?php if(!empty($_POST['consultar'])) {echo $ci;}?>" >
                                             <input type="hidden" name="edad" value="<?php if(!empty($_POST['consultar'])) {echo $edad;}?>" >
                                            <input type="text" class="form-control" name="nombres" name="nombres" required value="<?php if(!empty($_POST['consultar'])) {echo $nombres;}?>"   >
                                          </div>
                                          <div class="form-group col-md-6">
                                            <label>Apellidos</label>
                                            <input type="text" class="form-control" name="apellidos" required  value="<?php if(!empty($_POST['consultar'])) {echo $apellidos;}?>"  >
                                          </div>


                                        </div>


                                        <div class="form-row">

                                            <div class="form-group col-md-6" style="color: #104d64;">
                                                    <label for="inputZip" class="radio-label">Sexo</label>
                                                    <input type="radio" name="sexo" class="radio-input" required value="Masculino" > Masculino
                                                    <input type="radio" name="sexo" class="radio-input" value="Femenino" > Femenino
                                            </div>

                                            <div class="form-group col-md-6">
                                            <label for="inputCity">Correo electrónico</label>
                                            <input type="text" class="form-control" name="correo" value="<?php if(!empty($_POST['consultar'])) {echo $email;}?>" required >
                                            </div>
                                        </div>

                                        
                                        <div class="form-row">         
                                            <div class="form-group col-md-12">
                                                <label >Número de Celular</label>
                                                <input type="text" class="form-control" name="celular" required  >
                                                 <input type="hidden" class="form-control" name="edad" value="<?php if(!empty($_POST['consultar'])) {echo $edad;}?>"  >
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
