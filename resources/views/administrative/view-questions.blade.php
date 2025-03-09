@extends('layouts.connect')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-solid fa-sliders"></i> Painel Administrativo</h4>
                </div>
                <div class="card-body">
                    <p>Detalhes do simulado selecionado.</p>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative.dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative.dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i> Ver Questão</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative.dashboard-users') }}"> Dashboard Usuários <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Visualizar Questão</h4>
                </div>
                <div class="card-body">
                    <h5>Detalhes da Questão:</h5>
                    <label class="form-label"><strong>Numero:</strong> {{ $question->number }} </label>
                    <br>
                    <label class="form-label"><strong>Disciplina:</strong> {{ $question->theme }} </label>
                    <br>
                    <label class="form-label"><strong>Enunciado:</strong> {{ $question->enunciation }} </label>
                    <br>
                    <label class="form-label"><strong>Imagem:</strong></label>
                    @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}" alt="Imagem da Questão" class="img-thumbnail" style="max-width: 100%; height: auto;">
                    @else
                        <p>Imagem não disponível.</p>
                    @endif                    
                    <br>
                    <label class="form-label"><strong>Alternativa Correta:</strong> {{ $question->correct_alternative }} min </label>
                    <br>
                    <label class="form-label"><strong>Alternativa A:</strong> {{ $question->alternative_a }} </label>
                    <br>
                    <label class="form-label"><strong>Alternativa B:</strong> {{ $question->alternative_b }} </label>
                    <br>
                    <label class="form-label"><strong>Alternativa C:</strong> {{ $question->alternative_c }} </label>
                    <br>
                    <label class="form-label"><strong>Alternativa D:</strong> {{ $question->alternative_d }} </label>
                    <br>
                    <label class="form-label"><strong>Alternativa E:</strong> {{ $question->alternative_e }} </label>
                    <br>
                    <label class="form-label"><strong>Resolução:</strong> {{ $question->resolution ?? 'Sem descrição disponível.' }} </label>
                    <br>
                    <label class="form-label"><strong>Status:</strong> {{ $question->status }} </label>
                    <br>
                    <div class="text-center">
                        <a href="{{ route('administrative.view-questions', $question->id) }}" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Visualizar
                        </a>
                        <a href="{{ route('administrative.edit-questions', $question->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i> Editar
                        </a>
                    </div>
                    <hr>
                    <h5>Detalhes da Simulado:</h5>
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
                    <hr>
                    <div class="text-center">
                        <!-- Botão Visualizar mais claro, indicando que você está na tela atual -->
                        <a href="{{ route('administrative.view-simulations', $simulation->id) }}" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Visualizar
                        </a>
                        <a href="{{ route('administrative.edit-simulations', $simulation->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i> Editar
                        </a>
                        @if ($simulation->status == 'disabled')
                        <form action="{{ route('administrative.enable-questions', $simulation->id) }}" method="POST" style="display: inline-block;">
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
                </div>
                <br>
            </div>
        </div>
    </div>

    @endsection