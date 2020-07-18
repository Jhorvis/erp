<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Illuminate\Support\Facades\DB;

use App\Order;

use App\Saleorder;

class SaleorderController extends Controller
{
    public function store (Request $request)
    {
    	$idOrder = $request->idOrder;

    	$totalNeto = DB::table('orderdetails')->where('idOrder', $idOrder)->sum('neto');
        $totalPrice = DB::table('orderdetails')->where('idOrder', $idOrder)->sum('price');

        $saleOrder = new Saleorder();
        $saleOrder->idOrder = $idOrder;
        $saleOrder->totalneto = $totalNeto;
        $saleOrder->totalprice = $totalPrice;
        $saleOrder->save();

        $updateOrder = Order::find($idOrder);
        $updateOrder->state = 1;
        $updateOrder->update();

        #Obteniendo listado de productos para enviar al reporte PDF

         $products = DB::table('orderdetails')
                            ->join('products', 'products.id', 'orderdetails.idProducts')
                            ->where('idOrder', $idOrder)
                            ->get();
        #Fin de obtención de productos


          #Bloque de código para generar reporte PDF-----
        $date = date('d-m-Y H:i:s');
        $invoice = $idOrder;
        $view =  \View::make('pdf.invoice', compact('products','totalPrice', 'totalNeto', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        #Fin de PDF

        return $pdf->stream('invoice');

    }

    public function cancel (Request $request)
    {
    	$idOrder = $request->idOrder;

    	$updateOrder = Order::find($idOrder);
        $updateOrder->state = 2;
        $updateOrder->update();
        
         return view('welcome');

    } 
}
