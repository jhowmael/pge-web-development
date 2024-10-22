@extends('layouts.connect')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-solid fa-sliders"></i> Painel Administrativo </h4>
                </div>
                <div class="card-body">
                    <p>Painel onde é possível cadastrar simulados e gerenciar usuários de forma prática e centralizada.</p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative-dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative-dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative-dashboard-users') }}"> Dashboard Usuários <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Dashboard Simulados</h4>
                </div>
                <div class="card-body">
                    <p>Nesta seção, você pode pesquisar, editar, desabilitar ou adicionar um novo simulado.</p>
                    
                    <!-- Exibir Mensagem de Sucesso -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mx-3 mb-4">
                            <div class="card-header bg-primary text-white text-center">
                                <h4><i class="fa-solid fa-magnifying-glass"></i> <a class="text-white text-decoration-none" href="{{ route('administrative-filter-simulations') }}"> Pesquisar </a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Você pode adicionar conteúdo aqui se necessário -->
                    </div>
                    <div class="col-md-4">
                        <div class="card mx-3 mb-4">
                            <div class="card-header bg-success text-white text-center">
                                <h4><i class="fa-solid fa-plus"></i>
                                    <a class="text-white text-decoration-none" href="{{ route('administrative-add-simulations') }}"> Novo Simulado </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header text-center">
                    <h4>Últimos Simulados</h4>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ano</th>
                            <th scope="col">Edição</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($simulations as $simulation)
                        <tr style="text-align: center">
                            <th scope="row">{{ $simulation->id }}</th>
                            <td>{{ $simulation->name }}</td>
                            <td>{{ $simulation->year }}</td>
                            <td>{{ $simulation->edition ?? 'n/a' }}</td>
                            <td>{{ $simulation->status }}</td>
                            <td>
                                <form action="{{ route('administrative-view-simulations', $simulation->id) }}" method="GET" style="display:inline-block;">
                                    <button type="submit" class="btn btn-info" title="Visualizar">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                                <form action="{{ route('administrative-edit-simulations', $simulation->id) }}" method="GET" style="display:inline-block;">
                                    <button type="submit" class="btn btn-warning" title="Editar">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </form>
                                @if($simulation->status == 'disabled')
                                    <form action="{{ route('administrative-enable-simulations', $simulation->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success" title="Habilitar">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('administrative-disable-simulations', $simulation->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" title="Desabilitar">
                                            <i class="fa-solid fa-delete-left"></i>
                                        </button>
                                    </form>
                                @endif
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
