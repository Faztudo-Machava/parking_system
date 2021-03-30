@extends('master.dashboard')

@section('css')
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('titulo')
    Vagas
@endsection

@section('conteudo')
    <!-- Modal -->
    <form id="formAddVaga" method="POST" action="/addVaga">
        <div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Addicionar Vaga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 me-3">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" required>
                        </div>
                        <div class="mb-3 me-3">
                            <label for="txtValor" class="form-label">Valor</label>
                            <input type="number" class="form-control" name="valor" required>
                        </div>
                        <div class="mb-3">
                            <label for="jcCategoria" class="form-label">Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="categoria">
                                <option selected>Selecione a categoria</option>
                                <option value="ligeiro">Ligeiro</option>
                                <option value="pesado">Pesado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtDescricao" class="form-label">Descrição</label>
                            <textarea type="text" class="form-control" name="descricao" required></textarea>
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
                    <h5 class="modal-title" id="lblModelAdd">Atualizar Vaga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formUpdVaga" method="POST" action="/editVaga">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="mb-3 me-3">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="txtNome" required>
                        </div>
                        <div class="mb-3 me-3">
                            <label for="txtValor" class="form-label">Valor</label>
                            <input type="number" class="form-control" name="valor" id="txtValor" required>
                        </div>
                        <div class="mb-3">
                            <label for="jcCategoria" class="form-label">Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="categoria"
                                id="jcCategoria">
                                <option selected>Selecione a categoria</option>
                                <option value="ligeiro">Ligeiro</option>
                                <option value="pesado">Pesado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtDescricao" class="form-label">Descrição</label>
                            <textarea class="form-control" name="descricao" id="txtDescrição" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
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
                    <h5 class="modal-title" id="lblModelAdd">Eliminar Vaga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formDelVaga" action="/delVaga" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar esta vaga?</P>
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
            <h1 class="h3 mb-0 text-gray-800">Vagas</h1>
            <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#adicionar"><i class="bi bi-person-plus"></i> Nova vaga</button>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero total de vagas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total }}</div>
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
                                    Numero total de vagas para ligeiro</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalLigeiro }}</div>
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
                                    Numero de vagas livres para ligeiro</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ligeiroLivre }}</div>
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
                                    Numero de vagas livres para pesado</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesadoLivre }}</div>
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
                                    Total de vagas para pesado</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPesado }}</div>
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
                                    Numero de vagas ocupadas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $vagasOcupadas }}</div>
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
                <h6 class="m-0 font-weight-bold text-primary">Tabela de vagas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelaVaga" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Descrição</th>
                                <th>Data de registo</th>
                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vaga as $vagas)
                                <tr>
                                    <td scope="row">{{ $vagas->id }}</td>
                                    <td>{{ $vagas->nome }}</td>
                                    <td>{{ $vagas->valor }}</td>
                                    <td>{{ $vagas->categoria }}</td>
                                    <td>{{ $vagas->estado === 1 ? 'Livre' : 'Ocupada' }}</td>
                                    <td>{{ $vagas->descrição }}</td>
                                    <td>{{ $vagas->data }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btnEditar"><i
                                                class=" bi bi-pencil-square"></i></a>
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
    <script src="{{ asset('js/Vaga.js') }}"></script>
@endpush
