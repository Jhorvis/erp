<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use \Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index () {

        if (auth()->user()->admin)
        {
            $products = Product::all();
        $message = "";

        return view('productos/index', compact('products', 'message'));

        } else {
            return response('Acceso denegado, No tiene permisos para ver esta URL',403);
        }
    }

    public function store (Request $request) {

        $code = $request->code;

        $products = Product::all();



        #Verificando que el código del producto no este repetido
        $searchCode = DB::table('products')->where('code', $code)->get();

        foreach ($searchCode as $searchCode);

        if (!empty($searchCode->code)) {

            $message = "Codigo ya fue insertado para el producto ".$searchCode->name;

            return view('productos/index', compact('products', 'message'));


        } else {

         $message = "Producto ingresado con éxito";

    	$product = new Product();
    	$product->name = $request->name;
    	$product->code = $request->code;
    	$product->price = $request->price;
    	$product->save();
    	$products = Product::all();
    	return view('productos/index', compact('products', 'message'));
        }

    }

    public function show () {
      
    }

    public function ShowProductByCode ($codigo) {

     $price = Product::whereCode($codigo)->value('price');
     $name = Product::whereCode($codigo)->value('name');
     $neto = intval($price / 1.19);

     if (!$price) 
     {
        $price = "N/A";
        $name = "Codigo No encontrado";
        $neto = 0;
        return compact('price', 'name');
     } else {

     }

        return compact('price', 'name', 'neto');

      
    }

    public function edit ($id)
    {
        $product = Product::find($id);
        return view('productos/edit', compact('product'));
    }

    public function update (Request $request)
    {
       
         $searchCode = DB::table('products')->where('code', $request->code)->where('id', '<>', $request->id)->get();

        foreach ($searchCode as $searchCode);

        if (!empty($searchCode->code)) {

            $message = "<div class='alert alert-danger'>¡ERROR! Este codigo ya fue insertado para el producto ".$searchCode->name."</div>";

            return view('productos/save', compact('message'));


        } else {




         $product = Product::find($request->id);      
        $product->name = $request->name;
        $product->code = $request->code;
        $product->price = $request->price;

        $product->save();
        $message = "<div class='alert alert-success'>Producto actualizado de manera exitosa</div>";
        return view('productos/save', compact('message'));
        
        }
        
    }

    public function countcode ()

    {
        $data = Product::orderBy('code', 'DESC')->take(1)->get();
       

        foreach ($data as $lastcode);

        $sumcode = $lastcode->code + 1;

        $stringcode = $sumcode;

       return compact('stringcode');
    }

}
