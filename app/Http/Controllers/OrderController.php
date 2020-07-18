<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

use App\Order;

use \Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
 	public function index () {

 		$clients = Client::all();

 		return view('order/create', compact('clients'));

 	}

 	public function create () {

 		

 	}

 	function edit () {

 	}

 	function update () {

 	}

 	public function store (Request $request)
 	 {
        $idCliente = $request->cliente;

        #Verificando Orden abierta (0) para el cliente solicitado
        $verificaOrden = DB::table('orders')->where('state', 0)->where('idClient', $idCliente)->get();
        foreach ($verificaOrden as $verificaOrden);

        if (!empty($verificaOrden->id))
        {
            $idOrder = $verificaOrden->id;

        } else {

 	
 		$Order = new Order();
 		$Order->idClient = $idCliente;
 		$Order->NumberOrder = 1;
 		$Order->state=0;
 		$Order->save();

 		$getId = DB::table('orders')->where('idClient', $idCliente)->where('state', 0)->select('id')->take(1)->orderBy('id', 'desc')->get();
 		 foreach ($getId as $getId);
 		 $idOrder = $getId->id;
        }

        $getOrderDetails = DB::table('orderdetails')
                            ->join('products', 'products.id', 'orderdetails.idProducts')
                            ->where('idOrder', $idOrder)
                            ->get();

 		$totalQuantity = DB::table('orderdetails')->where('idOrder', $idOrder)->sum('quantity');
        $totalNeto = DB::table('orderdetails')->where('idOrder', $idOrder)->sum('neto');
        $totalPrice = DB::table('orderdetails')->where('idOrder', $idOrder)->sum('price');
        
            return view('order/index', compact('idOrder', 'getOrderDetails', 'totalQuantity', 'totalNeto', 'totalPrice'));
 	}
}

    	
    	


