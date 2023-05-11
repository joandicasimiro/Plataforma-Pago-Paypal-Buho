<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" src="public/css/test.css" type="text/css"/>
    <title>Checkout - Paypal</title>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <script src="https://www.paypal.com/sdk/js?client-id=AZmWxPNw3GuDRUrhjZWDX9sQyGywq_UvfzTbBKLubKJfryOajnC7AZDwCmUvA3kV-j9ke5hjW-M8qh7s&currency=USD"></script>
</head>
<body>

  <?php
    $monto = $_GET["amount"];
  ?>

<section class="form-register">
    <h1>PlusPay - Checkout</h1>
    <label for="nombre">Nombre:</label>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required>
    <label for="correo">Correo electrónico:</label>
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" required>
    <label for="monto">Monto:</label>
    <input class="controls" type="text" name="monto" id="monto" placeholder="20" disabled value="<?= $monto?>">
    <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
    <div id="paypal-button-container"></div>
  </section>
  
  <script>
    paypal.Buttons({
      style: {
          color:  'blue',
          shape:  'pill',
          label:  'pay',
          height: 40
      },
      createOrder: function(data, actions) {
          return actions.order.create({
              purchase_units:[{
                  amount: {
                    value: '<?= $monto?>'
                  }
              }]
          })
      },
      onCancel:function (data) {
        alert("Pago cancelado")
      }
    }).render("#paypal-button-container");
  </script>

</body>
</html>