@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.learn-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Visualizar Redação</h4>
                </div>
                <div class="card-body">
                    <!-- Informações da Redação -->
                    <div class="mb-3">
                        <strong>Tema: </strong> {{ $redaction->theme }}
                    </div>
                    <div class="mb-3">
                        <strong>Tipo: </strong> {{ $redaction->type }}
                    </div>
                    <div class="mb-3">
                        <strong>Introdução: </strong> {!! nl2br(e($redaction->introduction)) !!}
                    </div>
                    <div class="mb-3">
                        <strong>Pontuação Obtida: </strong> {{ $redaction->score }}
                    </div>
                    <div class="mb-3">
                        <strong>Clareza: </strong> {{ $redaction->clarity_score }}
                    </div>
                    <div class="mb-3">
                        <strong>Ortografia: </strong> {{ $redaction->spelling_score }}
                    </div>
                    <div class="mb-3">
                        <strong>Argumentação: </strong> {{ $redaction->argumentation_score }}
                    </div>
                    <div class="mb-3">
                        <strong>Estrutura: </strong> {{ $redaction->structure_score }}
                    </div>
                    <div class="mb-3">
                        <strong>Coesão: </strong> {{ $redaction->cohesion_score }}
                    </div>
                    <div class="mb-3">
                        <strong>Status: </strong> {{ __('translate.' . $redaction->status) }}
                    </div>
                    <div class="mb-3">
                        <strong>Data de Criação: </strong> {{ $redaction->created_at->format('d/m/Y H:i') }}
                    </div>
                    <div class="mb-3">
                        <strong>Última Atualização: </strong> {{ $redaction->updated_at->format('d/m/Y H:i') }}
                    </div>
                    
                    <!-- Exibindo a imagem se existir -->
                    @if($redaction->image)
                    <div class="mb-3">
                        <strong>Imagem: </strong>
                        <img src="{{ asset('storage/' . $redaction->image) }}" alt="Imagem da Redação" class="img-fluid">
                    </div>
                    @endif

                    <!-- Texto da Redação -->
                    <div class="mb-3">
                        <strong>Texto da Redação: </strong>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#redactionText" aria-expanded="false" aria-controls="redactionText" id="redactionTextButton">
                            <i class="fas fa-chevron-down"></i> Expandir
                        </button>
                        
                        <div class="collapse" id="redactionText">
                            <p>{!! nl2br(e($redaction->text)) !!}</p>
                        </div>
                    </div>

                    <!-- Correção -->
                    <div class="mb-3">
                        <strong>Correção: </strong>
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#correctionText" aria-expanded="false" aria-controls="correctionText" id="correctionTextButton">
                            <i class="fas fa-chevron-down"></i> Expandir
                        </button>
                        
                        <div class="collapse" id="correctionText">
                            {!! nl2br(e($redaction->correction)) !!}
                        </div>
                    </div>

                </div>
            </div>

            <br>
            <center>
                <x-buttons.back route="redaction.index" />
            </center>
            <br>
        </div>
    </div>
</div>

@endsection

<!-- Incluindo jQuery e o script do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Inicializando o estado do botão para Redação
        $('#redactionText').on('show.bs.collapse', function () {
            $('#redactionTextButton i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            $('#redactionTextButton').html('<i class="fas fa-chevron-up"></i> Encolher');
        });
        $('#redactionText').on('hide.bs.collapse', function () {
            $('#redactionTextButton i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            $('#redactionTextButton').html('<i class="fas fa-chevron-down"></i> Expandir');
        });

        // Inicializando o estado do botão para Correção
        $('#correctionText').on('show.bs.collapse', function () {
            $('#correctionTextButton i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
            $('#correctionTextButton').html('<i class="fas fa-chevron-up"></i> Encolher');
        });
        $('#correctionText').on('hide.bs.collapse', function () {
            $('#correctionTextButton i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
            $('#correctionTextButton').html('<i class="fas fa-chevron-down"></i> Expandir');
        });
    });
</script>
