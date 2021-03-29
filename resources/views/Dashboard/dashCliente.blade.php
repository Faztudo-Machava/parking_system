@extends('master.dashboard')

@section('css')
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('titulo')
    Cliente
@endsection

@section('conteudo')
    <!-- Modal -->
    <form id="formAddCliente" method="POST" action="{{ route('addCliente') }}">
        <div class="modal fade" id="cadCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Addicionar cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row">
                            <div class="mb-3 me-3">
                                <label for="txtNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="nome">
                            </div>
                            <div class="mb-3">
                                <label for="txtApelido" class="form-label">Apelido</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="apelido">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="jcGenero" class="form-label">Genero</label>
                            <select class="form-select" aria-label="Default select example" name="genero">
                                <option selected>Selecione o genero</option>
                                <option value="F">F</option>
                                <option value="M">M</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtSaldo" class="form-label">Saldo</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" name="saldo">
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
                    <h5 class="modal-title" id="lblModelAdd">Atualizar dados do cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formUpdCliente" action="/editCliente" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="d-flex flex-row">
                            <div class="mb-3 me-3">
                                <label for="txtNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="txtNome" aria-describedby="emailHelp"
                                    name="nome">
                            </div>
                            <div class="mb-3">
                                <label for="txtApelido" class="form-label">Apelido</label>
                                <input type="text" class="form-control" id="txtApelido" aria-describedby="emailHelp"
                                    name="apelido">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="txtEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="txtEmail" aria-describedby="emailHelp"
                                name="email">
                        </div>
                        <input type="hidden" name="idCliente" id="idCliente">
                        <div class="mb-3">
                            <label for="jcGenero" class="form-label">Genero</label>
                            <select id="jcGenero" class="form-select" aria-label="Default select example" name="genero">
                                <option selected>Selecione o genero</option>
                                <option value="F">F</option>
                                <option value="M">M</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="txtSaldo" class="form-label">Saldo</label>
                            <input type="number" class="form-control" id="txtSaldo" aria-describedby="emailHelp"
                                name="saldo">
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
                <form id="formDelCliente" action="/delCliente" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar este cliente?</P>
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
    <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lblModelUpdate">Addicionar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="EmailLog" class="form-label">Email</label>
                        <input type="email" class="form-control" id="EmailLog" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="passLog" class="form-label">Password</label>
                        <input type="password" class="form-control" id="passLog">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Clientes</h1>
            <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#cadCliente"><i class="bi bi-person-plus"></i> Novo cliente</button>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de clientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numTotal }}</div>
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
                                    Total de clientes ativos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $listaClientesAtivos }}</div>
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
                                    Total de clientes inativos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $listaClientesInativos }}</div>
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
                <h6 class="m-0 font-weight-bold text-primary">Tabela de Clientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @csrf
                    <table class="table table-bordered" id="tabelaCliente" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Apelido</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Email</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Data de chegada</th>
                                <th scope="col">Acções</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Apelido</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Email</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Data de chegada</th>
                                <th scope="col">Acções</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td scope="row">{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->apelido }}</td>
                                    <td>{{ $cliente->genero }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->saldo }}</td>
                                    <td>{{ $cliente->estado == 1 ? 'Ativo' : 'Inativo' }}</td>
                                    <td>{{ $cliente->data }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btnEditar"><i
                                                class="bi bi-pencil-square"></i></a>
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
    <script src="{{ asset('js/Cliente.js') }}"></script>
@endpush
