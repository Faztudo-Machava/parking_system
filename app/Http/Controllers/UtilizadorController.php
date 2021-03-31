<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UtilizadorController extends Controller
{
    private $objUtilizador;
    private $objCliente;
    public function __construct()
    {
        $this->objUtilizador = new User();
        $this->objCliente = new Cliente();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
        if (Gate::allows('AcessoAdmin')){
        $utilizador = $this->objUtilizador->all();
        $totalUtilizadores = $this->objUtilizador->all()->count();
        $totalUtilizadoresAdmin = $this->objUtilizador->all()->where('admin', '=', 1)->count();
        $totalUtilizadoresCliente = $this->objUtilizador->all()->where('admin', '=', 0)->count();
        return view('dashboard.dashUtilizador', compact('utilizador', 'totalUtilizadores', 'totalUtilizadoresAdmin', 'totalUtilizadoresCliente'));
        }else{
            return view('permission.permission');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(Request $request)
    {
        if (Gate::allows('AcessoAdmin')){
        $utilizador = new User();
        $utilizador->nome = $request->input('nome');
        $utilizador->email = $request->input('email');
        $utilizador->admin = 1;
        $utilizador->data = now();
        $utilizador->password = Hash::make($request->input('password'));
        $utilizador->save();
        return redirect()->route('utilizador');
        }else{
            return view('permission.permission');
        }
    }

    public function storeCliente(Request $request)
    {
        $utilizador = new User();
        $utilizador->email = $request->input('email');
        $utilizador->admin = 0;
        $utilizador->data = now();
        $utilizador->password = Hash::make($request->input('password'));
        $clientes = $this->objCliente->all();
        $valor = 0;
        foreach($clientes as $cliente){
            if($utilizador->email == $cliente->email){
                $valor = 1;
                $utilizador->nome = $cliente->nome;
                $utilizador->save();
                return redirect()->route('home');
            }
        };
        if($valor == 0){
            echo "<script> alert('Ainda não é cliente do Palvic.') </script>";
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('AcessoAdmin')){
        $utilizador = User::find($id);
        $utilizador->nome = $request->input('nome');
        $utilizador->email = $request->input('email');
        $utilizador->save();
        return redirect()->route('utilizador');
        }else{
            return view('permission.permission');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('AcessoAdmin')){
        DB::delete('Delete from Utilizador where id = ?', [$id]);
        return redirect()->route('utilizador')->with('Sucess', 'eliminado');
        }else{
            return view('permission.permission');
        }
    }
}
