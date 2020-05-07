<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CuraduriAPP</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row align-items-center" style="height: 600px;">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
          <h1 class="display-4">Su solicitud ha sido recibida</h1>
          <p class="lead">Nuestro equipo de profesionales pronto se pondrá en contacto con usted para indicarle los pasos a seguir dentro de el proceso de solicitud de licencia.</p>
          <p class="lead">Muchas Gracias por elegirnos.<br>
            <strong>Curaduría Urbana N° {{ $solicitud->curaduria->numero }} de {{ $solicitud->curaduria->ciudad->nombre }}</strong>
          </p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>
</html>