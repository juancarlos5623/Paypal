<?php
$nombre = $_GET['nombre'] ?? '';
$correo = $_GET['correo'] ?? '';
$monto = $_GET['monto'] ?? '';
$correoPredeterminado = 'javier@chat.pe';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="completado.css">
    <title>Document</title>
</head>
<body>
<style>
  .oculto {
    display: none;
  }
</style>
    <div class="form-content">
        <h2>GRACIAS POR SU COMPRA</h2>
        <h1>Presione el botón para enviar un correo de confirmación sobre su compra.</h1>
        <form action="https://formsubmit.co/<?php echo $correo; ?>" method="POST">
            <input class="oculto" type="text" name="Nombre del Cliente" id="name" value="<?php echo $nombre; ?>">

            <input class="oculto" type="email" name="Correo Electrónico" id="email" value="<?php echo $correoPredeterminado; ?>">

            <input class="oculto" type="text" name="Monto Pagado" id="subject" value="<?php echo $monto; ?>">

            <input class="oculto" type="text" name="Comentario" id="comments" value="Confirmación del pago realizado con exito con PayPal">

            <input class="btn" type="submit" value="Enviar">

            <input type="hidden" name="_next" value="https://chat.pe/PayPal-Buho/completado.php">
            <input type="hidden" name="_captcha" value="false">
        </form>
    </div>
</body>
</html>