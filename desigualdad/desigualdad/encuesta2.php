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
    <script>

    	function pdos(x)
    	{
    		if(x==0)
    		{

    			document.getElementById('p2oculto').style.display='none';
    		}

    		if(x==1)
    		{

    			document.getElementById('p2oculto').style.display='block';
    			return;
    		}

    	}

      function pcuatro(x)
      {
        if(x==0)
        {

          document.getElementById('p4oculto').style.display='none';
        }

        if(x==1)
        {

          document.getElementById('p4oculto').style.display='block';
          return;
        }

      }

      function pseis(x)
      {
        if(x==0)
        {

          document.getElementById('p6oculto').style.display='none';
        }

        if(x==1)
        {

          document.getElementById('p6oculto').style.display='block';
          return;
        }

      }

      function pocho(x)
      {
        if(x==0)
        {

          document.getElementById('p8oculto').style.display='none';
        }

        if(x==1)
        {

          document.getElementById('p8oculto').style.display='block';
          return;
        }

      }
    </script>

    
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

    	$p11=$_POST['p11'];
      $p12=$_POST['p12'];
      $p13=$_POST['p13'];
      $p14=$_POST['p14'];
      $p15=$_POST['p15'];

      if($_POST['p2']=='Otro')
      {
          $p2=$_POST['p2oculto'];
      }
      else
      {
          $p2=$_POST['p2'];
      }

      $p3=$_POST['p3'];

        if($_POST['p4']=='Otro')
      {
          $p4=$_POST['p4oculto'];
      }
      else{

        $p4=$_POST['p4'];
      }

      $p5=$_POST['p5'];

            if($_POST['p6']=='Otro')
      {
          $p6=$_POST['p6oculto'];
      }
      else{

          $p6=$_POST['p6'];
      }

      $p7=$_POST['p7'];

            if($_POST['p8']=='Otro')
      {
          $p8=$_POST['p8oculto'];
      }

      else{

        $p8=$_POST['p8'];
      }



    	$p9=$_POST['p9'];
    	$p10=$_POST['p10'];
    	$pp11=$_POST['pp11'];
    	$pp12=$_POST['pp12'];
    

        
     
          $conexion=mysqli_connect("localhost","desigualdad","ej2Ieg4beChei6Io1iefugoori7eey3Wee9quohg","desigualdad_web") or
    die("Problemas con la conexión");

    $p2bd=utf8_decode($p2);
    $p4bd=utf8_decode($p4);
    $p5bd=utf8_decode($p5);
    $p6bd=utf8_decode($p6);
    $p9bd=strtoupper(utf8_decode($p9));
    $p10bd=strtoupper(utf8_decode($p10));
    $pp12bd=strtoupper(utf8_decode($pp12));


mysqli_query($conexion,"insert into encuesta_autoridades(ci,p11,p12,p13,p14,p15,p2,p3,p4,p5,p6,p7,p8,p9,p10,pp11,pp12) values ('$ci','$p11','$p12','$p13','$p14','$p15','$p2bd','$p3','$p4bd','$p5bd','$p6bd','$p7','$p8','$p9bd','$p10bd','$pp11','$pp12bd')") or
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
                              <h2 class="blue-clr"><strong>Taller para Autoridades “Desigualdad en el Mundo 2018”</strong></h2>
                              <p align="justify">Bienvenidos/as :</p>
                              <p align="justify">La presente encuesta tiene como propósito conocer la percepción de los y las participantes respecto al Taller.</p>
                              <p align="justify">La información será utilizada sólo con fines estadísticos que serán plasmados en un documento de lecciones
