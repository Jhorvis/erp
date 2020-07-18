{{ session('status') }}
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Innova | Expansion Chile</title>
  <link rel="stylesheet" href="style/index_style.css">
</head>
<body>
  
  <div id="titulo">
    <p id="header">Menu de acceso rapido</p>
    <p id="subheader">Expansion Chile</p> 
  </div>

  <header>
    <a href="">
    <div class="contenedor" id="uno">
      <img class="icon" src="img/business/png/home.png">
      <p class="texto">Home</p>
    </div>
    </a>
<a href="{{ route('products.index') }}">
    <div class="contenedor" id="dos">
      <img class="icon" src="img/business/png/package.png">
      <p class="texto">Productos</p>
    </div>
    </a>
<a href="{{ route('order.index') }}">
    <div class="contenedor" id="tres">
      <img class="icon" src="img/business/png/shopping-cart.png">
      <p class="texto">Crear Pedido</p>
    </div>
    </a>
<a href="{{ route('clients.index') }}">
    <div class="contenedor" id="cuatro">
      <img class="icon" src="img/business/png/deal.png">
      <p class="texto">Clientes</p>
    </div>
    </a>
<a href="#">
    <div class="contenedor" id="cinco">
      <img class="icon" src="img/business/png/businessman.png">
      <p class="texto">Vendedores</p>
    </div>
    </a>
<a href="#">
    <div class="contenedor" id="seis">
      <img class="icon" src="img/business/png/bank.png">
      <p class="texto">Finanzas</p>
    </div>
    </a>


  </header>
</body>
</html>





































