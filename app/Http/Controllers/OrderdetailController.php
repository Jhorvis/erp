<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Illuminate\Support\Facades\DB;

use App\Orderdetail;

class OrderdetailController extends Controller
{
    
    public function store (Request $request)
    {	

		$cantidad = $request->cantidad;
		$idOrder = $request->idOrder;
		$code = $request->codigo;

		$getProduct = DB::table('products')
						->where('code', $code)
						->get();

		foreach ($getProduct as $getProduct);
 		 $idProduct = $getProduct->id;
 		 $priceProduct = $getProduct->price;

 		 $getProductOrderDetails = DB::table('orderdetails')
								  ->where('idProducts', $idProduct)
								  ->where('idOrder', $idOrder)
								  ->get();

		foreach ($getProductOrderDetails as $gpod);

		if (!empty($gpod->id))
		{
			$cantidad = $cantidad + $gpod->quantity;
			$precioTotal = $priceProduct * $cantidad;
 			$precioNetoTotal = $precioTotal / 1.19;

 			$Orderdetail = Orderdetail::find($gpod->id);

 			$Orderdetail['quantity'] = $cantidad;
 			$Orderdetail['price'] = $precioTotal;
 			$Orderdetail['neto'] = $precioNetoTotal;

 			$Orderdetail->update();

		} 
		else 
		{


 		$precioTotal = $priceProduct * $cantidad;
 		$precioNetoTotal = $precioTotal / 1.19;

 		$Orderdetail = new Orderdetail();
		
		$Orderdetail->idOrder = $idOrder;
		$Orderdetail->idProducts = $idProduct;
		$Orderdetail->quantity  = $cantidad;
		$Orderdetail->price = $precioTotal;
		$Orderdetail->neto = $precioNetoTotal;
		$Orderdetail->save();

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

	public function delete ($id)
	{
		$SearchOrder = Orderdetail::find($id);

		dd($SearchOrder);
	}
}
