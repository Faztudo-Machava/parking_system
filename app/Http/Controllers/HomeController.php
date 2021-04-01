<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class HomeController extends Controller
{
    public static function homepage(){
        return view('home.index');
    }

    public function enviar(Request $request){
        $dados = array(
            'nome' => $request->nome,
            'mensagem' => $request->mensagem,
            'assunto' => $request->assunto
        );

        Mail::to('fasthymachava12@gmail.com')->send(new ContactoMail($dados));
        return back()->with('success', 'Obrigado por nos contactar.');
    }
}
