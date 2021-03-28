<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

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
        $cor = $this->objCor->all();
        return view('dashboard.dashCor', compact('cor'));
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
        $cor = new Cor();
        $cor->nome = $request->input('nome');
        $cor->descrição = $request->input('descricao');
        $cor->data = now();
        $cor->save();
        return redirect()->route('cor');
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
        $cor = Cor::find($id);
        $cor->nome = $request->input('nome');
        $cor->descrição = $request->input('descricao');
        $cor->save();
        return redirect()->route('cor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cor = Cor::find($id);
        $cor->delete;

        return redirect()->route('cor')->with('Sucess', 'eliminado');
    }
}
