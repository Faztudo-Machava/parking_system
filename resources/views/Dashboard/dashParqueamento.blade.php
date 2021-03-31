@extends('master.dashboard')

@section('css')
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('titulo')
    Parqueamento
@endsection

@section('conteudo')
    <!-- Modal -->
    <form id="formAddParqueamento" method="POST" action="/addParqueamento">
        <div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Addicionar Parqueamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <select class="form-select" aria-label="Default select example" name="cliente">
                                <option selected>Selecione o Cliente</option>
                                @foreach ($listaClientes as $Clientes)
                                    <option value="{{ $Clientes->id }}">{{ $Clientes->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Viatura</label>
                            <select class="form-select" aria-label="Default select example" name="viatura">
                                <option selected>Selecione o Vitaura</option>
                                @foreach ($listaViaturas as $viaturas)
                                    <option value="{{ $viaturas->id }}">{{ $viaturas->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vaga</label>
                            <select class="form-select" aria-label="Default select example" name="vaga">
                                <option selected>Selecione a vaga</option>
                                @foreach ($listaVagas as $vagas)
                                    <option value="{{ $vagas->id }}">{{ $vagas->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <!-- ================================== Editar=============================== -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lblModelAdd">Addicionar Modelo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formUpdParqueamento" method="POST" action="/editParqueamento">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Cliente</label>
                            <select class="form-select" aria-label="Default select example" name="cliente" id="cliente">
                                <option selected>Selecione o Cliente</option>
                                @foreach ($listaClientes as $Clientes)
                                    <option value="{{ $Clientes->id }}">{{ $Clientes->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Viatura</label>
                            <select class="form-select" aria-label="Default select example" name="viatura" id="viatura">
                                <option selected>Selecione o Vitaura</option>
                                @foreach ($listaViaturas as $viaturas)
                                    <option value="{{ $viaturas->id }}">{{ $viaturas->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vaga</label>
                            <select class="form-select" aria-label="Default select example" name="vaga" id="vaga">
                                <option selected>Selecione a vaga</option>
                                @foreach ($listaVagas as $vagas)
                                    <option value="{{ $vagas->id }}">{{ $vagas->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- =================================== Delete User =================================== -->

    <div class="modal fade" id="deletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lblModelAdd">Eliminar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formDelParqueamento" action="/delParqueamento" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar este Parqueamento?</P>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ================================== Delete User ==================================== -->


    <!-- ======================== Visualizar dados dum determinado cliente ===================== -->



    <!-- ==========X============= Visualizar dados dum determinado cliente ==========X============ -->

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Parqueamento</h1>
            @if (Gate::allows('AcessoAdmin'))
                <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#adicionar"><i class="bi bi-person-plus"></i> Novo Parqueamento</button>
            @endif
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de parqueamentos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalParqueamentos }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Gate::allows('AcessoAdmin'))
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de vagas livres para Ligeiro</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVagasLivresLigeiro }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de vagas livres para Pesado</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVagasLivresPesado }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabela de parqueamentos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelaParqueamento" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cliente</th>
                                <th>Viatura</th>
                                <th>Vaga</th>
                                @if(Gate::allows('AcessoAdmin'))
                                <th>Utilizador</th>
                                @endif
                                <th>Data de parqueamento</th>
                                @if (Gate::allows('AcessoAdmin'))
                                    <th>Acções</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Cliente</th>
                                <th>Viatura</th>
                                <th>Vaga</th>
                                @if(Gate::allows('AcessoAdmin')){
                                <th>Utilizador</th>
                                @endif
                                <th>Data de parqueamento</th>
                                @if (Gate::allows('AcessoAdmin'))
                                    <th>Acções</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($parqueamento as $parqueamentos)
                                @php
                                    $cliente = $parqueamentos->find($parqueamentos->id)->relCliente;
                                    $viatura = $parqueamentos->find($parqueamentos->id)->relViatura;
                                    $vaga = $parqueamentos->find($parqueamentos->id)->relVaga;
                                    $utilizador = $parqueamentos->find($parqueamentos->id)->relUser;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $parqueamentos->id }}</th>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $viatura->nome }}</td>
                                    <td>{{ $vaga->nome }}</td>
                                    @if (Gate::allows('AcessoAdmin'))
                                    <td>{{ $utilizador->Nome }}</td>
                                    @endif
                                    <td>{{ $parqueamentos->data }}</td>
                                    @if (Gate::allows('AcessoAdmin'))
                                        <td>
                                            <a href="#" class="btn btn-primary btnEditar"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" class="btn btn-danger btnEliminar"><i class="bi bi-trash"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('js/Parqueamento.js') }}"></script>
@endpush
