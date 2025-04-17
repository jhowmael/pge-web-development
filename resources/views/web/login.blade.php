@extends('layouts.web')

@section('content')
<div class="container py-5">

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3 mx-auto" style="max-width: 600px;" role="alert">
        <strong>Erro:</strong> {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="row shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 900px; background-color: rgba(0, 0, 0, 0.4);" data-aos="fade-up" data-aos-delay="100">

            <!-- Painel Esquerdo -->
            <div class="col-md-5 d-flex flex-column justify-content-center align-items-center p-5 text-center">
                <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" class="img-fluid mb-4" style="max-width: 220px;">
                <h4 class="fw-bold text-dark">Novo por aqui?</h4>
                <p class="fw-bold text-white">Crie uma conta agora mesmo e comece sua jornada.</p>
                <a href="{{ route('register') }}" class="btn btn-outline-dark btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">Cadastrar</a>
            </div>

            <!-- Painel Direito -->
            <div class="col-md-7 bg-white p-5 text-center">
                <h3 class="fw-bold mb-1 text-dark">Bem-vindo de volta!</h3>
                <p class="text-muted mb-4">Acesse sua conta abaixo</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Campo de email -->
                    <div class="mb-4 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="exemplo@email.com" value="{{ old('email') }}">
                        </div>
                    </div>

                    <!-- Campo de senha -->
                    <div class="mb-4 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="passwordField" placeholder="Sua senha">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fa fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="text-end mb-3 text-center">
                        <a href="{{ route('forgot-password') }}" class="text-muted small">Esqueceu sua senha?</a>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-dark btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">Entrar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<!-- Mostrar/Ocultar Senha -->
<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        const passwordField = document.getElementById("passwordField");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
        }
    });
</script>
@endsection