@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-solid fa-sliders"></i> Painel Administrativo</h4>
                </div>
                <div class="card-body">
                    <p>Editar detalhes do simulado selecionado.</p>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative.dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative.dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i> Editar Simulado</a>
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
                    <h4>Editar Simulado</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrative.update-simulations', $simulation->id) }}" method="POST">
                        @csrf
                        <!-- Tipo -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Tipo / Modelo:</strong></label>
                            <input type="text" class="form-control" name="type" value="{{ old('type', $simulation->type) }}" required>
                        </div>

                        <!-- Ano -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Ano:</strong></label>
                            <input type="number" class="form-control" name="year" value="{{ old('year', $simulation->year) }}" required>
                        </div>

                        <!-- Edição -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Edição:</strong></label>
                            <input placeholder="Campo opcional" type="text" class="form-control" name="edition" value="{{ old('edition', $simulation->edition) }}">
                        </div>

                        <!-- Mínimo em Minutos -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Mínimo em Minutos:</strong></label>
                            <input type="number" class="form-control" name="minimum_minute" value="{{ old('minimum_minute', $simulation->minimum_minute) }}" required>
                        </div>

                        <!-- Duração Total -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Duração Total:</strong></label>
                            <input type="number" class="form-control" name="total_duration" value="{{ old('total_duration', $simulation->total_duration) }}" required>
                        </div>

                        <!-- Quantidade de Questões -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Quantidade de Questões:</strong></label>
                            <input type="number" class="form-control" name="quantity_questions" value="{{ old('quantity_questions', $simulation->quantity_questions) }}" required>
                        </div>

                        <!-- Tema da Redação -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Tema da Redação:</strong></label>
                            <input type="text" class="form-control" name="redaction_theme" value="{{ old('redaction_theme', $simulation->redaction_theme) }}" required>
                        </div>

                        <!-- Total de Pontos -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Total de Pontos:</strong></label>
                            <input type="number" class="form-control" name="total_points" value="{{ old('total_points', $simulation->total_points) }}" required>
                        </div>

                        <!-- Descrição -->
                        <div class="mb-3">
                            <label class="form-label"><strong>Descrição:</strong></label>
                            <textarea class="form-control" name="description">{{ old('description', $simulation->description) }}</textarea>
                        </div>

                        <!-- Botão de Enviar -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Editar Simulado</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
