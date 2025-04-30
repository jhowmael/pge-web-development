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
                    <h3 class="card-title"> Visualizar Simulado </h3>
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
                        <strong>Livro:</strong> {{ __('translate.' . $simulation->book) ?? 'N/A' }}
                    </div>

                    <div class="mb-3">
                        <strong>Linguagem:</strong> {{ __('translate.' . $simulation->lengague)  ?? 'N/A' }}
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
                    <!-- Botões de ação -->
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
                    <table class="table">
                        <thead>
                            <tr style="text-align: center">
                                <th class="text-center">Numero</th>
                                <th class="text-center">Disciplina</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                            <tr style="text-align: center">
                                <td class="text-center">
                                    {{$question->number}}
                                </td>
                                <td class="text-center">
                                    {{ __('translate.' . $question->theme) }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <x-buttons.view route="administrative.view-questions" :id="$question->id" />
                                        <x-buttons.edit route="administrative.edit-questions" :id="$question->id" />
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Adicione a paginação aqui -->
                    <x-buttons.pagination :entities="$questions" />
                    <center>
                        <x-buttons.back route="administrative.dashboard-simulations" />
                    </center>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection