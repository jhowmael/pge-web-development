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
                            <a class="nav-link" href="{{ route('administrative.dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative.dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative.dashboard-users') }}"> Dashboard Usuários <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Dashboard Usuários</h4>
                </div>
                <div class="card-body">
                    <p>Nesta seção, você pode pesquisar, editar, deletar ou adicionar um novo usuário.</p>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card mx-3 mb-4">
                            <div class="card-header bg-primary text-white text-center">
                                <h4><i class="fa-solid fa-magnifying-glass"></i> <a class="text-white text-decoration-none" href=""> Pesquisar </a></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Você pode adicionar conteúdo aqui se necessário -->
                    </div>
                    <div class="col-md-4">
                        <div class="card mx-3 mb-4">
                            <div class="card-header bg-success text-white text-center">
                                <h4><i class="fa-solid fa-plus"></i> <a class="text-white text-decoration-none" href=""> Novo Usuário </a></h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-header text-center">
                    <h4>Ultimos Usuários</h4>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jonatan Ismael dos Santos</td>
                            <td>jonatan.ismael996@gmail.com</td>
                            <td><i class="fa-solid fa-magnifying-glass"></i> <i class="fa-solid fa-delete-left"></i> <i class="fa-solid fa-pen-to-square"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jonatan Ismael dos Santos</td>
                            <td>jonatan.ismael996@gmail.com</td>
                            <td><i class="fa-solid fa-magnifying-glass"></i> <i class="fa-solid fa-delete-left"></i> <i class="fa-solid fa-pen-to-square"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jonatan Ismael dos Santos</td>
                            <td>jonatan.ismael996@gmail.com</td>
                            <td><i class="fa-solid fa-magnifying-glass"></i> <i class="fa-solid fa-delete-left"></i> <i class="fa-solid fa-pen-to-square"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection