@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Filtrar Usuários</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrative.filter-users') }}" method="GET">

                        <div class="mb-3">
                            <label class="form-label"><strong>Nome:</strong></label>
                            <input type="name" class="form-control" name="name" value="{{ request('name') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>E-mail:</strong></label>
                            <input type="email" class="form-control" name="email" value="{{ request('email') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Telefone:</strong></label>
                            <input type="phone" class="form-control" name="phone" value="{{ request('phone') }}">
                        </div>


                        <div class="text-center">
                            <x-buttons.submit text="Filtrar" />
                        </div>
                    </form>

                    <h5 class="mt-4">Resultados da Busca:</h5>
                    <div class="row">
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
                    </div>
                    <x-buttons.pagination :entities="$users" />
                </div>
            </div>
        </div>
        <br>
    </div>
</div>

@endsection