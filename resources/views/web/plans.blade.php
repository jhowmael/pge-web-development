@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded">
                    <h5 class="fw-bold text-warning">Grátis</h5>
                    <h2 class="p-3 rounded text-warning">R$ 0,00 <span class="fs-6">/vitalício</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Banco de Questões</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> 1 Revisão de Redação IA/dia</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Anúncios</li>
                    <br>
                </ul>
                <a href="#" class="btn btn-yellow">GRÁTIS</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded">
                    <h5 class="fw-bold text-warning">Mensal</h5>
                    <h2 class="p-3 rounded text-warning" id="price-monthly">R$ 28,90 <span class="fs-6">/mês</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Banco de Questões</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Revisões Redação ilimitadas</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> SEM Anúncios</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Guia de Estudos</li>
                </ul>
                <a href="#" class="btn btn-yellow" id="btn-monthly">COMPRE JÁ</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded">
                    <h5 class="fw-bold text-warning">Semestral</h5>
                    <h2 class="p-3 rounded text-warning" id="price-semester">R$ 144,50 <span class="fs-6">/6 meses</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Banco de Questões</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Revisões Redação ilimitadas</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> SEM Anúncios</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Guia de Estudos</li>
                </ul>
                <a href="#" class="btn btn-yellow" id="btn-semester">COMPRE JÁ</a>
            </div>
        </div>
    </div>
</div>
@endsection
