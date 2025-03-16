@extends('layouts.web')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Nossos Planos</h1>
            <p class="lead">Escolha o plano que melhor se adapta às suas necessidades.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Plano Básico</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">R$ 29,90 / mês</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Funcionalidade A</li>
                        <li class="list-group-item">Funcionalidade B</li>
                        <li class="list-group-item">Funcionalidade C</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-primary">Assinar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-success text-white text-center">
                    <h4>Plano Intermediário</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">R$ 49,90 / mês</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Funcionalidade D</li>
                        <li class="list-group-item">Funcionalidade E</li>
                        <li class="list-group-item">Funcionalidade F</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-success">Assinar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-danger text-white text-center">
                    <h4>Plano Premium</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">R$ 79,90 / mês</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Funcionalidade G</li>
                        <li class="list-group-item">Funcionalidade H</li>
                        <li class="list-group-item">Funcionalidade I</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-danger">Assinar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
