@extends('layout')

@section('content')

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Elegir Cliente  {{ session('status') }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="{{ route('order.store') }}" method="POST">
                      {!!csrf_field()!!}
                   
                  	<div class="form-group">
                  		<div class="col-md-5 col-lg-5 col-xs-12">
                  		<select name="cliente" class="form-control">
                  			<option value="">Selecciona</option>

                  			@foreach ($clients as $clients);
                  			<option value="{{$clients->id}}">{{$clients->dni}}, {{$clients->name}}</option>
                  			@endforeach
                  			
                  		</select>
                      </div>
                  		<button type="submit" class="btn btn-primary">Aceptar</button>
                  	</div>
                     </form>
                  </div>
              </div>
          </div>

@endsection