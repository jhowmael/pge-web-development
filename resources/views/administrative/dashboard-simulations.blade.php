@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <!-- Card Principal (sem alteração de cor) -->
            <div class="card mb-4" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Dashboard Simulados</h4>
                </div>
                <div class="card-body">
                    <!-- Descrição -->
                    <div class="text-center mb-4">
                        <p>Nesta seção, você pode pesquisar, editar, desabilitar ou adicionar um novo simulado.</p>
                    </div>

                    <!-- Mensagem de Sucesso -->
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>

                <!-- Botões de Ação -->
                <div class="row justify-content-center mb-4">
                    <div class="col-md-3">
                        <x-buttons.filter text="Pesquisar" route="administrative.filter-simulations" />
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3">
                        <x-buttons.add text="Novo" route="administrative.add-simulations" />
                    </div>
                </div>

                <!-- Tabela de Simulados -->
                <h4 class="text-center mb-4">Últimos Simulados</h4>
                <table class="table table-hover">
                <thead class="table-light">
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Edição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($simulations as $simulation)
                    <tr class="text-center">
                        <th scope="row">{{ $simulation->id }}</th>
                        <td>{{ $simulation->name }}</td>
                        <td>{{ $simulation->year }}</td>
                        <td>{{ $simulation->edition ?? 'n/a' }}</td>
                        <td>
                            <span class="badge {{ $simulation->status == 'disabled' ? 'bg-danger' : 'bg-success' }} text-uppercase">
                                {{ ucfirst($simulation->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <x-buttons.view route="administrative.view-simulations" :id="$simulation->id" />
                                <x-buttons.edit route="administrative.edit-simulations" :id="$simulation->id" />
                                @if($simulation->status == 'disabled')
                                <x-buttons.enable route="administrative.enable-simulations" :id="$simulation->id" />
                                @else
                                <x-buttons.disable route="administrative.disable-simulations" :id="$simulation->id" />
                                @endif
                            </div>
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