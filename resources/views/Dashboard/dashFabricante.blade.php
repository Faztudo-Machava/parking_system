@extends('master.dashboard')

@section('css')
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('titulo')
    Fabricantes
@endsection

@section('conteudo')
    <!-- Modal -->
    <form id="formAddFabricante" method="POST" action="/addFabricante">
        <div class="modal fade" id="adicionar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lblModelAdd">Addicionar Fabricante</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 me-3">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtDescricao" class="form-label">Descrição</label>
                            <textarea type="text" class="form-control" name="descricao"></textarea required>
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
                    <h5 class="modal-title" id="lblModelAdd">Atualizar Tipo de viatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formUpdFabricante" method="POST" action="/editFabricante">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">

                        <div class="mb-3 me-3">
                            <label for="txtNome" class="form-label">Nome</label>
                            <input type="text" id="txtNome" class="form-control" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="txtDescricao" class="form-label">Descrição</label>
                            <textarea type="text" id="txtDescricao" class="form-control" name="descricao" required></textarea>
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
                <form id="formDelFabricante" action="/delFabricante" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="DELETE">
                        <P>Tem certeza que deseja eliminar este Fabricante?</P>
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
            <h1 class="h3 mb-0 text-gray-800">Fabricantes de viatura</h1>
            <button href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal"
                data-bs-target="#adicionar"><i class="bi bi-person-plus"></i> Novo Fabricante</button>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class=" text-center col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total de fabricantes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalFabricantes }}</div>
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
                <h6 class="m-0 font-weight-bold text-primary">Tabela de fabricantes de viatura</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tabelaFabricante" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Data de registo</th>
                                <th>Acções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fabricante as $fabricantes)
                                <tr>
                                    <td scope="row">{{ $fabricantes->id }}</td>
                                    <td>{{ $fabricantes->nome }}</td>
                                    <td>{{ $fabricantes->descrição }}</td>
                                    <td>{{ $fabricantes->data }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btnEditar" ><i class="bi bi-pencil-square"></i></a>
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
    <script src="{{ asset('js/Fabricante.js') }}"></script>
@endpush
