<?php

    require 'parse-php-sdk/autoload.php';
    
    use Parse\ParseClient;
    use Parse\ParseObject;
    use Parse\ParseQuery;

    $app_id     = "NvRYndipGuHFM724cbJxdFHxwMSqbRj7jBpPKlEv";
    $rest_key   = "0yTOUxEc0w2cRvttKMZqakpmw4coNxrK89neXMZ1";
    $master_key = "OEIJo8jyjrToI8mJ1dSf1ppafmRa7rasKYF19HVK";
    $valorcodigo = $_GET['codigo'];

    ParseClient::initialize( $app_id, $rest_key, $master_key );
    ParseClient::setServerURL('https://parseapi.back4app.com','/');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">
    <title>Parkeo | Detalles</title>
</head>
<body style="background-color: #ecb41b; font-family: 'Rubik', sans-serif;">

    <div class="container">
		<div class="row justify-content-center align-items-center" style="height: 80vh;">
			<div class="col-12 text-center">
                <img src="parkeo.png" class="img-fluid" style="max-width: 200px;"><br><br>
				<?php 
                
                $query = new ParseQuery("clients");
                $query->equalTo("objectId", $valorcodigo);
                $result = $query->first();

                if ($result != null) {
                echo '<h3>Código: <span id="codigo">'.$result->getObjectId().'</span></h3>';
                echo '<h3>Hora de inicio: <span id="inicio">'.$result->get('horainicio').'</span></h3>';
                
                $tarifa = $result->get('tarifa');
                date_default_timezone_set('America/Panama');
                $horaActual = date('h:i:s A');
                $horaInicio = $result->get('horainicio');
                $omitir = array("p", "m", ".",""," ");
                $hora = str_replace($omitir, "" ,$horaInicio);
                $hora1 = $hora;
                $hora2 = $horaActual;
                $fechaHora1 = new DateTime(trim($hora1));
                $fechaHora2 = new DateTime($hora2);
                $diferencia = $fechaHora1->diff($fechaHora2);
                $totalMinutos = ($diferencia->h * 60) + $diferencia->i;

                echo '<h3>Tiempo transcurrido: <span id="tiempo-total">'.$totalMinutos.' min</span></h3>';
                $total = $totalMinutos * $tarifa;
                echo '<h3>Total: <span id="total">'.$total.' $</span></h3>';
                }
                ?>
				
			</div>
		</div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
		<h5>¡Pronto podrás encontrar estacionamientos más fácil y rápido a través de nuestra app! ¡Mantente al tanto!</h5>
        <img class="img-fluid" style="max-width: 200px;" src="playstore.png" alt="">
	</footer>
    <style>
        footer {
        position: fixed;
        left: 0;
        bottom: 0px;
        width: 100%;
        text-align: center;
        }

        @media only screen and (max-width: 600px) {
        footer {
            font-size: 12px;
        }
        }
    </style>
</body>
</html>