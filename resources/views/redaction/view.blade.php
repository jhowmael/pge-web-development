@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-solid fa-sliders"></i> Painel Administrativo </h4>
                </div>
                <div class="card-body">
                    <p>Painel onde é possível cadastrar simulados e gerenciar usuários de forma prática e centralizada.</p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="learn">Introdução<i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('simulation.index') }}">Praticar com simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userSimulation.index') }}">Histórico de simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('userSimulation.index') }}">Histórico de simulados <i class="fa-solid fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card mb-12">
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
            <br>
            <center>
                <a href="{{ route('redaction.index') }}" class="btn btn-purple"> Voltar </a>
            </center>
            <br>
            <br>
        </div>
    </div>
</div>

@endsection