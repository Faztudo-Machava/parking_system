<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CorController extends Controller
{
    private $objCor;
    public function __construct()
    {
        $this->objCor = new Cor();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('AcessoAdmin')){
        $cor = $this->objCor->all();
        $totalCor = $this->objCor->all()->count();
        return view('dashboard.dashCor', compact('cor', 'totalCor'));
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
        $cor = new Cor();
        $cor->nome = $request->input('nome');
        $cor->descrição = $request->input('descricao');
        $cor->data = now();
        $cor->save();
        return redirect()->route('cor')->with('mensagem', 'Cor adicionado com sucesso!');
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
        $cor = Cor::find($id);
        $cor->nome = $request->input('nome');
        $cor->descrição = $request->input('descricao');
        $cor->save();
        return redirect()->route('cor')->with('mensagem', 'Cor atualizada com sucesso!');
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
        DB::delete('Delete from cor where id = ?', [$id]);
        return redirect()->route('cor')->with('mensagem', 'Cor eliminada com sucesso!');
        }else{
            return view('permission.permission');
        }
    }
}
