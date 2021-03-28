<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function session(){
        var_dump(Session::all());

        //session(['IdCliente' => 1]);
        echo session('IdCliente');

        //Session::forget('IdCliente');
    }
}
