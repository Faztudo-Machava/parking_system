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
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="mb-3 me-3">
                            <label for="txtValor" class="form-label">Valor</label>
                            <input type="text" class="form-control" name="valor">
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
                            <textarea type="text" class="form-control" name="descricao"></textarea>
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
    <form id="formUpdVaga" method="POST" action="/editVaga">
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Atualizar Vaga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 me-3">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="txtNome">
                        </div>
                        <div class="mb-3 me-3">
                            <label for="txtValor" class="form-label">Valor</label>
                            <input type="text" class="form-control" name="valor" id="txtValor">
                        </div>
                        <div class="mb-3">
                            <label for="jcCategoria" class="form-label">Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="categoria" id="jsCategoria">
                                <option selected>Selecione a categoria</option>
                                <option value="ligeiro">Ligeiro</option>
                                <option value="pesado">Pesado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtDescricao" class="form-label">Descrição</label>
                            <textarea type="text" class="form-control" name="descricao" id="txtDescrição"></textarea>
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

    <!-- =================================== Delete User =================================== -->
    <form id="formDelVaga" action="/delVaga" method="POST">
        <div class="modal fade" id="deletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Eliminar Vaga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar esta vaga?</P>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero total de vagas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero de vagas livres para ligeiro</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero de vagas livres para pesado</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Numero de vagas ocupadas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
                    <table class="table table-bordered" id="tabelaFabricante" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Descrição</th>
                                <th>Data de registo</th>
                                <th colspan="3">Acções</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Categoria</th>
                                <th>Estado</th>
                                <th>Descrição</th>
                                <th>Data de registo</th>
                                <th colspan="3">Acções</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($vaga as $vagas)
                                <tr>
                                    <td scope="row">{{ $vagas->id }}</td>
                                    <td>{{ $vagas->nome }}</td>
                                    <td>{{ $vagas->valor }}</td>
                                    <td>{{ $vagas->categoria }}</td>
                                    <td>{{ $vagas->descrição }}</td>
                                    <td>{{ $vagas->estado === 1 ? 'Livre' : 'Ocupada' }}</td>
                                    <td>{{ $vagas->data }}</td>
                                    <td>
                                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#visualizar"><i
                                                class="bi bi-eye-fill"></i></button>
                                    </td>
                                    <td>
                                        <button id="btnEditar" class="btn btn-primary btnEditar" data-bs-toggle="modal"
                                            data-bs-target="#editar"><i class="bi bi-pencil-square"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btnEliminar" data-bs-toggle="modal"
                                            data-bs-target="#deletar"><i class="bi bi-trash"></i></button>
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
