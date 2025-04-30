@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 900px; background-color: rgba(0, 0, 0, 0.4);" data-aos="fade-up" data-aos-delay="100">

            <!-- Painel Esquerdo -->
            <div class="col-md-5 d-flex flex-column justify-content-center align-items-center p-5 text-center">
                <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" class="img-fluid mb-4" style="max-width: 220px;">
                <h4 class="fw-bold text-dark">Lembrou sua senha?</h4>
                <p class="fw-bold text-white">Volte ao login e acesse sua conta.</p>
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">Fazer Login</a>
            </div>

            <!-- Painel Direito -->
            <div class="col-md-7 bg-white p-5 text-center">
                <h3 class="fw-bold mb-1 text-dark">Recuperação de Senha</h3>
                <p class="text-muted mb-4">Digite o e-mail associado à sua conta. Enviaremos instruções para redefinir sua senha.</p>

                <form action="#" method="POST">
                    @csrf

                    <!-- Campo de E-mail -->
                    <div class="mb-4 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu e-mail" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <!-- Botão de Enviar -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-dark btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">Enviar Instruções</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="text-muted">Lembrou sua senha? <a href="{{ route('login') }}" class="text-warning">Fazer login</a></p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
@endsection
