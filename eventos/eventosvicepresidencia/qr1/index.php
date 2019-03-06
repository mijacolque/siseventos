<!DOCTYPE html>
<html>
  <head>
    <title>qr</title>
    <script type="text/javascript" src="qrscan.min.js"></script>
    <style>
		#preview{
			width:100%;
			height:100%;
			position:fixed;
		}
	</style>
  </head>
  <body>
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
		alert(content);
      });
      qrscan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 1) {
			// back camera start
          scanner.start(cameras[0]);
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
    </script>
  </body>
</html>