<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AdOq8wqdBSRMyDBUfpNgI4dVtwoWlvH7U0DjpXbZjSyFo12Zrvc0unmwjTno6b-suHkRxFB4lGRwGsw7&currency=USD"></script>
</head>

<body>
    <div class="form-content">
        <h2>REALIZA TU PAGO</h2>
        <form method="GET" action="completado.php">
            <label for="nombre">Nombre Completo</label>
            <input type="text" id="nombre-input" name="nombre" placeholder="Nombre" required>

            <label for="correo">Correo Electrónico</label>
            <input type="email" id="correo-input" name="correo" placeholder="Correo electrónico" required>

            <label for="monto">Monto</label>
            <input type="number" id="monto-input" name="monto" placeholder="Monto" required>

            <div id="paypal-button-container"></div>
        </form>
    </div>

    <script>
        paypal.Buttons({
            style:{
                shape: 'pill',
                label: 'pay'
            },

            createOrder: function(data, actions) {
            var monto = document.getElementById('monto-input').value; // Obtener el valor del campo de entrada
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: monto // Usar el valor del campo de entrada como monto
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    //alert("Pago REALIZADO")
                    window.location.href = 'https://chat.pe/PayPal-Buho/completado.php?nombre=' + encodeURIComponent(document.getElementById('nombre-input').value) + '&correo=' + encodeURIComponent(document.getElementById('correo-input').value) + '&monto=' + encodeURIComponent(document.getElementById('monto-input').value);
                });
            },

            onCancel: function(data){
                    alert("Pago cancelado")
            },
        }).render('#paypal-button-container');
    </script>
</body>
</html>