@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-4" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Dashboard Usuários</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <p>Nesta seção, você pode pesquisar, editar, deletar ou adicionar um novo usuário.</p>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col-md-3">
                        <x-buttons.filter text="Pesquisar" route="administrative.filter-users" />
                    </div>
                    <div class="col-md-8">
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">{{ $user->phone }}</td>
                                <td class="text-center">{{ __('translate.' . $user->status) }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <x-buttons.view route="administrative.view-users" :id="$user->id" />
                                        @if($user->status == 'disabled')
                                        <x-buttons.enable route="administrative.enable-users" :id="$user->id" />
                                        @else
                                        <x-buttons.disable route="administrative.disable-users" :id="$user->id" />
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-buttons.pagination :entities="$users" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection