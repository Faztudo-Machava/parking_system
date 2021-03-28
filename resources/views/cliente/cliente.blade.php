<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link href="{{ asset('site/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('swiper/swiper-bundle.min.css') }}" rel="stylesheet">
</head>

<body>




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
    <form id="formUpdCliente">
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

    <div class="container">
        <h1 class="mb-2">Cliente</h1>
        <button type="submit" class="btn mt-mb-4 f-right" data-bs-toggle="modal" data-bs-target="#cadCliente"> Novo
            cliente </button>
        <table class="table" id="tableCliente">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Apelido</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Email</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Data de chegada</th>
                    <th scope="col text-center" colspan="3">Acções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <th scope="row">{{ $cliente->id }}</th>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->apelido }}</td>
                        <td>{{ $cliente->genero }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->saldo }}</td>
                        <td>{{ $cliente->estado == 1 ? 'Ativo' : 'Inativo' }}</td>
                        <td>{{ $cliente->created_at }}</td>
                        <td>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#visualizar"
                                value="{{ $cliente->id }}"><i class="bi bi-eye-fill"></i></button>
                        </td>
                        <td>
                            <button id="btnEditar{{ $cliente->id }}" class="btn btn-primary btnEditar"
                                data-bs-toggle="modal" data-bs-target="#editar" value="{{ $cliente->id }}"><i
                                    class="bi bi-pencil-square"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-danger" value="{{ $cliente->id }}"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{asset('site/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('php-email-form/validate.js') }}"></script>
    <script src="{{ asset('swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#tableCliente').DataTable();
            var tabela = $('#tableCliente').DataTable();
            tabela.on('click','.btnEditar', function(){
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent')
                }

                var dados = tabela.row($tr).data();
                console.log(dados);

                $('#txtNome').val(dados[1]);
                $('#txtApelido').val(dados[2]);
                $('#txtEmail').val(dados[4]);
                $('#jcGenero').val(dados[3]);
                $('#txtSaldo').val(dados[5]);
                $('#formUpdCliente').attr('action', '/editCliente/'+dados[0])
                $('#editar').modal('show');
            })

            $('#formAddCliente').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "/clienteAdd",
                    data: $('#formAddCliente').serialize(),
                    success: function(response){
                        console.log(response)
                        $('#cadCliente').modal('hide')
                        alert("Cliente cadastrado com sucesso")
                    },
                    error: function(error){
                        console.log(error)
                        alert("Cliente não cadatrado, algo correu mal.");
                    }
                })
            })
        });
        </script>

</body>

</html>
