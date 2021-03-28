<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use App\Models\User;
use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilizadorController extends Controller
{
    public function create(){
        $user = new User();
        $user->nome = 'Fastudo';
        $user->email = 'faztudo.machava@uem.ac.mz';
        $user->data = now();
        $user->password = Hash::make('1234');
        $user->save();
    }
}
