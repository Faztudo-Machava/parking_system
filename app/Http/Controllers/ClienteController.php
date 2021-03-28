<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

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

        $clientes = $this->objCliente->all();
        return view('dashboard.dashCliente', compact('clientes'));
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
        $cliente->apelido = $request->input('saldo');
        $cliente->email = $request->input('email');
        $cliente->genero = $request->input('genero');
        $cliente->saldo = $request->input('saldo');
        $cliente->data = now();
        $cliente->save();
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete;

        return redirect('/cliente')->with('Sucess', 'eliminado');
    }

    public function cliente1(){
        $clientes = $this->objCliente->all();
        return view('cliente.cliente', compact('clientes'));
    }
}
