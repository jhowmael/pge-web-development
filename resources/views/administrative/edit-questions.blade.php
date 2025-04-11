@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-4" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Visualizar Simulado</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3"><strong>Nome:</strong> {{ $simulation->name }}</div>
                    <div class="mb-3"><strong>Tipo / Modelo:</strong> {{ __('translate.' . $simulation->type) }}</div>
                    <div class="mb-3"><strong>Ano:</strong> {{ $simulation->year }}</div>
                    <div class="mb-3"><strong>Edição:</strong> {{ $simulation->edition ?? 'N/A' }}</div>
                    <div class="mb-3"><strong>Mínimo em Minutos:</strong> {{ $simulation->minimum_minute }} min</div>
                    <div class="mb-3"><strong>Duração Total:</strong> {{ $simulation->total_duration }} min</div>
                    <div class="mb-3"><strong>Quantidade de Questões:</strong> {{ $simulation->quantity_questions }}</div>
                    <div class="mb-3"><strong>Tema da Redação:</strong> {{ $simulation->redaction_theme }}</div>
                    <div class="mb-3"><strong>Total de Pontos:</strong> {{ $simulation->total_points }}</div>
                    <div class="mb-3"><strong>Descrição:</strong> {{ $simulation->description ?? 'Sem descrição disponível.' }}</div>
                    <div class="mb-3"><strong>Status:</strong> {{ __('translate.' . $simulation->status) }}</div>

                    <hr>
                    <div class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <x-buttons.view route="administrative.view-simulations" :id="$simulation->id" message="Visualizar" />
                            <x-buttons.edit route="administrative.edit-simulations" :id="$simulation->id" message="Editar" />
                            @if($simulation->status == 'disabled')
                                <x-buttons.enable route="administrative.enable-simulations" :id="$simulation->id" message="Habilitar" />
                            @else
                                <x-buttons.disable route="administrative.disable-simulations" :id="$simulation->id" message="Desabilitar" />
                            @endif
                        </div>
                    </div>
                    <hr>

                    {{-- Formulário de Edição de Questão --}}
                    <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                        <div class="card-header text-center">
                            <h4>Editar Questão {{ $question->number }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('administrative.update-questions', $question->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- Disciplina --}}
                                <div class="mb-3">
                                    <strong>Disciplina</strong>
                                    <select class="form-select" id="theme" name="theme" required>
                                        @foreach (config('questions.themes') as $key => $value)
                                            <option value="{{ $key }}" {{ old('theme', $question->theme) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Enunciado --}}
                                <div class="mb-3">
                                    <strong>Enunciado</strong>
                                    <input type="text" class="form-control" name="enunciation" value="{{ old('enunciation', $question->enunciation) }}" required>
                                </div>

                                {{-- Imagem geral da questão --}}
                                <div class="mb-3">
                                    <strong>Imagem</strong>
                                    <input type="file" name="image" class="form-control">
                                    @if($question->image)
                                        <p class="text-muted">Imagem Atual:</p>
                                        <img src="{{ asset('storage/' . $question->image) }}" alt="Imagem Questão" class="img-thumbnail" style="max-width: 150px;">
                                    @endif
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Alternativa Correta --}}
                                <div class="mb-3">
                                    <strong>Alternativa Correta</strong>
                                    <select class="form-select" name="correct_alternative" required>
                                        @foreach (config('questions.correct_alternatives') as $key => $value)
                                            <option value="{{ $key }}" {{ old('correct_alternative', $question->correct_alternative) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Alternativas com imagens --}}
                                @foreach (['a','b','c','d','e'] as $letter)
                                    <div class="row mb-3">
                                        <div class="col-md-7">
                                            <strong>Alternativa {{ strtoupper($letter) }}:</strong>
                                            <input type="text" class="form-control" name="alternative_{{ $letter }}" value="{{ old("alternative_$letter", $question["alternative_$letter"]) }}" required>
                                        </div>
                                        <div class="col-md-5">
                                            <strong>Imagem da Alternativa {{ strtoupper($letter) }}</strong>
                                            <input type="file" name="alternative_{{ $letter }}_image" class="form-control">
                                            @if($question["alternative_{$letter}_image"])
                                                <p class="text-muted">Imagem Atual:</p>
                                                <img src="{{ asset('storage/' . $question["alternative_{$letter}_image"]) }}" alt="Imagem Alternativa {{ strtoupper($letter) }}" class="img-thumbnail" style="max-width: 100px;">
                                            @endif
                                            @error("alternative_{$letter}_image")
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Resolução --}}
                                <div class="mb-3">
                                    <strong>Resolução:</strong>
                                    <textarea class="form-control" name="resolution" rows="5" required>{{ old('resolution', $question->resolution) }}</textarea>
                                </div>

                                {{-- Botão de envio --}}
                                <div class="text-center">
                                    <x-buttons.submit text="Editar Questão" />
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
