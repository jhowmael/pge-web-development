@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4><i class="fa-solid fa-sliders"></i> Administrativo </h4>
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
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
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
                            <p>{{ $userSimulation->redaction->score }}</p>
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
            <br>
            <br>
            <center>
                <x-buttons.back route="userSimulation.index" />
            </center>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection