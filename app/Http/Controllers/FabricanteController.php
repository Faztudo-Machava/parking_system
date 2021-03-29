<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricanteController extends Controller
{
    private $objFabricante;
    public function __construct()
    {
        $this->objFabricante = new Fabricante();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricante = $this->objFabricante->all();
        $totalFabricantes = $this->objFabricante->all()->count();
        return view('dashboard.dashFabricante', compact('fabricante', 'totalFabricantes'));
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
        $fabricante = new Fabricante();
        $fabricante->nome = $request->input('nome');
        $fabricante->descrição = $request->input('descricao');
        $fabricante->data = now();
        $fabricante->save();
        return redirect()->route('fabricante');
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
        $fabricante = Fabricante::find($id);
        $fabricante->nome = $request->input('nome');
        $fabricante->descrição = $request->input('descricao');
        $fabricante->save();
        return redirect()->route('fabricante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('Delete from fabricante where id = ?', [$id]);
        return redirect()->route('fabricante')->with('Sucess', 'eliminado');
    }
}
