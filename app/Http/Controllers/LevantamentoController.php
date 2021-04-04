<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Levantamento;
use App\Models\Parqueamento;
use App\Models\Vaga;
use App\Models\Viatura;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class LevantamentoController extends Controller
{
    private $objParqueamento;
    private $objVaga;
    private $objCliente;
    private $objViatura;
    private $objLevantamento;
    public function __construct(){
        $this->objLevantamento = new Levantamento();
        $this->objVaga = new Vaga();
        $this->objCliente = new Cliente();
        $this->objViatura = new Viatura();
        $this->objParqueamento = new Parqueamento();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaParqueamentos = $this->objParqueamento->all()->where('estado', '=', 1);
        if(Gate::allows('AcessoAdmin')){
            $totalParqueamentosAtivos = $this->objParqueamento->all()->where('estado', '=' ,1)->count();
            $levantamento = $this->objLevantamento->all();
            $totalLevantamento = $this->objLevantamento->all()->count();
            return view('dashboard.dashLevantamento', compact('levantamento','listaParqueamentos', 'totalParqueamentosAtivos','totalLevantamento'));
        } else{
            $cliente = DB::table('cliente')->where('email', '=', session('user')->email)->value('id');
            $parqueamento = DB::table('parqueamento')->where('cliente', '=', $cliente)->value('id');
            $levantamento = $this->objLevantamento->all()->where('parqueamento', '=', $parqueamento);
            $totalLevantamento = $this->objLevantamento->all()->where('parqueamento', '=', $parqueamento)->count();
            $totalParqueamentosAtivos = $this->objParqueamento->all()->where('cliente', '=', $cliente)->where('estado', '=' ,1)->count();
            return view('dashboard.dashLevantamento', compact('levantamento','listaParqueamentos', 'totalParqueamentosAtivos','totalLevantamento'));
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
        $levantamento = new Levantamento();
        $levantamento->parqueamento = $request->input('parqueamento');
        $levantamento->utilizador = session('user')->id;
        $levantamento->data = now();
        $vaga = DB::table('parqueamento')->where('id', '=', $levantamento->parqueamento)->value('vaga');
        $viatura = DB::table('parqueamento')->where('id', '=', $levantamento->parqueamento)->value('viatura');
        DB::table('vaga')->where('id', '=', $vaga)->update(['estado' => 1]);
        DB::table('viatura')->where('id', '=', $viatura)->update(['estado' => 1]);
        DB::table('parqueamento')->where('id', '=', $levantamento->parqueamento)->update(['estado' => 0]);

        /*Calculo do tempo e do valor correspondente ao parqueamento*/
        $parkingDay = DB::table('parqueamento')->where('id', '=', $levantamento->parqueamento)->value('created_at');
        $levantamento->save();
        return redirect()->route('levantamento')->with('mensagem', 'Levantamento efectuado com sucesso! ');
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
        $levantamento = Levantamento::find($id);
        $levantamento->parqueamento = $request->input('parqueamento');
        $levantamento->save();
        return redirect()->route('levantamento')->with('mensagem', 'Levantamento efectuado com sucesso');
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
        DB::delete('Delete from levantamento where id = ?', [$id]);
        return redirect()->route('levantamento')->with('Sucess', 'eliminado');
        }else{
            return view('permission.permission');
        }
    }
}
