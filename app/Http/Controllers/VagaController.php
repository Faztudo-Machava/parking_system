<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('AcessoAdmin')){
        $vaga = $this->objVaga->all();
        $total = $this->objVaga->all()->count();
        $totalLigeiro = $this->objVaga->all()->where('categoria', '=', 'ligeiro')->count();
        $totalPesado = $this->objVaga->all()->where('categoria', '=', 'pesado')->count();
        $pesadoLivre = $this->objVaga->all()->where('categoria', '=', 'pesado')->where('estado', '=' ,1)->count();
        $ligeiroLivre = $this->objVaga->all()->where('categoria', '=', 'ligeiro')->where('estado', '=' ,1)->count();
        $vagasOcupadas = $this->objVaga->all()->where('estado', '=' ,0)->count();
        return view('dashboard.dashVaga', compact('vaga', 'total','totalLigeiro','totalPesado','pesadoLivre', 'ligeiroLivre', 'vagasOcupadas'));
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
        $vaga = new Vaga();
        $vaga->nome = $request->input('nome');
        $vaga->valor = $request->input('valor');
        $vaga->categoria = $request->input('categoria');
        $vaga->descrição = $request->input('descricao');
        $vaga->data = now();
        $vaga->save();
        return redirect()->route('vaga')->with('mensagem', 'Vaga adicionada com sucesso');
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
        $vaga = Vaga::find($id);
        $vaga->nome = $request->input('nome');
        $vaga->valor = $request->input('valor');
        $vaga->categoria = $request->input('categoria');
        $vaga->descrição = $request->input('descricao');
        $vaga->save();
        return redirect()->route('vaga')->with('mensagem', 'Vaga atualizada com sucesso!');
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
        DB::delete('Delete from vaga where id = ?', [$id]);
        return redirect()->route('vaga')->with('mensagem', 'Vaga eliminada com sucesso!');
        }else{
            return view('permission.permission');
        }
    }
}
