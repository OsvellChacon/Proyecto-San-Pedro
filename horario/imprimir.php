<?php

require_once 'include/config.php';
require_once 'include/functions.php';

if (empty($_GET['horario']))
    {
	header('Location: lista.php');
    }

if (ctype_space($_GET['horario']))
	{
		header('Location: lista.php');
	}

if (is_numeric($_GET['horario']))
	{
		$horario = $_GET['horario'];
	}else{
		header('Location: lista.php');
	}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Colegio San Pedro - Administrador</title>
    <link rel="Shortcut Icon" type="image/x-icon" href="images/Logo.png" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>
  <body>

    
    <div class="original">
        <?php printhorario($horario); ?>    	
    </div>

    <div id="finalcanvas"></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/html2canvas.js"></script>
    <script type="text/javascript">
        html2canvas($(".original"), {
          onrendered: function(canvas) {
            var canvasImg = canvas.toDataURL("image/png");

            $('#finalcanvas').html('<img src="'+canvasImg+'" alt="">');
            
           },
           allowTaint: true,
           logging: true,
           useCORS: true
        });
        $('.original').hide();
    </script>    
  </body>
</html>



