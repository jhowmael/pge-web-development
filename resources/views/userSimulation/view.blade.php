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
                    <h3 class="card-title">Visualizar Simulação</h3>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Códigos de Linguagens e Tecnologias:</strong> {{ $userSimulation->languages_codes_technologies }}
                    </div>

                    <div class="mb-3">
                        <strong>Ciências Humanas e Tecnologias:</strong> {{ $userSimulation->human_sciences_technologies }}
                    </div>

                    <div class="mb-3">
                        <strong>Ciências da Natureza e Tecnologias:</strong> {{ $userSimulation->natural_sciences_technologies }}
                    </div>

                    <div class="mb-3">
                        <strong>Matemática e Tecnologias:</strong> {{ $userSimulation->mathematics_technologies }}
                    </div>

                    <div class="mb-3">
                        <strong>Pontuação da Redação:</strong> {{ $userSimulation->redaction->score }}
                    </div>

                    <div class="mb-3">
                        <strong>Pontuação Total:</strong> {{ $userSimulation->total_score }}
                    </div>

                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <strong>Tema da Redação:</strong> {{ $userSimulation->redaction->theme }}
                        <x-buttons.view route="redaction.view" :id="$userSimulation->redaction->id" message='Visualizar redação' />
                    </div>

                </div>
            </div>
            <br>
            <center>
                <x-buttons.back route="userSimulation.index" />
            </center>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
@endsection