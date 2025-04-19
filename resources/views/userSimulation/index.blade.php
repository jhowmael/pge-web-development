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
                    <h4>Histórico de simulados</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr style="text-align: center">
                                <th class="text-center">Edição</th>
                                <th class="text-center">Pontuação</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSimulations as $userSimulation)
                            <tr style="text-align: center">
                                <td class="text-center">{{ $userSimulation->simulation->name }}</td>
                                <td class="text-center">{{ $userSimulation->total_score }}</td>
                                <td class="text-center">{{ $userSimulation->created_at }}</td>
                                <td class="text-center"> {{ __('translate.' . $userSimulation->status) }}</td>
                                <td class="d-flex justify-content-center gap-2">
                                    @if($userSimulation->status === 'started')
                                        <x-buttons.keep route="userSimulation.in-progress" :parameters="['simulationId' => $userSimulation->simulation_id, 'userSimulationId' => $userSimulation->id]" />
                                    @endif
                                    <x-buttons.view route="userSimulation.view" :id="$userSimulation->id" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-buttons.pagination :entities="$userSimulations" />
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection