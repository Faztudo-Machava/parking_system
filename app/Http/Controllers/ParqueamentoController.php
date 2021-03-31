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
    {   $listaClientes = $this->objCliente->all();
        $listaViaturas = $this->objViatura->all();
        $listaVagas = $this->objVaga->all();
        $totalVagasLivresLigeiro = $this->objVaga->all()->where('categoria', '=' ,'ligeiro')->where('estado', '=' ,1)->count();
            $totalVagasLivresPesado = $this->objVaga->all()->where('categoria', '=' ,'pesado')->where('estado', '=' ,1)->count();

        if(Gate::allows('AcessoAdmin')){
            $totalParqueamentos = $this->objParqueamento->all()->count();
            $parqueamento = $this->objParqueamento->all();
            return view('dashboard.dashParqueamento', compact('parqueamento','listaClientes','listaViaturas','listaVagas', 'totalParqueamentos', 'totalVagasLivresLigeiro', 'totalParqueamentos', 'totalVagasLivresPesado'));
        } else{
            //$ClienteLoged = $this->objCliente->all()->where('email', '=', session('user')->email);
            $parqueamento = $this->objParqueamento->all()->where('cliente', '=', session('user')->id);
            $totalParqueamentos = $this->objParqueamento->all()->where('cliente', '=', session('user')->id)->count();
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
        $parqueamento->save();
        return redirect()->route('parqueamento');
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
        return redirect()->route('parqueamento');
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
        return redirect()->route('parqueamento')->with('Sucess', 'eliminado');
        }else{
            return view('permission.permission');
        }
    }
}
