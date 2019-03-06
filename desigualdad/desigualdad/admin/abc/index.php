<?php
/*session_start();
include('verifica_login.php');*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

<script type="text/javascript" src="qrscan.min.js"></script>

	
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td>  
	<video id="preview"></video>
    <div class="content"></div>
    <script type="text/javascript">
		// use qrscan class
		// var camera, object
		// for camerta count cameras.length
		// cameras[0] as camera 1
		// cameras[1] as back camera
		
      let scanner = new qrscan.Scanner({ video: document.getElementById('preview') }); // camera preview, scanner
      scanner.addListener('scan', function (content) {
        console.log(content);
		// qr scan output
		window.location="qrconsulta.php?id="+content;
      });
      qrscan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 1) {
			// back camera start
          scanner.start(cameras[1]);
        }else if (cameras.length > 0) {
			// frond camera start
          scanner.start(cameras[0]);
        } else {
			// no camera detected
          console.error('No cameras found.');
			alert('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script></td>
  </tr>
</table>

</body>
</html>
