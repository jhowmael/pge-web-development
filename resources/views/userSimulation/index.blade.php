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
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Edição</th>
                                <th scope="col">Potuação</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSimulations as $userSimulation)
                            <tr style="text-align: center">
                                <td>{{ $userSimulation->simulation->name }}</td>
                                <td>{{ $userSimulation->total_score }}</td>
                                <td>{{ $userSimulation->created_at }}</td>
                                <td>{{ $userSimulation->status }}</td>
                                <td> {{ __('translate.' . $userSimulation->status) }}</td>
                                <td>
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