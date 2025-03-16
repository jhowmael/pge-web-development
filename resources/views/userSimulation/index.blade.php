@extends('layouts.app')

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
                            <a class="nav-link" href="learn">Introdução<i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('simulation.index') }}">Praticar com simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('redaction.index') }}">Histórico de redações <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userSimulation.index') }}">Histórico de simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
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