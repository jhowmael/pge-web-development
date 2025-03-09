@extends('layouts.connect')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Resultado da Simulação</h2>

    <!-- Exibindo os campos da variável userSimulation -->
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Detalhes da Simulação</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Códigos de Linguagens e Tecnologias:</strong>
                </div>
                <div class="col-md-8">
                    <p>{{ $userSimulation->languages_codes_technologies }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Ciências Humanas e Tecnologias:</strong>
                </div>
                <div class="col-md-8">
                    <p>{{ $userSimulation->human_sciences_technologies }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Ciências da Natureza e Tecnologias:</strong>
                </div>
                <div class="col-md-8">
                    <p>{{ $userSimulation->natural_sciences_technologies }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Matemática e Tecnologias:</strong>
                </div>
                <div class="col-md-8">
                    <p>{{ $userSimulation->mathematics_technologies }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Pontuação da Redação:</strong>
                </div>
                <div class="col-md-8">
                    <p>{{ $userSimulation->redaction_score }}</p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Pontuação Total:</strong>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $userSimulation->total_score }}</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Exibindo os campos da variável redaction -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detalhes da Redação</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Texto:</strong>
                    </div>
                    <div class="col-md-8">
                        <!-- Utilizando nl2br para garantir que as quebras de linha sejam preservadas -->
                        <p>{!! nl2br(e($redaction->text)) !!}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>Correção:</strong>
                    </div>
                    <div class="col-md-8">
                        <!-- Utilizando nl2br para garantir que as quebras de linha sejam preservadas -->
                        <p>{!! nl2br(e($redaction->correction)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
