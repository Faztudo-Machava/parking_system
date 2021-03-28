<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    private $objVaga;
    public function __construct()
    {
        $this->objVaga = new Vaga();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaga = $this->objVaga->all();
        return view('dashboard.dashVaga', compact('vaga'));
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
        $vaga = new Vaga();
        $vaga->nome = $request->input('nome');
        $vaga->valor = $request->input('valor');
        $vaga->categoria = $request->input('categoria');
        $vaga->descrição = $request->input('descricao');
        $vaga->data = now();
        $vaga->save();
        return redirect()->route('vaga');
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
        $vaga = Vaga::find($id);
        $vaga->nome = $request->input('nome');
        $vaga->valor = $request->input('valor');
        $vaga->categoria = $request->input('categoria');
        $vaga->descrição = $request->input('descricao');
        $vaga->save();
        return redirect()->route('vaga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaga = Vaga::find($id);
        $vaga->delete;

        return redirect()->route('vaga')->with('Sucess', 'eliminado');
    }
}