aprendidas sobre el presente seminario.  </p>
                              <p align="justify">Gracias por su cooperación. </p></br>


                          </div>
                      </div>
                  </div>
              </div>
              <div class="register-section-form" id="form">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-7">

                           
                                <form action="encuesta2.php" method="POST" >
                                         <div class="form-row b-none">
                                          <div class="form-group col-md-12">
                                            
                                            <label for="inputnumber4" style="font-weight: bold;">1. ¿Cómo califica los siguientes aspectos del evento?</label></br></br>
                                            <input type="hidden" name="ci" value="<?php echo $_REQUEST['am']; ?>">
                                            <label for="inputnumber4">1.1 Puntualidad</label></br>
                                            
                                            <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p11" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p11" class="radio-input" required value="MUY BUENO" >
                     Bueno&nbsp;&nbsp;<input type="radio" name="p11" class="radio-input" required value="BUENO" > 
                     Regular&nbsp;&nbsp;<input type="radio" name="p11" class="radio-input" required value="REGULAR" > 
                     Pobre&nbsp;&nbsp;<input type="radio" name="p11" class="radio-input" required value="POBRE" > 
                                         </br> 
            
                                        </div> 

                                        <label for="inputnumber4">1.2 Organización</label></br>
                                            
                                            <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p12" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p12" class="radio-input" required value="MUY BUENO" >
                     Bueno&nbsp;&nbsp;<input type="radio" name="p12" class="radio-input" required value="BUENO" > 
                     Regular&nbsp;&nbsp;<input type="radio" name="p12" class="radio-input" required value="REGULAR" > 
                     Pobre&nbsp;&nbsp;<input type="radio" name="p12" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                         <label for="inputnumber4">1.3 Contenido de las presentaciones</label></br>
                                            
                                            <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p13" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p13" class="radio-input" required value="MUY BUENO" >
                     Bueno&nbsp;&nbsp;<input type="radio" name="p13" class="radio-input" required value="BUENO" > 
                     Regular&nbsp;&nbsp;<input type="radio" name="p13" class="radio-input" required value="REGULAR" > 
                     Pobre&nbsp;&nbsp;<input type="radio" name="p13" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                         <label for="inputnumber4">1.4 Ambientes</label></br>
                                            
                                            <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p14" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p14" class="radio-input" required value="MUY BUENO" >
                     Bueno&nbsp;&nbsp;<input type="radio" name="p14" class="radio-input" required value="BUENO" > 
                     Regular&nbsp;&nbsp;<input type="radio" name="p14" class="radio-input" required value="REGULAR" > 
                     Pobre&nbsp;&nbsp;<input type="radio" name="p14" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        <label for="inputnumber4">1.5 Evento en general</label></br>
                                            
                                            <div class="form-group col-md-12">

                                        Excelente&nbsp;&nbsp;<input type="radio" name="p15" class="radio-input" required value="EXCELENTE" >   Muy bueno&nbsp;&nbsp;<input type="radio" name="p15" class="radio-input" required value="MUY BUENO" >
                     Bueno&nbsp;&nbsp;<input type="radio" name="p15" class="radio-input" required value="BUENO" > 
                     Regular&nbsp;&nbsp;<input type="radio" name="p15" class="radio-input" required value="REGULAR" > 
                     Pobre&nbsp;&nbsp;<input type="radio" name="p15" class="radio-input" required value="POBRE" > 
                                         </br> 

                                        </div> 

                                        <label for="inputnumber4" style="font-weight: bold;">2. ¿Cómo le gustaría ser informado para siguientes talleres?</label></br></br>
                                        
                                        <input type="radio" name="p2" class="radio-input" required value="Nota oficial" onclick="pdos(0)"  required > Nota oficial</br>
                        <input type="radio" name="p2" class="radio-input" required value="Correo electrónico" onclick="pdos(0)"  required > Correo electrónico</br>
                        <input type="radio" name="p2" class="radio-input" required value="Llamada telefónica" onclick="pdos(0)" required > Llamada telefónica</br>
                        <input type="radio" name="p2" class="radio-input" required value="Esquela" onclick="pdos(0)"  required > Esquela</br> 
                        <input type="radio" name="p2" class="radio-input" required value="Otro" onclick="pdos(1)" > Otro</br>
                        <input type="text" id="p2oculto" name="p2oculto" class="form-control" style="display: none;" >
                          </br>
                         <label for="inputnumber4" style="font-weight: bold;">3. ¿Con cuanta antelación quisiera recibir la invitación?</label></br></br>

                         <div class="form-group col-md-12">

                                        1 semana&nbsp;&nbsp;<input type="radio" name="p3" class="radio-input" required value="1 semana" ></br>   2 semanas&nbsp;&nbsp;<input type="radio" name="p3" class="radio-input" required value="2 semanas" ></br>
                     3 semanas&nbsp;&nbsp;<input type="radio" name="p3" class="radio-input" required value="3 semanas" ></br> 
                     4 semanas&nbsp;&nbsp;<input type="radio" name="p3" class="radio-input" required value="4 semanas" ></br> 
                     5 semanas&nbsp;&nbsp;<input type="radio" name="p3" class="radio-input" required value="5 semanas" ></br> 
                     Mas de 5 semanas&nbsp;&nbsp;<input type="radio" name="p3" class="radio-input" required value="Mas de 5 semanas" ></br>
                                         </br> 

                                        </div> 

                    <label for="inputnumber4" style="font-weight: bold;">4. ¿Cuál es la frecuencia que sugiere para tratar temas de desigualdad: ?</label></br></br>
                  
                     <input type="radio" name="p4" class="radio-input" required value="Anual" onclick="pcuatro(0)"  required > Anual</br>
                        <input type="radio" name="p4" class="radio-input" required value="Semestral" onclick="pcuatro(0)"  required > Semestral</br>
                        <input type="radio" name="p4" class="radio-input" required value="Trimestral" onclick="pcuatro(0)" required > Trimestral</br>
                      
                        <input type="radio" name="p4" class="radio-input" required value="Otro" onclick="pcuatro(1)" > Otro</br>
                        <input type="text" id="p4oculto" name="p4oculto" class="form-control" style="display: none;" >

                        </br>
                        
                        <label style="font-weight: bold;" >5. ¿Qué otros temas específicos dentro del marco de la desigualdad desigualdad considera usted importantes para
