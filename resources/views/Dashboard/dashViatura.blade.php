@extends('master.dashboard')

@section('css')
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('titulo')
    Viatura
@endsection

@section('conteudo')
    <!-- Modal -->
    <form id="formAddViatura" method="POST" action="/addViatura">
        <div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Addicionar Modelo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tipo de viatura</label>
                            <select class="form-select" aria-label="Default select example" name="tipo">
                                <option selected>Selecione o Tipo de viatura</option>
                                @foreach ($listaTipos as $Tipos)
                                    <option value="{{ $Tipos->id }}">{{ $Tipos->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Modelo</label>
                            <select class="form-select" aria-label="Default select example" name="modelo">
                                <option selected>Selecione o Modelo da viatura</option>
                                @foreach ($listaModelos as $modelos)
                                    <option value="{{ $modelos->id }}">{{ $modelos->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cor</label>
                            <select class="form-select" aria-label="Default select example" name="cor">
                                <option selected>Selecione a cor do carro</option>
                                @foreach ($listaCores as $cores)
                                    <option value="{{ $cores->id }}">{{ $cores->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="categoria">
                                <option selected>Selecione a categoria da viatura</option>
                                <option value="ligeiro">Ligeiro</option>
                                <option value="pesado">Pesado</option>
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
                <form id="formUpdViatura" method="POST" action="/editViatura">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Tipo de viatura</label>
                            <select id="tipo" class="form-select" aria-label="Default select example" name="tipo">
                                <option selected>Selecione o Tipo de viatura</option>
                                @foreach ($listaTipos as $Tipos)
                                    <option value="{{ $Tipos->id }}">{{ $Tipos->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Modelo</label>
                            <select id="modelo" class="form-select" aria-label="Default select example" name="modelo">
                                <option selected>Selecione o Modelo da viatura</option>
                                @foreach ($listaModelos as $modelos)
                                    <option value="{{ $modelos->id }}">{{ $modelos->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cor</label>
                            <select id="cor" class="form-select" aria-label="Default select example" name="cor">
                                <option selected>Selecione a cor do carro</option>
                                @foreach ($listaCores as $cores)
                                    <option value="{{ $cores->id }}">{{ $cores->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categoria</label>
                            <select id="categoria" class="form-select" aria-label="Default select example" name="categoria">
                                <option selected>Selecione a categoria da viatura</option>
                                <option value="ligeiro">Ligeiro</option>
                                <option value="pesado">Pesado</option>
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
                <form id="formDelViatura" action="/delViatura" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar esta viatura?</P>
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
            <h1 class="h3 mb-0 text-gray-800">Viaturas</h1>
            <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#adicionar"><i class="bi bi-person-plus"></i> Nova viatura</button>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de viaturas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalViaturas }}</div>
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
                                    Total de viaturas ligeiras</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalViaturasLigeiras }}</div>
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
                                    Total de viaturas ligeiras</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalViaturasPesadas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabela de viaturas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelaViatura" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Modelo</th>
                                <th>Tipo de viatura</th>
                                <th>Cor</th>
                                <th>Categoria</th>
                                <th>Data de registo</th>
                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viatura as $viaturas)
                                @php
                                    $tipo = $viaturas->find($viaturas->id)->relTipo;
                                    $modelo = $viaturas->find($viaturas->id)->relModelo;
                                    $cor = $viaturas->find($viaturas->id)->relCor;
                                @endphp
                                <tr>
                                    <th scope="row">{{ $viaturas->id }}</th>
                                    <td>{{ $modelo->nome }}</td>
                                    <td>{{ $tipo->nome }}</td>
                                    <td>{{ $cor->nome }}</td>
                                    <td>{{ $viaturas->Categoria }}</td>
                                    <td>{{ $viaturas->data }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btnEditar"><i class="bi bi-pencil-square"></i></a>
                                        <a href="#" class="btn btn-danger btnEliminar"><i class="bi bi-trash"></i></a>
                                    </td>
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
    <script src="{{ asset('js/Viatura.js') }}"></script>
@endpush
