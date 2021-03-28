<?php

namespace App\Http\Controllers;

use App\Models\TipoViatura;
use Illuminate\Http\Request;

class TipoViaturaController extends Controller
{
    private $objTipo;
    public function __construct()
    {
        $this->objTipo = new TipoViatura();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo = $this->objTipo->all();
        return view('dashboard.dashTipo', compact('tipo'));
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
        $tipo = new TipoViatura();
        $tipo->nome = $request->input('nome');
        $tipo->descrição = $request->input('descricao');
        $tipo->data = now();
        $tipo->save();
        return redirect()->route('tipo');
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
        $tipo = TipoViatura::find($id);
        $tipo->nome = $request->input('nome');
        $tipo->descrição = $request->input('descricao');
        $tipo->save();
        return redirect()->route('tipo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = TipoViatura::find($id);
        $tipo->delete;

        return redirect()->route('tipo')->with('Sucess', 'eliminado');
    }
}
