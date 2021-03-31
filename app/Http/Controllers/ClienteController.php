<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ClienteController extends Controller
{
    private $objCliente;
    public function __construct()
    {
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
        $listaClientesAtivos = $this->objCliente->all()->where('estado', '=', 1)->count();
        $listaClientesInativos = $this->objCliente->all()->where('estado', '=', 0)->count();
        $numTotal = $this->objCliente->all()->count();
        $clientes = $this->objCliente->all();
        return view('dashboard.dashCliente', compact('clientes', 'numTotal', 'listaClientesAtivos', 'listaClientesInativos'));
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
    public function store(Request $request)
    {
        if (Gate::allows('AcessoAdmin')){
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->apelido = $request->input('apelido');
        $cliente->email = $request->input('email');
        $cliente->genero = $request->input('genero');
        $cliente->saldo = $request->input('saldo');
        $cliente->data = now();
        $cliente->save();
        return redirect()->route('cliente');
        }else{
            return view('permission.permission');
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
        $cliente = Cliente::find($id);
        $cliente->nome = $request->input('nome');
        $cliente->apelido = $request->input('saldo');
        $cliente->email = $request->input('email');
        $cliente->genero = $request->input('genero');
        $cliente->saldo = $request->input('saldo');
        $cliente->save();
        return redirect('/cliente')->with('Sucess', 'Atualizado');
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
        DB::delete('Delete from cliente where id = ?', [$id]);
        return redirect('/cliente')->with('Sucess', 'eliminado');
        }else{
            return view('permission.permission');
        }
    }
}
