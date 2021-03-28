<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            return view('dashboard.dashboard');
        }
        return redirect()->route('home');
    }

    public function login(Request $request){
        $credencias = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credencias)){
            //return redirect()->route('admin');
            $login['success'] = true;
            echo json_encode($login);
            return;
        }
        //return redirect()->back()->withInput()->withErrors(['']);
        $login['success'] = false;
        $login['message'] = 'Dados invalidos';
        echo json_encode($login);
        return;
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
