<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\PublicMessage;

class MessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        event(new PublicMessage(auth()->user()));
        dd("mensaje enviafdo");
    }
}
