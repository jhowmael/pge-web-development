@extends('layouts.web')

@section('content')

    <br>
    <br>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container row">

            <!-- Painel Esquerdo -->
            <div class="col-md-5 left-panel d-flex flex-column justify-content-start text-start" style="padding: 90px;">
                <img src="http://localhost/pge-web-development/public/images/logo-aprovame.png" alt="Logo Aproveme" class="img-fluid">
                <br>
                <h3>
                    <p><strong>Lembrou sua senha?</strong></p>
                </h3>
                <p><strong>Volte ao login para acessar sua conta.</strong></p>
                <a href="{{ route('login') }}" class="btn-custom d-flex justify-content-center">FAZER LOGIN</a>
            </div>

            <!-- Painel Direito -->
            <div class="col-md-7 right-panel bg-white" style="padding: 87px;">
                <h3 class="text-center text-warning fw-bold">Recuperação de Senha</h3>
                <p class="text-center text-muted">Preencha o e-mail associado à sua conta para recuperar sua senha.</p>

                <form action="#" method="POST">
                    @csrf

                    <!-- Campo de E-mail -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-envelope transparent-icon"></i> <!-- Ícone de envelope -->
                        </span>
                        <input type="email" class="form-control custom-email-box" name="email" placeholder="Digite seu E-mail" value="{{ old('email') }}" required>
                    </div>

                    <!-- Botão de Recuperar Senha -->
                    <button type="submit" class="btn btn-yellow mt-3">ENVIAR INSTRUÇÕES</button>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted">Lembrou sua senha? <a href="{{ route('login') }}" class="text-warning">Faça login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection