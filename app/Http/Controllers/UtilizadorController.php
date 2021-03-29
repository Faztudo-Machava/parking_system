<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use App\Models\User;
use App\Models\Utilizador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UtilizadorController extends Controller
{
    public function create(){
        $user = new User();
        $user->nome = 'Fastudo';
        $user->email = 'fasthymachava12@gmail.com';
        $user->data = now();
        $user->password = Hash::make('1234');
        $user->save();
    }

    public function destroy($id){
        DB::delete('Delete from utilizador where id = ?', [$id]);
    }
}
