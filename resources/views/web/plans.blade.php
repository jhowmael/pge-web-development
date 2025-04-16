@extends('layouts.web')

@section('content')
<div class="container py-5">
    <!-- Card de Plano Atual -->
    @if(auth()->user())
    <div class="row g-4 text-center mb-4 justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 premium-card" style="
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
                border: 2px solid gold;
                background: linear-gradient(to right, #fffbe6, #fff3cd);
            ">
                <div class="p-3 rounded">
                    <h5 class="fw-bold" style="font-size: 1.6em;">
                        <i class="fas fa-crown text-warning me-2"></i> Plano Atual
                    </h5>

                    @if(auth()->user()->premium)
                    <h6 class="fw-bold text-dark">
                        {{ __('translate.' . auth()->user()->premium_type) }}
                        -
                        @if(auth()->user()->premium_type === 'monthly')
                        R$ 29,90 <span class="fs-6">/mês</span>
                        @elseif(auth()->user()->premium_type === 'semi_annual')
                        R$ 149,90 <span class="fs-6">/6 meses</span>
                        @endif
                    </h6>
                    <p class="mt-2 text-dark">
                        Dias restantes:
                        <strong>{{ auth()->user()->premium_expired_days }} dias</strong>
                    </p>
                    <span class="badge bg-success">Ativo</span>
                    @else
                    <p>Você não tem um plano ativo.</p>
                    <span class="badge bg-danger">Inativo</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Cards de planos disponíveis -->
    <div class="row g-4 text-center" data-aos="fade-up" data-aos-delay="30">
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded" data-aos="fade-right" data-aos-delay="30">
                    <h5 class="fw-bold">{{ __('translate.monthly') }}</h5>
                    <h2 class="p-3 rounded" id="price-monthly">R$ 29,90 <span class="fs-6">/mês</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Banco de questões 100% atualizado</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Revisões de redações sem limite</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Sem anúncios</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Guia de estudos</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Suporte 24h</li>
                </ul>
                <form action="{{ route('signMonthly') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-yellow" id="btn-monthly">ASSINAR JÁ</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 hover-effect" style="box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">
                <div class="p-3 rounded" data-aos="fade-right" data-aos-delay="30">
                    <h5 class="fw-bold">{{ __('translate.semi_annual') }}</h5>
                    <h2 class="p-3 rounded" id="price-semester">R$ 149,90 <span class="fs-6">/6 meses</span></h2>
                </div>
                <ul class="list-unstyled mt-3">
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Banco de questões 100% atualizado</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Revisões de redações sem limite</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Análise de Desempenho</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Sem anúncios</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Guia de estudos</li>
                    <li class="text-start" data-aos="fade-right" data-aos-delay="30"><i class="fas fa-check-circle text-success"></i> Suporte 24h</li>
                </ul>
                <form action="{{ route('signSemiAnnual') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-yellow" id="btn-monthly">ASSINAR JÁ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection