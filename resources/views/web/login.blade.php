@extends('layouts.web')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-2 mx-md-5 shadow rounded overflow-hidden" style="max-width: 900px;">

            <!-- Painel Esquerdo -->
            <div class="col-12 col-md-5 d-flex flex-column justify-content-center align-items-center text-center p-10 p-md-5" style="background-color: lightyellow;">
                <img src="http://localhost/pge-web-development/public/images/logo-aprovame.png" alt="Logo Aprovame" class="img-fluid mb-4" style="max-width: 250px;">
                <h3><strong>Não possui Cadastro?</strong></h3>
                <p><strong>Cadastre-se agora mesmo.</strong></p>
                <a href="{{ route('register') }}" class="btn-custom d-flex justify-content-center mt-2">CADASTRAR</a>
                <br>
            </div>

            <!-- Painel Direito -->
            <div class="col-12 col-md-7 p-4 md-5 bg-white">
                <h3 class="text-center fw-bold">Entre em sua conta</h3>
                <p class="text-center text-muted">Preencha seus dados</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Campo de email -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-envelope transparent-icon"></i>
                        </span>
                        <input type="email" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
                    </div>

                    <!-- Campo de senha -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-lock transparent-icon"></i>
                        </span>
                        <input type="password" id="passwordField" class="form-control" name="password" placeholder="Senha">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fa fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>

                    <div class="text-center mb-3">
                        <a href="{{ route('forgot-password') }}" class="text-muted">Esqueci minha senha</a>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-custom">ENTRAR</button>
                    </div>
                </form>
                <br>
            </div>

        </div>
    </div>

    <!-- Font Awesome para os ícones -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <!-- Toggle para mostrar/ocultar senha -->
    <script>
        document.getElementById("togglePassword").addEventListener("click", function () {
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
