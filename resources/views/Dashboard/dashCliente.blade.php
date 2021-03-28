@extends('master.dashboard')

@section('css')
<link href="{{asset('css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
@endsection

@section('titulo')
    Cliente
@endsection

@section('conteudo')
    <!-- Modal -->
    <form id="formAddCliente" method="POST">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <!-- ================================== Editar=============================== -->
    <form id="formUpdCliente" action="/editCliente" method="POST">
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Atualizar dados do cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- =================================== Delete User =================================== -->
    <form id="formDelCliente" action="/delCliente" method="POST">
        <div class="modal fade" id="deletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Eliminar cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar este cliente?</P>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirmar password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cliente</h1>
            <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#cadCliente"><i class="bi bi-person-plus"></i> Novo cliente</button>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Saldo</div>
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
                                    Saldo</div>
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
                                    Saldo</div>
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
                                    Saldo</div>
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
                <h6 class="m-0 font-weight-bold text-primary">Tabela de Clientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelaCliente" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Apelido</th>
                                <th>Genero</th>
                                <th>Email</th>
                                <th>Saldo</th>
                                <th>Estado</th>
                                <th>Data de chegada</th>
                                <th colspan="3">Acções</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>Codigo</td>
                                <td>Nome</td>
                                <td>Apelido</td>
                                <td>Genero</td>
                                <td>Email</td>
                                <td>Saldo</td>
                                <td>Estado</td>
                                <td>Data de chegada</td>
                                <td colspan="3">Acções</td>
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
                                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#visualizar"><i class="bi bi-eye-fill"></i></button>
                                    </td>
                                    <td>
                                        <button id="btnEditar" class="btn btn-primary btnEditar"
                                            data-bs-toggle="modal" data-bs-target="#editar"><i
                                                class="bi bi-pencil-square"></i></button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btnEliminar"><i class="bi bi-trash"></i></button>
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
<script src="{{asset('js/Cliente.js')}}"></script>
@endpush
