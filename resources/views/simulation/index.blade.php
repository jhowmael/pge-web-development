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
                    <h4>Filtrar Simulados</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrative.filter-simulations') }}" method="GET">
                        <div class="mb-3">
                            <label for="type" class="form-label"><strong>Tipo / Modelo:</strong></label>
                            <select class="form-select" class="form-control" name="type" value="{{ request('type') }}">
                                <option></option>
                                @foreach (config(key: 'simulations.types') as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><strong>Ano:</strong></label>
                            <input type="number" class="form-control" name="year" value="{{ request('year') }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>

                    <h5 class="mt-4">Resultados da Busca:</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ano</th>
                                <th scope="col">Edição</th>
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
                                <td>
                                    <form action="{{ route('simulation.start', $simulation->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" class="btn btn-success" title="Iniciar">
                                            <i class="fa-solid fa-forward"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection