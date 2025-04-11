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
                    <h4>Visualizar Simulado</h4>
                </div>
                <div class="card-body">
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
                    <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                        <div class="card-header text-center">
                            <h4>Editar Questão {{$question->number}} </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('administrative.update-questions', $question->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <strong>Disciplina</strong>
                                    <select class="form-select" id="theme" name="theme" required>
                                        @foreach (config('questions.themes') as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <strong>Enunciado</strong>
                                    <input type="text" class="form-control" name="enunciation" value="{{ old('enunciation', $question->enunciation) }}" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Imagem</strong>
                                    <input type="file" id="image" name="image" class="form-control">
                                    @if($question->image)
                                    <p class="text-muted">Imagem Atual:</p>
                                    <img src="{{ asset('storage/' . $question->image) }}" alt="Foto de Perfil" class="img-thumbnail">
                                    @endif
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <strong>Alternativa Correta</strong>
                                    <select class="form-select" id="correct_alternative" name="correct_alternative" required>
                                        @foreach (config('questions.correct_alternatives') as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <strong>Alternativa A:</strong>
                                    <input type="text" class="form-control" name="alternative_a" value="{{ old('alternative_a', $simulation->alternative_a) }}" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Imagem da Alternativa A</strong>
                                    <input type="file" id="alternative_a_image" name="alternative_a_image" class="form-control">
                                    @if($question->alternative_a_image)
                                    <p class="text-muted">Imagem Atual:</p>
                                    <img src="{{ asset('storage/' . $question->alternative_a_image) }}" alt="Imagem Alternativa A" class="img-thumbnail">
                                    @endif
                                    @error('alternative_a_image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <strong>Alternativa B:</strong></label>
                                    <input type="text" class="form-control" name="alternative_b" value="{{ old('alternative_b', $simulation->alternative_b) }}" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Imagem da Alternativa B</strong>
                                    <input type="file" id="alternative_b_image" name="alternative_b_image" class="form-control">
                                    @if($question->alternative_b_image)
                                    <p class="text-muted">Imagem Atual:</p>
                                    <img src="{{ asset('storage/' . $question->alternative_b_image) }}" alt="Imagem Alternativa B" class="img-thumbnail">
                                    @endif
                                    @error('alternative_b_image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <strong>Alternativa C:</strong>
                                    <input type="text" class="form-control" name="alternative_c" value="{{ old('alternative_c', $simulation->alternative_c) }}" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Imagem da Alternativa C</strong>
                                    <input type="file" id="alternative_c_image" name="alternative_c_image" class="form-control">
                                    @if($question->alternative_c_image)
                                    <p class="text-muted">Imagem Atual:</p>
                                    <img src="{{ asset('storage/' . $question->alternative_c_image) }}" alt="Imagem Alternativa C" class="img-thumbnail">
                                    @endif
                                    @error('alternative_c_image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <strong>Alternativa D:</strong>
                                    <input type="text" class="form-control" name="alternative_d" value="{{ old('alternative_d', $simulation->alternative_d) }}" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Imagem da Alternativa D</strong>
                                    <input type="file" id="alternative_d_image" name="alternative_d_image" class="form-control">
                                    @if($question->alternative_d_image)
                                    <p class="text-muted">Imagem Atual:</p>
                                    <img src="{{ asset('storage/' . $question->alternative_d_image) }}" alt="Imagem Alternativa D" class="img-thumbnail">
                                    @endif
                                    @error('alternative_d_image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <strong>Alternativa E:</strong>
                                    <input type="text" class="form-control" name="alternative_e" value="{{ old('alternative_e', $simulation->alternative_e) }}" required>
                                </div>

                                <div class="mb-3">
                                    <strong>Imagem da Alternativa E</strong>
                                    <input type="file" id="alternative_e_image" name="alternative_e_image" class="form-control">
                                    @if($question->alternative_e_image)
                                    <p class="text-muted">Imagem Atual:</p>
                                    <img src="{{ asset('storage/' . $question->alternative_e_image) }}" alt="Imagem Alternativa E" class="img-thumbnail">
                                    @endif
                                    @error('alternative_e_image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <strong>Resolução:</strong>
                                    <textarea class="form-control" name="resolution" rows="5" required>{{ old('resolution', $simulation->resolution) }}</textarea>
                                </div>

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