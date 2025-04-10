@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Editar Simulado</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrative.update-simulations', $simulation->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <strong>Tipo / Modelo:</strong>
                            <input type="text" class="form-control" name="type" value="{{ old('type', $simulation->type) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Ano:</strong>
                            <input type="number" class="form-control" name="year" value="{{ old('year', $simulation->year) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Edição:</strong>
                            <input placeholder="Campo opcional" type="text" class="form-control" name="edition" value="{{ old('edition', $simulation->edition) }}">
                        </div>
                        <div class="mb-3">
                            <strong>Mínimo em Minutos:</strong>
                            <input type="number" class="form-control" name="minimum_minute" value="{{ old('minimum_minute', $simulation->minimum_minute) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Duração Total:</strong>
                            <input type="number" class="form-control" name="total_duration" value="{{ old('total_duration', $simulation->total_duration) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Quantidade de Questões:</strong>
                            <input type="number" class="form-control" name="quantity_questions" value="{{ old('quantity_questions', $simulation->quantity_questions) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Tema da Redação:</strong>
                            <input type="text" class="form-control" name="redaction_theme" value="{{ old('redaction_theme', $simulation->redaction_theme) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Total de Pontos:</strong>
                            <input type="number" class="form-control" name="total_points" value="{{ old('total_points', $simulation->total_points) }}" required>
                        </div>
                        <div class="mb-3">
                            <strong>Descrição:</strong>
                            <textarea class="form-control" name="description">{{ old('description', $simulation->description) }}</textarea>
                        </div>
                        <div class="text-center">
                            <x-buttons.submit text="Editar Simulado" />
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
