@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h3 class="card-title"> Visualizar Usuário </h3>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nome:</strong> {{ $user->name }}
                    </div>
                    <strong>Foto:</strong>
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto do usuário" style="max-width: 200px; border-radius: 8px;">
                    </div>
                    <div class="mb-3">
                        <strong>Id:</strong> {{ $user->id }}
                    </div>
                    <div class="mb-3">
                        <strong>Tipo:</strong> {{ __('translate.' . $user->type) }}
                    </div>
                    <div class="mb-3">
                        <strong>E-mail:</strong> {{ $user->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Telefone:</strong> {{ $user->phone }}
                    </div>
                    <div class="mb-3">
                        <strong>Data de nascimento:</strong> {{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}
                    </div>
                    <div class="mb-3">
                        <strong>Status:</strong> {{ __('translate.' . $user->status) }}

                    </div>
                    <!-- Botões de ação -->
                    <div class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <x-buttons.view route="administrative.view-users" :id="$user->id" message="Visualizar" />
                            @if($user->status == 'disabled')
                            <x-buttons.enable route="administrative.enable-users" :id="$user->id" message="Habilitar" />
                            @else
                            <x-buttons.disable route="administrative.disable-users" :id="$user->id" message="Desabilitar" />
                            @endif
                        </div>
                    </div>
                    <hr>
                    <center>
                        <x-buttons.back route="administrative.dashboard-users" />
                    </center>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection