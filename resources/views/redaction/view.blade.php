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
                        <strong>Texto da Redação: </strong>
                        <p>{!! nl2br(e($redaction->text)) !!}</p>
                    </div>
                    <div class="mb-3">
                        <strong>Correção: </strong> {!! nl2br(e($redaction->correction)) !!}
                    </div>
                    <div class="mb-3">
                        <strong>Pontuação Total: </strong> {{ $redaction->total_points }}
                    </div>
                    <div class="mb-3">
                        <strong>Pontuação Obtida: </strong> {{ $redaction->score }}
                    </div>
                    <div class="mb-3">
                        <strong>Status: </strong> {{ $redaction->status }}
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