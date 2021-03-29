<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    private $objUser;
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
        $listaClientesAtivos = $this->objCliente->all()->where('estado', '=', 1)->count();
        $listaClientesInativos = $this->objCliente->all()->where('estado', '=', 0)->count();
        $numTotal = $this->objCliente->all()->count();
        $clientes = $this->objCliente->all();
        return view('dashboard.dashCliente', compact('clientes', 'numTotal', 'listaClientesAtivos', 'listaClientesInativos'));
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
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->apelido = $request->input('apelido');
        $cliente->email = $request->input('email');
        $cliente->genero = $request->input('genero');
        $cliente->saldo = $request->input('saldo');
        $cliente->data = now();
        $cliente->save();
        return redirect()->route('cliente');
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
        $cliente = Cliente::find($id);
        $cliente->nome = $request->input('nome');
        $cliente->apelido = $request->input('saldo');
        $cliente->email = $request->input('email');
        $cliente->genero = $request->input('genero');
        $cliente->saldo = $request->input('saldo');
        $cliente->data = now();
        $cliente->save();
        return redirect('/cliente')->with('Sucess', 'Atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('Delete from cliente where id = ?', [$id]);
        return redirect('/cliente')->with('Sucess', 'eliminado');
    }

    public function cliente1(){
        $clientes = $this->objCliente->all();
        return view('cliente.cliente', compact('clientes'));
    }
}
