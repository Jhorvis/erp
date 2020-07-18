@extends('layouts.app')
<head>
  <meta charset="UTF-8">
  <title>Innova | Expansion Chile</title>
  <link rel="stylesheet" href="style/index_style.css">
</head>
@section('content')
<div class="container">
    <div class="row justify-content-center">

    <form action=" {{ route('chat') }} " method="post">
    {!!csrf_field()!!}
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <button type="submit" class="btn btn-succes">Enviar</button>
    </form>
</div>


</script>
@endsection



  
  
 


