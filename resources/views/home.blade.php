@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Bem-vindo ao Portal de Estudos para Concursos</h1>
            <p class="lead">Prepare-se para os principais concursos com nossa plataforma de estudos personalizada.</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Correção de Redações</h4>
                </div>
                <div class="card-body">
                    <p>Receba feedback detalhado sobre suas redações, com dicas para melhorar a estrutura, coerência e clareza.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-primary">Saiba Mais</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-success text-white text-center">
                    <h4>Simulados de Concursos</h4>
                </div>
                <div class="card-body">
                    <p>Teste seus conhecimentos com simulados que reproduzem as provas reais dos concursos que você deseja prestar.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-success">Faça um Simulado</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-danger text-white text-center">
                    <h4>Provas Anteriores</h4>
                </div>
                <div class="card-body">
                    <p>Acesse provas anteriores para entender o formato das questões e se preparar melhor para os concursos.</p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-danger">Acesse Provas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
