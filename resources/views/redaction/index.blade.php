@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.learn-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Histórico de redações</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Edição</th>
                                <th scope="col">Tema</th>
                                <th scope="col">Potuação</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($redactions as $redaction)
                            <tr style="text-align: center">
                                <td>{{ $redaction->simulation->name }}</td>
                                <td>{{ $redaction->theme }}</td>
                                <td>{{ $redaction->score }}</td>
                                <td>{{ $redaction->created_at }}</td>
                                <td>{{ $redaction->status }}</td>
                                <td>
                                    <form action="{{ route('redaction.view', $redaction->id) }}" method="GET" style="display:inline-block;">
                                        <button type="submit" class="btn btn-info" title="Visualizar">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                {{ $redactions->links('vendor.pagination.bootstrap-4') }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection