<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://www.paypal.com/sdk/js?client-id=ATyXZKAimxGnIQvIzkW3Wpqi0IlQY6ogWaPuGI1oHjwuv252uUel42lpkGiuwP43-9v-mL9bZfZHCEKv&
    currency=USD"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=ATyXZKAimxGnIQvIzkW3Wpqi0IlQY6ogWaPuGI1oHjwuv252uUel42lpkGiuwP43-9v-mL9bZfZHCEKv&components=buttons"></script>
</head>
<body>

    <div class="container">
        <div class="img">
            <img class="addPadding" src="https://www.paypalobjects.com/images/shared/paypal-logo-129x32.svg">
        </div>
        <label for="nombre">Nombre:</label>
        <input class="controls" type="text" name="nombres" id="nombres"  required>
        <label for="correo">Correo electrónico:</label>
        <input class="controls" type="email" name="correo" id="correo" required>
        <label for="monto">Monto:</label>
        <input class="controls" type="text" name="monto" id="monto" placeholder="100" disabled >

        <div id="paypal-button-container"></div>
    </div>

    <script>
        paypal.Buttons({
            style: {
                layout: 'vertical',
                color:  'blue',
                shape:  'rect',
                label:  'paypal'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 100
                        }
                    }]
                });
            },

            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    window.location.href="completado.html"
                });

            },

            onCancel: function(data){
                alert("Pago Cancelado")
                console.log(data);
            }
        }).render('#paypal-button-container');
    </script>
    
</body>
</html>