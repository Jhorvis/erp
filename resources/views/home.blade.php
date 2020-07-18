@extends('layouts.app')
<head>
  <meta charset="UTF-8">
  <title>Innova | Expansion Chile</title>
  <link rel="stylesheet" href="style/index_style.css">
</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
           <div id="titulo">
            <p id="header">Menu de acceso rapido</p>
            <p id="subheader">Expansion Chile</p> 
        </div>

        <div id="messagesocket">
        </div>

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
      
</div>
<script>
    window.laravelEchoPort = '{{ env("LARAVEL_ECHO_PORT") }}';
</script>

<script src="//{{request()->getHost() }}:{{ env('LARAVEL_ECHO_PORT') }}/socket.io/socket.io.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>

    const userId = '{{ auth()->id() }}';
        window.Echo.channel('channel-message')
            .listen('.MessageEvent', (data) => {
                $("#messagesocket").append('<div class="alert alert-danger">' + data.message + '</div>');
        });
    
        window.Echo.private('canal-mensaje.' + userId)
            .listen('.MessageEvent', (data) => {
                $("#messagesocket").append('<div class="alert alert-warning">' + data.message + '</div>');
        });


</script>
@endsection



  
  
 


