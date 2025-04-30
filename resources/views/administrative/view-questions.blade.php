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
                    <h4>Visualizar Questão</h4>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Numero:</strong> {{ $question->number }}
                    </div>

                    <div class="mb-3">
                        <strong>Disciplina:</strong> {{ __('translate.' . $question->theme) }}
                    </div>

                    <div class="mb-3">
                        <strong>Enunciado:</strong> {!! $question->enunciation !!}
                    </div>

                    <div class="mb-3">
                        <strong>Imagem:</strong>
                        @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}" alt="Imagem da Questão" class="img-thumbnail" style="max-width: 100%; height: auto;">
                        @else
                        <p>Imagem não disponível.</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <strong>Alternativa Correta:</strong> {{ $question->correct_alternative }} min
                    </div>

                    <div class="mb-3">
                        <strong>Alternativa A:</strong> {{ $question->alternative_a }}
                    </div>

                    <div class="mb-3">
                        <strong>Alternativa B:</strong> {{ $question->alternative_b }}
                    </div>

                    <div class="mb-3">
                        <strong>Alternativa C:</strong> {{ $question->alternative_c }}
                    </div>

                    <div class="mb-3">
                        <strong>Alternativa D:</strong> {{ $question->alternative_d }}
                    </div>

                    <div class="mb-3">
                        <strong>Alternativa E:</strong> {{ $question->alternative_e }}
                    </div>

                    <div class="mb-3">
                        <strong>Resolução:</strong> {{ $question->resolution ?? 'Sem descrição disponível.' }}
                    </div>

                    <div class="mb-3">
                        <strong>Status:</strong> {{ __('translate.' . $question->status) }}
                    </div>

                    <div class="d-flex justify-content-center gap-2">
                        <x-buttons.view route="administrative.view-questions" :id="$question->id" message="Visualizar" />
                        <x-buttons.edit route="administrative.edit-questions" :id="$question->id" message="Editar" />
                    </div>

                    <hr>

                    <div class="text-center">
                        <h5>Detalhes da Simulado:</h5>
                    </div>

                    <div class="mb-3">
                        <strong>Nome:</strong> {{ $simulation->name }}
                    </div>

                    <div class="mb-3">
                        <strong>Tipo / Modelo:</strong> {{ __('translate.' . $simulation->type) }}
                    </div>

                    <div class="mb-3">
                        <strong>Ano:</strong> {{ $simulation->year }}
                    </div>

                    <div class="mb-3">
                        <strong>Edição:</strong> {{ $simulation->edition ?? 'N/A' }}
                    </div>

                    <div class="mb-3">
                        <strong>Mínimo em Minutos:</strong> {{ $simulation->minimum_minute }} min
                    </div>

                    <div class="mb-3">
                        <strong>Duração Total:</strong> {{ $simulation->total_duration }} min
                    </div>

                    <div class="mb-3">
                        <strong>Quantidade de Questões:</strong> {{ $simulation->quantity_questions }}
                    </div>

                    <div class="mb-3">
                        <strong>Tema da Redação:</strong> {{ $simulation->redaction_theme }}
                    </div>

                    <div class="mb-3">
                        <strong>Total de Pontos:</strong> {{ $simulation->total_points }}
                    </div>

                    <div class="mb-3">
                        <strong>Descrição:</strong> {{ $simulation->description ?? 'Sem descrição disponível.' }}
                    </div>

                    <div class="mb-3">
                        <strong>Status:</strong> {{ __('translate.' . $simulation->status) }}
                    </div>
                    <hr>
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
            </div>
        </div>
    </div>
</div>
<br>

@endsection