futuros talleres?</label>
                        <input type="text" class="form-control" name="p5" ></br>
                     

                      <label for="inputnumber4" style="font-weight: bold;">6. ¿Percibe usted que información de este taller le sirvió o le servirá para el desarrollo de sus funciones recurrentes y
especificas?</label></br></br>
                  
                     <input type="radio" name="p6" class="radio-input" required value="Si" onclick="pseis(0)"  required > Si</br>

                        <input type="radio" name="p6" class="radio-input" required value="Otro" onclick="pseis(1)" > No</br>
                        <input type="text" id="p6oculto" name="p6oculto" class="form-control" style="display: none;" placeholder="¿Porque?" ></br>

                    <label style="font-weight: bold;" >7. ¿Qué día considera usted que es el mejor para que se lleve a cabo el taller?</label>
                                            
                                            <div class="form-group col-md-12">

                                       Lunes&nbsp;&nbsp;<input type="radio" name="p7" class="radio-input" required value="Lunes" >   Martes&nbsp;&nbsp;<input type="radio" name="p7" class="radio-input" required value="Martes" >
                     Miércoles&nbsp;&nbsp;<input type="radio" name="p7" class="radio-input" required value="Miercoles" > 
                     Jueves&nbsp;&nbsp;<input type="radio" name="p7" class="radio-input" required value="Jueves" > 
                     Viernes&nbsp;&nbsp;<input type="radio" name="p7" class="radio-input" required value="Viernes" > 
                     Sábado&nbsp;&nbsp;<input type="radio" name="p7" class="radio-input" required value="Sabado" > 
                                         </br> 

                                        </div> 
                  
                               <label for="inputnumber4" style="font-weight: bold;">8. ¿Cuánto considera usted una duración apropiada para el desenvolvimiento del taller:</label></br></br>
                  
                     <input type="radio" name="p8" class="radio-input" required value="2 horas" onclick="pocho(0)"  required > 2 horas</br>
                        <input type="radio" name="p8" class="radio-input" required value=" 4 horas" onclick="pocho(0)"  required > 4 horas</br>
                        <input type="radio" name="p8" class="radio-input" required value="6 horas" onclick="pocho(0)" required > 6 horas</br>

                        <input type="radio" name="p8" class="radio-input" required value="8 horas" onclick="pocho(0)" required > 8 horas</br>
                      
                        <input type="radio" name="p8" class="radio-input" required value="Otro" onclick="pocho(1)" > Otro</br>
                        <input type="text" id="p8oculto" name="p8oculto" class="form-control" style="display: none;" >

                        </br>
                                          </div>

                        <label style="font-weight: bold;" >9. ¿Qué otras instituciones considera invitar para formar parte del debate?</label>
                        <input type="text" class="form-control" name="p9" ></br></br>

                        <label style="font-weight: bold;" >10. A qué personal de la institución a la que pertenece considera usted que se debería mandar la invitación:</label>
                        <input type="text" class="form-control" name="p10" ></br></br>

                        <label for="inputnumber4" style="font-weight: bold;">11. ¿Le gustaría recibir información del evento con antelación?</label></br></br>

                         <div class="form-group col-md-12">

                                        SI&nbsp;&nbsp;<input type="radio" name="pp11" class="radio-input" required value="SI" ></br>   NO&nbsp;&nbsp;<input type="radio" name="pp11" class="radio-input" required value="NO" ></br>
                    </br>




                                                <label style="font-weight: bold;" >12. Si tiene alguna otra sugerencia sírvase escribirla a continuación:</label>
                        <input type="text" class="form-control" name="pp12" ></br>

                                        </div>


                                        
                                              
                                    
                        </div>
                        

                        <p><small>Los datos proporcionados serán utilizados unicamente para fines del Seminario Internacional Desigualdad en el Mundo 2018.</small></p>
                                        
                                        <div class="form-group text-center">
                                               <input type="submit" name="enviar" value="Enviar respuestas" style="background-color: #104d64; color: #fff; width: 300px; height: 60px; font-size: 30px; ">

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