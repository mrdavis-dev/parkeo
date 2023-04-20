<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Formulario de solicitud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
  <div class="container d-flex flex-column justify-content-center align-items-center">
  <h1>Formulario de solicitud a suscripción</h1>
  <form action="enviar_telegram.php" method="post">
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" name="apellido" required>
    </div>
    <div class="form-group">
      <label for="correo">Correo electrónico</label>
      <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <div class="form-group">
      <label for="celular">Número de celular</label>
      <input type="tel" class="form-control" id="celular" name="celular" required>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="extras" name="extras">
        <label class="form-check-label" for="extras">
          ¿Desea funciones extras personalizadas?
        </label>
      </div>
    </div>
    <div class="form-group" style="display: none;" id="extras-textarea">
      <label for="extras-detalles">Detalles de funciones extras personalizadas</label>
      <textarea class="form-control" id="extras-detalles" name="extras-detalles" rows="3"></textarea>
    </div>
    <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
  </form>
</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
      $(function() {
        $('#extras').change(function() {
          if ($(this).is(':checked')) {
            $('#extras-textarea').show();
          } else {
            $('#extras-textarea').hide();
          }
        });
      });
    </script>
  </body>
</html>