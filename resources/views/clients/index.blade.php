@extends('layout')

@section('content')

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Productos</h2>
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
                  		 <form  method="POST" class="form-horizontal form-label-left" action="{{ route('clients.store') }}" novalidate>
                  		{!!csrf_field()!!}
                      <span class="section">Ingreso de Clientes</span>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  name="name" placeholder="Ingresar nombre de producto. Ej: Caja Lapices" required="required" type="text">
                        </div>

                         <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">RUT <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="code" class="form-control col-md-7 col-xs-12" name="code" placeholder="Ingresar código del producto" required="required" type="text" readonly>
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Comuna <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="price" placeholder="Ingresa el precio neto del producto" required="required" type="number">
                        </div>

                         <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Calle<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="brand" class="form-control col-md-7 col-xs-12" name="brand" placeholder="define la marca del producto" type="text" disabled>
                        </div>
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">N°Calle<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="brand" class="form-control col-md-7 col-xs-12" name="brand" placeholder="define la marca del producto" type="text" disabled>
                        </div>
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Télefono<span class="required">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="brand" class="form-control col-md-7 col-xs-12" name="brand" placeholder="define la marca del producto" type="text" disabled>
                        </div>
                      </div>
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Correo
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input id="brand" class="form-control col-md-7 col-xs-12" name="brand" placeholder="define la marca del producto" type="text" disabled>
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>

                 </div>
 </div>

       
         
        



 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Listado de clientes registrados</h2>
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
                   


	
		<!-- Aca el contenido-->
	
	
		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th >No.</th>
					<th >Nombre</th>
					<th >RUT</th>
					<th >Comuna</th>
                    <th >Calle</th>
                    <th >N° Calle</th>
                    <th >Télefono</th>
					<th >Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0  ?>
				@foreach ($clients as $clients)
				<?php $i++;  ?>
				<tr>
					<td>{{ $i}}</td>
					<td>{{ $clients->name }}</td>
					<td>{{ $clients->dni }}</td>
					<td>{{ $clients->comune }}</td>
                    <td>{{ $clients->street }}</td>
                    <td>{{ $clients->numberstreet }}</td>
                    <td>{{ $clients->phone }}</td>
					<td width="8%"><a href="#" class="btn btn-xs btn-info" title="Ver mas"><span class="fa fa-eye"></span></a>

					
						<a href="#" class="btn btn-xs btn-danger" title="Eliminar"><span class="fa fa-trash"></span></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	
                   </div>
               </div>
           </div>

@endsection