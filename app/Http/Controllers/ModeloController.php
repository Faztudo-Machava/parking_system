<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ModeloController extends Controller
{
    private $objModelo;
    public function __construct()
    {
        $this->objModelo = new Modelo();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('AcessoAdmin')){
        $modelo = $this->objModelo->all();
        $totalModelos = $this->objModelo->all()->count();
        $listaFabricantes = Fabricante::select('id','nome')->get();
        return view('dashboard.dashModelo', compact('modelo', 'listaFabricantes', 'totalModelos'));
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
        $modelo = new Modelo();
        $modelo->nome = $request->input('nome');
        $modelo->descrição = $request->input('descricao');
        $modelo->fabricante = $request->input('fabricante');
        $modelo->data = now();
        $modelo->save();
        return redirect()->route('modelo')->with('mensagem', 'Modelo adicionado com sucesso!');
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
        $modelo = Modelo::find($id);
        $modelo->nome = $request->input('nome');
        $modelo->descrição = $request->input('descricao');
        $modelo->fabricante = $request->input('fabricante');
        $modelo->save();
        return redirect()->route('modelo')->with('mensagem', 'Modelo atualizado com sucesso!');;
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
        DB::delete('Delete from modelo where id = ?', [$id]);
        return redirect()->route('modelo')->with('mensagem', 'Modelo eliminado com sucesso!');
        }else{
            return view('permission.permission');
        }
    }
}
