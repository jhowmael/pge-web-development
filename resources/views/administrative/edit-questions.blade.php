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
                            <a class="nav-link active" href="{{ route('administrative.dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i> Editar Questão</a>
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
                    <hr>
                    <!-- Botões de ação -->
                    <div class="text-center">
                        <!-- Botão Visualizar mais claro, indicando que você está na tela atual -->
                         <a href="{{ route('administrative.view-simulations', $simulation->id) }}" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Visualizar
                        </a>
                        <a href="{{ route('administrative.edit-questions', $question->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i> Editar
                        </a>
                        @if ($simulation->status == 'disabled')
                        <form action="{{ route('administrative.enable-questions', $question->id) }}" method="POST" style="display: inline-block;">
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
                    <div class="card mb-12">
                        <div class="card-header text-center">
                            <h4>Editar Questão {{$question->number}} </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('administrative.update-questions', $question->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                  
                                <div class="mb-3">
                                    <label for="theme" class="form-label"><strong>Disciplina</strong></label>
                                    <select class="form-select" id="theme" name="theme" required>
                                        @foreach (config('questions.themes') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><strong>Enunciado</strong></label>
                                    <input type="text" class="form-control" name="enunciation" value="{{ old('enunciation', $question->enunciation) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label"><strong>Imagem</strong></label>
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
                                    <label for="correct_alternative" class="form-label"><strong>Alternativa Correta</strong></label>
                                    <select class="form-select" id="correct_alternative" name="correct_alternative" required>
                                        @foreach (config('questions.correct_alternatives') as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><strong>Alternativa A:</strong></label>
                                    <input type="text" class="form-control" name="alternative_a" value="{{ old('alternative_a', $simulation->alternative_a) }}" required>
                                </div>

                                <div class="mb-3">
                    <label for="alternative_a_image" class="form-label"><strong>Imagem da Alternativa A</strong></label>
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
                        <label class="form-label"><strong>Alternativa B:</strong></label>
                        <input type="text" class="form-control" name="alternative_b" value="{{ old('alternative_b', $simulation->alternative_b) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="alternative_b_image" class="form-label"><strong>Imagem da Alternativa B</strong></label>
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
                        <label class="form-label"><strong>Alternativa C:</strong></label>
                        <input type="text" class="form-control" name="alternative_c" value="{{ old('alternative_c', $simulation->alternative_c) }}" required>
                    </div>

                                                <div class="mb-3">
                    <label for="alternative_c_image" class="form-label"><strong>Imagem da Alternativa C</strong></label>
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
                    <label class="form-label"><strong>Alternativa D:</strong></label>
                    <input type="text" class="form-control" name="alternative_d" value="{{ old('alternative_d', $simulation->alternative_d) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alternative_d_image" class="form-label"><strong>Imagem da Alternativa D</strong></label>
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
                                    <label class="form-label"><strong>Alternativa E:</strong></label>
                                    <input type="text" class="form-control" name="alternative_e" value="{{ old('alternative_e', $simulation->alternative_e) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="alternative_e_image" class="form-label"><strong>Imagem da Alternativa E</strong></label>
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
                                    <label class="form-label"><strong>Resolução:</strong></label>
                                    <input type="text" class="form-control" name="resolution" value="{{ old('resolution', $simulation->resolution) }}" required>
                                </div>

                                <!-- Botão de Enviar -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Editar Simulado</button>
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