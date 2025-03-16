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
                            <a class="nav-link" href="{{ route('administrative.dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('administrative.dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i> Novo Simulado</a>
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
                    <h4>Adicionar Novo Simulado</h4>
                </div>
                <div class="card-body">
                    <p>Preencha o formulário com os dados do simulado</p>

                    <!-- Exibir mensagens de sucesso -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Formulário para adicionar um novo simulado -->
                    <form action="{{ route('administrative.store-simulations') }}" method="POST">
                        @csrf <!-- Proteção contra CSRF -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipo / Modelo</label>
                            <select class="form-select" id="type" name="type" required>
                                @foreach (config('simulations.types') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Ano</label>
                            <input type="number" class="form-control" id="year" name="year" required>
                        </div>

                        <div class="mb-3">
                            <label for="edition" class="form-label">Edição</label>
                            <input placeholder="opcional" type="text" class="form-control" id="edition" name="edition">
                        </div>

                        <div class="mb-3">
                            <label for="minimum_minute" class="form-label">Mínimo em Minutos</label>
                            <input type="number" class="form-control" id="minimum_minute" name="minimum_minute" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_duration" class="form-label">Duração Total</label>
                            <input type="number" class="form-control" id="total_duration" name="total_duration" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity_questions" class="form-label">Quantidade de Questões</label>
                            <input type="number" class="form-control" id="quantity_questions" name="quantity_questions" required>
                        </div>

                        <div class="mb-3">
                            <label for="redaction_theme" class="form-label">Tema da Redação</label>
                            <input type="text" class="form-control" id="redaction_theme" name="redaction_theme" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_points" class="form-label">Total de Pontos</label>
                            <input type="number" class="form-control" id="total_points" name="total_points" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-success">Adicionar Simulado</button>
                        </center>
                    </form>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>

@endsection