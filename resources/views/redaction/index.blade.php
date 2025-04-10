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
                    <h4>Histórico de redações</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead >
                            <tr style="text-align: center">
                                <th class="text-center">Edição</th>
                                <th class="text-center">Tema</th>
                                <th class="text-center">Pontuação</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($redactions as $redaction)
                            <tr style="text-align: center">
                                <td class="text-center">{{ $redaction->simulation->name }}</td>
                                <td class="text-center">{{ $redaction->theme }}</td>
                                <td class="text-center">{{ $redaction->score }}</td>
                                <td class="text-center">{{ $redaction->created_at }}</td>
                                <td class="text-center">{{ __('translate.' . $redaction->status) }}</td>
                                <td class="text-center">
                                    <x-buttons.view route="redaction.view" :id="$redaction->id" />
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-buttons.pagination :entities="$redactions" />
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection