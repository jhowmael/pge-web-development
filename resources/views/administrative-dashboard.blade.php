@extends('layouts.connect')

@section('content')

    <div class="main-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h4><i class="fa-solid fa-sliders"></i> Painel Administrativo </h4>
                    </div>                    
                    <div class="card-body">
                        <p>Painel onde é possível cadastrar simulados e gerenciar usuários de forma prática e centralizada.</p>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('administrative-dashboard') }}">Dashboard <i class="fa-solid fa-chevron-right"></i></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('administrative-dashboard-simulations') }}"> Dashboard Simulados <i class="fa-solid fa-chevron-right"></i></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('administrative-dashboard-users') }}"> Dashboard Usuários <i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card mb-12">
                    <div class="card-header text-center">
                        <h4>Dashboard</h4>
                    </div> 
                    <div class="card-body">
                        <p>txttxttxttxttxttxttxttxttxttxttxttxttxttxttxttxttxttxttxttxttxt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

