<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use App\Models\Modelo;
use App\Models\TipoViatura;
use App\Models\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViaturaController extends Controller
{
    private $objViatura;
    public function __construct(){
        $this->objViatura = new Viatura();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $totalViaturas = $this->objViatura->all()->count();
        $totalViaturasLigeiras = $this->objViatura->all()->where('Categoria', '=' ,'ligeiro')->count();
        $totalViaturasPesadas = $this->objViatura->all()->where('Categoria', '=' ,'pesado')->count();
        $listaModelos = Modelo::select('id','nome')->get();
        $listaTipos = TipoViatura::select('id','nome')->get();
        $listaCores= Cor::select('id','nome')->get();
        $viatura =  $this->objViatura->all();
        return view('dashboard.dashViatura', compact('viatura', 'listaModelos', 'listaTipos', 'listaCores', 'totalViaturas', 'totalViaturasLigeiras', 'totalViaturasPesadas'));

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
        $viatura = new Viatura();
        $viatura->tipo = $request->input('tipo');
        $viatura->modelo = $request->input('modelo');
        $viatura->cor = $request->input('cor');
        $viatura->categoria = $request->input('categoria');
        $viatura->data = now();
        $viatura->save();
        return redirect()->route('viatura');
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
        $viatura = Viatura::find($id);
        $viatura->tipo = $request->input('tipo');
        $viatura->modelo = $request->input('modelo');
        $viatura->cor = $request->input('cor');
        $viatura->categoria = $request->input('categoria');
        $viatura->save();
        return redirect()->route('viatura');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('Delete from viatura where id = ?', [$id]);
        return redirect()->route('viatura')->with('Sucess', 'eliminado');
    }
}
