<?php

namespace App\Http\Controllers;

use App\Models\TipoViatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('AcessoAdmin')){
        $tipo = $this->objTipo->all();
        $totalTipos = $this->objTipo->all()->count();
        return view('dashboard.dashTipo', compact('tipo', 'totalTipos'));
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
        $tipo = new TipoViatura();
        $tipo->nome = $request->input('nome');
        $tipo->descrição = $request->input('descricao');
        $tipo->data = now();
        $tipo->save();
        return redirect()->route('tipo');
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
        $tipo = TipoViatura::find($id);
        $tipo->nome = $request->input('nome');
        $tipo->descrição = $request->input('descricao');
        $tipo->save();
        return redirect()->route('tipo');
        }
        else{
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
        DB::delete('Delete from tipo_viatura where id = ?', [$id]);
        return redirect()->route('tipo')->with('Sucess', 'eliminado');
        }
        else{
            return view('permission.permission');
        }
    }
}
