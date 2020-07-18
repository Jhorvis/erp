<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

use \Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index ()
    {
        $clients = Client::all();

        return view("clients/index", compact('clients'));
    }

    public function store (Request $request) {

        $dni = $request->dni;

        $clients = Client::all();


        #Verificando que el código del producto no este repetido
        $searchDni = DB::table('clients')->where('dni', $dni)->get();

        foreach ($searchDni as $searchDni);

        if (!empty($searchDni->dni)) {

            $message = "Ya este cliente fue registrado ".$searchDni->name;

            return view('clients/index', compact('clients', 'message'));


        } else {

         $message = "Cliente ingresado con éxito";

    	$client = new Client();
    	$client->name = $request->name;
    	$client->dni = $request->dni;
    	$client->comune = $request->comune;
    	$client->street = $request->street;
    	$client->numberstreet = $request->numberstreet;
    	$client->email = $request->email;
    	$client->phone = $request->phone;
    	$client->save();
    	$clients = Client::all();
    	return view('clients/index', compact('clients', 'message'));
        }

    }
}