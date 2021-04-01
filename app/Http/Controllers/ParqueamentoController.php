<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Parqueamento;
use App\Models\Vaga;
use App\Models\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ParqueamentoController extends Controller
{
    private $objParqueamento;
    private $objVaga;
    private $objCliente;
    private $objViatura;
    public function __construct(){
        $this->objParqueamento = new Parqueamento();
        $this->objVaga = new Vaga();
        $this->objCliente = new Cliente();
        $this->objViatura = new Viatura();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $listaClientes = $this->objCliente->all()->where('estado','=',1);
        $listaViaturas = $this->objViatura->all()->where('estado','=',1);
        $listaVagas = $this->objVaga->all()->where('estado','=',1);
        $totalVagasLivresLigeiro = $this->objVaga->all()->where('categoria', '=' ,'ligeiro')->where('estado', '=' ,1)->count();
            $totalVagasLivresPesado = $this->objVaga->all()->where('categoria', '=' ,'pesado')->where('estado', '=' ,1)->count();

        if(Gate::allows('AcessoAdmin')){
            $totalParqueamentos = $this->objParqueamento->all()->count();
            $parqueamento = $this->objParqueamento->all();
            return view('dashboard.dashParqueamento', compact('parqueamento','listaClientes','listaViaturas','listaVagas', 'totalParqueamentos', 'totalVagasLivresLigeiro', 'totalParqueamentos', 'totalVagasLivresPesado'));
        } else{
            $cliente = DB::table('cliente')->where('email', '=', session('user')->email)->value('id');
            $parqueamento = $this->objParqueamento->all()->where('cliente', '=', $cliente);
            $totalParqueamentos = $this->objParqueamento->all()->where('cliente', '=', $cliente)->count();
            return view('dashboard.dashParqueamento', compact('parqueamento','listaClientes','listaViaturas','listaVagas', 'totalParqueamentos', 'totalVagasLivresLigeiro', 'totalParqueamentos', 'totalVagasLivresPesado'));
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
        $parqueamento = new Parqueamento();
        $parqueamento->cliente = $request->input('cliente');
        $parqueamento->viatura = $request->input('viatura');
        $parqueamento->vaga = $request->input('vaga');
        $parqueamento->utilizador = session('user')->id;
        $parqueamento->estado = 1;
        $parqueamento->data = now();
        $vagaEstado = DB::table('vaga')->where('id','=', $parqueamento->vaga)->value('estado');
        $viaturaEstado = DB::table('vaga')->where('id','=', $parqueamento->viatura)->value('estado');
        if($vagaEstado == 0 && $viaturaEstado == 0){
            return redirect()->route('parqueamento')->withErrors(['Essa vaga está ocupada.', 'Está viatura não disponivél.']);
        }
        else if($vagaEstado == 0){
            return redirect()->route('parqueamento')->withErrors('Essa vaga está ocupada.');
        }
        else if($viaturaEstado == 0){
            return redirect()->route('parqueamento')->withErrors('Está viatura não disponivél.');
        }
        DB::table('vaga')->where('id', '=', $parqueamento->vaga)->update(['estado' => 0]);
        DB::table('viatura')->where('id', '=', $parqueamento->viatura)->update(['estado' => 0]);
        $parqueamento->save();
        return redirect()->route('parqueamento')->with('mensagem', 'Parqueado com sucesso!');
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
        $parqueamento = Parqueamento::find($id);
        $parqueamento->cliente = $request->input('cliente');
        $parqueamento->viatura = $request->input('viatura');
        $parqueamento->vaga = $request->input('vaga');
        $parqueamento->save();
        return redirect()->route('parqueamento')->with('mensagem', 'Parqueamento atualizado com sucesso!');
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
        DB::delete('Delete from parqueamento where id = ?', [$id]);
        return redirect()->route('parqueamento')->with('mensagem', 'Parqueamento eliminado com sucesso!');
        }else{
            return view('permission.permission');
        }
    }
}
