<?php error_reporting(0); ?>
<?php
session_start();
include('verifica_login.php');
include('conexion.php');
$usuario=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <script src="../sweetalert.min.js"></script>
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
require('../fpdf/fpdf.php');
require '../phpqrcode/qrlib.php';
require '../phpmailer/PHPMailerAutoload.php';

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

        QRcode::png($url,"../qr.png",QR_ECLEVEL_L,3,1);

        $pdf = new FPDF();
        $pdf->AddFont('AvenirLTStd-Roman','','AvenirLTStd-Roman.php');
        $pdf->AddPage('P');

        $pdf->Image('../fondo.jpg',0,0,210,300);
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
    
        $pdf->Image('../qr.png',70,80,70,70);

        $pdf->Output('../inscripcion.pdf');

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


    $nombresbd=$nombres;
    $apellidosbd=$apellidos;
    $gradobd=$grado;
    $profesionbd=$profesion;
    $institucionbd=$institucion2;

mysqli_query($conexion,"insert into inscritos(ci,fecha_nac,nombres,apellidos,sexo,edad,email,ciudad,estudios_alcanzados, profesion,institucion,fecha,hora) values ('$carnet','$fecha_nac','$nombresbd','$apellidosbd','$sexo','$edad','$correo','$ciudad','$gradobd','$profesionbd','$institucionbd','$fecha','$hora')") or
  die("Problemas en el select".mysqli_error($conexion));
    

    mysqli_close($conexion);


    



        echo '<script>
        swal("Registro realizado con éxito","Por favor revise su correo electrónico","success")
            .then((value) => {
              window.location="painel_voluntario.php";}
        );</script>';


    }
    else
    {

                    echo '<script>
        swal("Error","Por favor ingrese y/o verifique su número de Carnet de Identidad y/o su Fecha de Nacimiento.","error")
            .then((value) => {
              window.location="inscribir.php";}
        );</script>';
    }

}

  

 ?>


 
  <table border="5" width="100%">
        <form action="inscribir.php" method="POST">
            <tr>
                <td colspan="3"><h1 align="center">INSCRIPCIONES SEMINARIO DESIGUALDAD 2018</br>VOLUNTARIOS</h1></td>
            </tr>
            <tr>
              <td align="center"><h2>Número de carnet de identidad: <input type="text" name="carnet" value="<?php if(!empty($_POST['consultar'])) {echo $ci;}?>"></h2></td>
              <td align="center"><h2>Fecha de nacimiento: <input type="text" name="fechanac" value="<?php if(!empty($_POST['consultar'])) {echo $fn;}?>"></h2></td>
              <td><h2><input type="submit" name="consultar" value="Verificar" style="background-color: #104d64; color: #fff; width: 130px; height: 50px; font-size: 20px; " ></h2></td>
            </tr>
        </form> 

        <form action="inscribir.php" method="POST">
          
            <input type="hidden" name="carnet" value="<?php if(!empty($_POST['consultar'])) {echo $ci;}?>" >
            <input type="hidden" name="fechanac" value="<?php if(!empty($_POST['consultar'])) {echo $fn;}?>" >
            <tr>
                <td><h2>Nombres:<input type="text" name="nombres" name="nombres" required value="<?php if(!empty($_POST['consultar'])) {echo $nombres;}?>"></h2></td>

                <td colspan="2"><h2>Apellidos:  <input type="text" name="apellidos" required  value="<?php if(!empty($_POST['consultar'])) {echo $apellidos;}?>"  ></h2></td>
            </tr>

            <tr><td><h2>Sexo: <input type="radio" name="sexo" class="radio-input" required value="Masculino" > Masculino
                    <input type="radio" name="sexo" class="radio-input" value="Femenino" > Femenino</h2></td>
                <td colspan="2"><h2>Email:  <input type="text"  name="correo" required ></h2></td>
            </tr>
            <tr>
              <td><h2>Ciudad de residencia:</br> <select class="form-control" name="ciudad" required >
                                                    <option value="">SELECCIONE UNA OPCIÓN </option>
                                                    <option>LA PAZ </option>
                                                    <option>EL ALTO</option>
                                                    <option>COCHABAMBA</option> 
                                                    <option>SANTA CRUZ</option>    
                                                    <option>SUCRE</option> 
                                                    <option>ORURO</option> 
                                                    <option>PANDO</option> 
                                                    <option>BENI</option> 
                                                    <option>TARIJA</option> 
                                                    <option>POTOSI</option> 
                                                    <option>OTRO</option>
                                        </select></h2></td>
              <td colspan="2">
                
                <h2>Estudios alcanzados:   <select name="grado" class="form-control" required > 
                                                <option value="">SELECCIONE UNA OPCIÓN </option>
                                                <option>Estudiante</option> 
                                                <option>Bachiller</option>
                                                <option>Técnico Medio</option> 
                                                <option>Técnico Superior</option> 
                                                <option>Licenciatura</option> 
                                                <option>Maestria</option> 
                                                <option>Doctorado</option>
                                                <option>Post-Doctorado</option> 
                                              </select>
                                            </h2>

              </td>
            </tr>
            <tr>
              <td><h2>
                Profesión u ocupación:<select name="profesion" class="form-control" required > 
    
                                                <option value="">SELECCIONE UNA OPCIÓN </option>
                                                <option>Labores de casa</option>
                                                <option>Acuicultura</option>
                                                <option>Administración</option>
                                                <option>Administración y Finanzas</option>
                                                <option>Administración Gubernamental</option>
                                                <option>Administración Municipal</option>
                                                <option>Administración de Negocios Internacionales</option>
                                                <option>Administración de Negocios Globales</option>
                                                <option>Administración de Turismo</option>
                                                <option>Administración de Servicios</option>
                                                <option>Administración en Hotelería</option>
                                                <option>Administración y Marketing</option>
                                                <option>Agronomía</option>
                                                <option>Agronomía Tropical</option>
                                                <option>Antropología</option>
                                                <option>Arqueología</option>
                                                <option>Arquitectura</option>
                                                <option>Arte</option>
                                                <option>Arte y Diseño Gráfico Empresarial</option>
                                                <option>Artes Escénicas</option>
                                                <option>Biología</option>
                                                <option>Bibliotecología y Ciencias de la Información</option>
                                                <option>Bromatología y Nutrición</option>
                                                <option>Ciencias Políticas</option>
                                                <option>Ciencias de la Comunicación</option>
                                                <option>Ciencia y Tecnología de la Comunicación</option>
                                                <option>Computación</option>
                                                <option>Comunicación Audiovisual</option>
                                                <option>Comunicación para el Desarrollo</option>
                                                <option>Conservación de Suelos y Agua</option>
                                                <option>Cultura Física y Deporte</option>
                                                <option>Contabilidad</option>
                                                <option>Derecho</option>
                                                <option>Derecho y Ciencias Políticas</option>
                                                <option>Diseño Gráfico</option>
                                                <option>Diseño Industrial</option>
                                                <option>Economía</option>
                                                <option>Economía Agraria</option>
                                                <option>Ecoturismo</option>
                                                <option>Educación Secundaria</option>
                                                <option>Educación Artística</option>
                                                <option>Educación Religiosa</option>
                                                <option>Educación Bilingüe Intercultural</option>
                                                <option>Educación Física</option>
                                                <option>Educación Idiomas</option>
                                                <option>Educación Inicial</option>
                                                <option>Educación Primaria</option>
                                                <option>Educación Tecnológica</option>
                                                <option>Educación Especial</option>
                                                <option>Educación para el Desarrollo</option>
                                                <option>Enfermería</option>
                                                <option>Estadísitica</option>
                                                <option>Estudiante</option>
                                                <option>Estadística para la Gestión de Servicios de Salud</option>
                                                <option>Escultura</option>
                                                <option>Farmacia y Bioquímica</option>
                                                <option>Filosofía</option>
                                                <option>Física</option>
                                                <option>Físico Matemáticas</option>
                                                <option>Geografía</option>
                                                <option>Geología</option>
                                                <option>Gestión en Turismo y Hotelería</option>
                                                <option>Genética y Biotecnología</option>
                                                <option>Gestión Pública y Desarrollo Social</option>
                                                <option>Gestión Empresarial</option>
                                                <option>Grabado</option>
                                                <option>Historia</option>
                                                <option>Idiomas y Turismo</option>
                                                <option>Ingeniería Administrativa</option>
                                                <option>Ingeniería Agrícola</option>
                                                <option>Ingeniería Agro-Industrial</option>
                                                <option>Ingeniería Alimentaria</option>
                                                <option>Ingeniería Ambiental</option>
                                                <option>Ingeniería Agropecuaria</option>
                                                <option>Ingeniería Biotecnología</option>
                                                <option>Ingeniería Civil</option>
                                                <option>Ingeniería Comercial</option>
                                                <option>Ingeniería en Computación y Sistemas</option>
                                                <option>Ingeniería en Ecología de Bosques Tropicales</option>
                                                <option>Ingeniería Eléctrica</option>
                                                <option>Ingeniería Electrónica</option>
                                                <option>Ingeniería de Energía</option>
                                                <option>Ingeniería Física</option>
                                                <option>Ingeniería Forestal</option>
                                                <option>Ingeniería Geofísica</option>
                                                <option>Ingeniería Geográfica</option>
                                                <option>Ingeniería Geográfica y Ecología</option>
                                                <option>Ingeniería Geológica</option>
                                                <option>Ingeniería Gestión Ambiental</option>
                                                <option>Ingeniería de Higiene y Seguridad Industrial</option>
                                                <option>Ingeniería Industrial</option>
                                                <option>Ingeniería Industrial y Sistemas</option>
                                                <option>Ingeniería de Industrias Alimentarias</option>
                                                <option>Ingeniería Informática</option>
                                                <option>Ingeniería Mecánica</option>
                                                <option>Ingeniería Mecánica Eléctrica</option>
                                                <option>Ingeniería Mecánica de Fluidos</option>
                                                <option>Ingeniería Mecatrónica</option>
                                                <option>Ingeniería del Medio Ambiente</option>
                                                <option>Ingeniería Metalúrgica</option>
                                                <option>Ingeniería de Materiales</option>
                                                <option>Ingeniería de Minas</option>
                                                <option>Ingeniería Naval</option>
                                                <option>Ingeniería Pesquera</option>
                                                <option>Ingeniería de Petróleo</option>
                                                <option>Ingeniería Petroquímica</option>
                                                <option>Ingeniería Química</option>
                                                <option>Ingeniería de Recursos Naturales y Energías Renovables</option>
                                                <option>Ingeniería de Sistemas de Información</option>
                                                <option>Ingeniería Sanitaria</option>
                                                <option>Ingeniería de Sistemas</option>
                                                <option>Ingeniería de Software</option>
                                                <option>Ingeniería de Telecomunicaciones</option>
                                                <option>Ingeniería en Teleinformática</option>
                                                <option>Ingeniería Textil</option>
                                                <option>Ingeniería de Transporte</option>
                                                <option>Ingeniería Topográfica y Agrimesura</option>
                                                <option>Investigación Operativa</option>
                                                <option>Lingüística</option>
                                                <option>Literatura</option>
                                                <option>Matemáticas</option>
                                                <option>Matemáticas y Estadísticas</option>
                                                <option>Marketing</option>
                                                <option>Medicina Humana</option>
                                                <option>Medicina Veterinaria</option>
                                                <option>Microbiología y Parasitología</option>
                                                <option>Negocios Internacionales</option>
                                                <option>Nutrición</option>
                                                <option>Obstetricia</option>
                                                <option>Odontología</option>
                                                <option>Optometría</option>
                                                <option>Periodismo</option>
                                                <option>Pintura</option>
                                                <option>Producción de Radio, Cine y Televisión</option>
                                                <option>Publicidad</option>
                                                <option>Psicología</option>
                                                <option>Profesor</option>
                                                <option>Química</option>
                                                <option>Religión y Filosofía</option>
                                                <option>Religión y Salud Pública</option>
                                                <option>Relaciones Industriales</option>
                                                <option>Relaciones Públicas</option>
                                                <option>Sociología</option>
                                                <option>Tecnología Médica</option>
                                                <option>Tecnología en Cs. del Deporte y Cultura Física</option>
                                                <option>Tecnología en Equipos Electromédicos</option>
                                                <option>Tecnología en Salud y Terapia Complementaria y Alternativa</option>
                                                <option>Teología</option>
                                                <option>Teología y Música Sacra</option>
                                                <option>Trabajo Social</option>
                                                <option>Traducción e Interpretación</option>
                                                <option>Turismo</option>
                                                <option>Zootecnia</option>
                                                <option>Agroecología y Desarrollo Rural</option>
                                                <option>Ingeniería Forestal y del Medio Ambiente</option>
                                                <option>Hotelería y Turismo</option>
                                                <option>Ingeniería Agronegocios</option>
                                                <option>Administración Pública</option>
                                                <option>Administración y Negocios</option>
                                                <option>Contabilidad Administrativa y Auditoría</option>
                                                <option>Tecnología Médica para Urgencias Médicas y Desastres</option>
                                                <option>Ecología</option>
                                                <option>Teología y Liderazgo Eclesiástico</option>
                                                <option>Teología y Psicología Pastoral</option>
                                                <option>NINGUNA</option>
                                                </select>
              </h2></td>

              <td colspan="2"><h2>Institución a la que pertenece:<input type="text" name="institucion" required  ><input type="hidden" class="form-control" name="edad" value="<?php if(!empty($_POST['consultar'])) {echo $edad;}?>"  ></h2></td>

            </tr>
            <tr><td colspan="3" align="center"><input type="submit" name="enviar" value="Inscribir" style="background-color: #104d64; color: #fff; width: 180px; height: 60px; font-size: 30px; "></td></tr>
        </form>

  </table>


</body>
</html>