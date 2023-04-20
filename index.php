<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dongle&display=swap" rel="stylesheet">

    <title>Buscador...</title>
  </head>
  <body style="background-color: #404040;">

    <div class="container text-center">
        <div class="mt-5">
            <form action="detalle_parkeo.php" method="post">
                <img src="parkeo.png" class="img-fluid" style="max-width: 200px;"> 
                <h2 class="text-white mb-5">Parkeo Info</h2>
                <h2 class="text-white">Ingrese su número</h2>
                <input class="form-control border border-warning" type="text" name="codigo" id="codigo">
                <input type="button" value="Buscar" class="btn btn-primary btn-lg mt-3 ">
            </form>
        </div>
        
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <footer class="text-center">
        <a href="" class="text-white">By: MeDevSolutions.com</a></footer>

    <style>
        footer {
  position: fixed;
  left: 0;
  bottom: 10px;
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