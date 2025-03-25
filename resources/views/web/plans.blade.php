@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1)">
                <div class="bg-light-yellow p-3 rounded">
                    <h5 class="fw-bold">Grátis</h5>
                    <h2 class="p-3 rounded">R$ 0,00 <span class="fs-6">/vitalício</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start">✔ Banco de Questões</li>
                    <li class="text-start">✔ 1 Revisão de Redação IA/dia</li>
                    <li class="text-start">✔ Análise de Desempenho</li>
                    <li class="text-start">✔ Anúncios</li>
                    <li class="text-start">­</li>
                </ul>
                <a href="#" class="btn btn-yellow">GRÁTIS</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1)">
                <div class="bg-light-yellow p-3 rounded">
                    <h5 class="fw-bold">Mensal</h5>
                    <h2 class="p-3 rounded" id="price-monthly">R$ 28,90 <span class="fs-6">/mês</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start">✔ Banco de Questões</li>
                    <li class="text-start">✔ Revisões Redação ilimitadas</li>
                    <li class="text-start">✔ Análise de Desempenho</li>
                    <li class="text-start">✔ SEM Anúncios</li>
                    <li class="text-start">✔ Guia de Estudos</li>
                </ul>
                <a href="#" class="btn btn-yellow" id="btn-monthly">COMPRE JÁ</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1)">
                <div class="bg-light-yellow p-3 rounded">
                    <h5 class="fw-bold">Semestral</h5>
                    <h2 class="p-3 rounded" id="price-semester">R$ 144,50 <span class="fs-6">/6 meses</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start">✔ Banco de Questões</li>
                    <li class="text-start">✔ Revisões Redação ilimitadas</li>
                    <li class="text-start">✔ Análise de Desempenho</li>
                    <li class="text-start">✔ SEM Anúncios</li>
                    <li class="text-start">✔ Guia de Estudos</li>
                </ul>
                <a href="#" class="btn btn-yellow" id="btn-semester">COMPRE JÁ</a>
            </div>
        </div>
    </div>
    
@endsection
