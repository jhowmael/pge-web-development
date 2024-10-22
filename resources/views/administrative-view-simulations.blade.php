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
                            <a class="nav-link" href="{{ route('administrative-dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative-dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i> Ver Simulado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('administrative-dashboard-users') }}"> Dashboard Usuários <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Visualizar Simulado</h4>
                </div>
                <div class="card-body">
                    <p>Detalhes do simulado:</p>

                    <div class="mb-3">
                        <label class="form-label"><strong>Nome:</strong></label>
                        <p>{{ $simulation->name }}</p>
                    </div>

                    <!-- Detalhes do simulado -->
                    <div class="mb-3">
                        <label class="form-label"><strong>Tipo / Modelo:</strong></label>
                        <p>{{ $simulation->type }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Ano:</strong></label>
                        <p>{{ $simulation->year }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Edição:</strong></label>
                        <p>{{ $simulation->edition ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Mínimo em Minutos:</strong></label>
                        <p>{{ $simulation->minimum_minute }} min</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Duração Total:</strong></label>
                        <p>{{ $simulation->total_duration }} min</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Quantidade de Questões:</strong></label>
                        <p>{{ $simulation->quantity_questions }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Tema da Redação:</strong></label>
                        <p>{{ $simulation->redaction_theme }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Total de Pontos:</strong></label>
                        <p>{{ $simulation->total_points }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Descrição:</strong></label>
                        <p>{{ $simulation->description ?? 'Sem descrição disponível.' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><strong>Status:</strong></label>
                        <p>{{ $simulation->status }}</p>
                    </div>

                    <!-- Botões de ação -->
                    <div class="text-center">
                        <!-- Botão Visualizar mais claro, indicando que você está na tela atual -->
                        <button class="btn btn-info active" disabled>
                            <i class="fa-solid fa-magnifying-glass"></i> Visualizar
                        </button>
                        <a href="{{ route('administrative-edit-simulations', $simulation->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i> Editar
                        </a>
                        
                        @if ($simulation->status == 'disabled')
                            <form action="{{ route('administrative-enable-simulations', $simulation->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-solid fa-check"></i> Habilitar
                                </button>
                            </form>
                        @else
                            <form action="{{ route('administrative-disable-simulations', $simulation->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-times"></i> Desabilitar
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
