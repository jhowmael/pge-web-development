@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.learn-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Histórico de simulados</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Edição</th>
                                <th scope="col">Potuação</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSimulations as $userSimulation)
                            <tr style="text-align: center">
                                <td>{{ $userSimulation->simulation->name }}</td>
                                <td>{{ $userSimulation->total_score }}</td>
                                <td>{{ $userSimulation->created_at }}</td>
                                <td>{{ $userSimulation->status }}</td>
                                <td>
                                    <form action="{{ route('userSimulation.view', $userSimulation->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" class="btn btn-info" title="Visualizar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{ $userSimulations->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection