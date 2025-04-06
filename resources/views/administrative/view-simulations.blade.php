@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-solid fa-sliders"></i> Administrativo</h4>
                </div>
                <div class="card-body">
                    <p>Detalhes do simulado selecionado.</p>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative.dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative.dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i> Ver Simulado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative.dashboard-users') }}"> Dashboard Usuários <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Visualizar Simulado</h4>
                </div>
                <div class="card-body">
                    <p>Detalhes do simulado:</p>
                    <label class="form-label"><strong>Nome:</strong> {{ $simulation->name }} </label>
                    <br>
                    <label class="form-label"><strong>Tipo / Modelo:</strong> {{ $simulation->type }} </label>
                    <br>
                    <label class="form-label"><strong>Ano:</strong> {{ $simulation->year }} </label>
                    <br>
                    <label class="form-label"><strong>Edição:</strong> {{ $simulation->edition ?? 'N/A' }} </label>
                    <br>
                    <label class="form-label"><strong>Mínimo em Minutos:</strong> {{ $simulation->minimum_minute }} min </label>
                    <br>
                    <label class="form-label"><strong>Duração Total:</strong> {{ $simulation->total_duration }} min </label>
                    <br>
                    <label class="form-label"><strong>Quantidade de Questões:</strong> {{ $simulation->quantity_questions }} </label>
                    <br>
                    <label class="form-label"><strong>Tema da Redação:</strong> {{ $simulation->redaction_theme }} </label>
                    <br>
                    <label class="form-label"><strong>Total de Pontos:</strong> {{ $simulation->total_points }} </label>
                    <br>
                    <label class="form-label"><strong>Descrição:</strong> {{ $simulation->description ?? 'Sem descrição disponível.' }} </label>
                    <br>
                    <label class="form-label"><strong>Status:</strong> {{ $simulation->status }} </label>
                    <br>
                    <!-- Botões de ação -->
                    <div class="text-center">
                        <!-- Botão Visualizar mais claro, indicando que você está na tela atual -->
                        <a href="{{ route('administrative.view-simulations', $simulation->id) }}" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Visualizar
                        </a>
                        <a href="{{ route('administrative.edit-simulations', $simulation->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i> Editar
                        </a>
                        @if ($simulation->status == 'disabled')
                        <form action="{{ route('administrative.enable-simulations', $simulation->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-check"></i> Habilitar
                            </button>
                        </form>
                        @else
                        <form action="{{ route('administrative.disable-simulations', $simulation->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-times"></i> Desabilitar
                            </button>
                        </form>
                        @endif
                    </div>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <th>Numero</th>
                                <th>Disciplina</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                            <tr style="text-align: center">
                                <td>
                                    {{$question->number}}
                                </td>
                                <td>
                                    {{$question->theme}}
                                </td>
                                <td>
                                    <form action="{{ route('administrative.view-questions', $question->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" class="btn btn-info" title="Visualizar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('administrative.edit-questions', $question->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" class="btn btn-warning" title="Editar">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Adicione a paginação aqui -->
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{ $questions->links('vendor.pagination.bootstrap-4') }}
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