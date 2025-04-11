@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded">
                    <h5 class="fw-bold">Mensal</h5>
                    <h2 class="p-3 rounded" id="price-monthly">R$ 29,90 <span class="fs-6">/mês</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Banco de questões 100% atualizado</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Revisões de redações sem limite</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Sem anúncios</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Guia de estudos</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Suporte 24h</li>
                </ul>
                <a href="#" class="btn-custom d-flex justify-content-center">ASSINAR</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded">
                    <h5 class="fw-bold">Semestral</h5>
                    <h2 class="p-3 rounded" id="price-semester">R$ 149,90 <span class="fs-6">/6 meses</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Banco de questões 100% atualizado</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Revisões de redações sem limite</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Sem anúncios</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Guia de estudos</li>
                    <li class="text-start"><i class="fas fa-check-circle text-success"></i> Suporte 24h</li>
                </ul>
                <a href="#" class="btn-custom d-flex justify-content-center">ASSINAR</a>
            </div>
        </div>
    </div>
</div>
@endsection