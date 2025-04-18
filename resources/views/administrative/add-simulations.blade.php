@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>


        <div class="col-md-7">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
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
                            <label for="redaction_introduction" class="form-label">Texto Introdutório</label>
                            <textarea class="form-control" id="redaction_introduction" name="redaction_introduction" rows="3"></textarea>
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
                            <x-buttons.submit />
                        </center>
                    </form>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>

@endsection