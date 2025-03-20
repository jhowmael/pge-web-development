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
                <img src="http://localhost/pge-web-development/public/images/logo-aprovame.png" alt="Logo Aprovame" class="img-fluid">
                <br>
                <h3>
                    <p><strong>Não possui Cadastro?</strong></p>
                </h3>
                <p><strong>Cadastre-se agora mesmo.</strong></p>
                <a href="{{ route('register') }}" class="btn-custom d-flex justify-content-center">CADASTRAR</a>
            </div>

            <!-- Painel Direito -->
            <div class="col-md-7 right-panel" style="padding: 98px;">
                <h3 class="text-center text-warning fw-bold">Entre em sua conta</h3>
                <p class="text-center text-muted">Preencha seus dados</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf   
                    
                    <!-- Campo de email -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-envelope transparent-icon"></i> <!-- Ícone de envelope -->
                        </span>
                        <input type="email" class="form-control custom-email-box w-75" name="email" placeholder="email" value="{{ old('email') }}">
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

                    <!-- Campo de senha -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-lock transparent-icon"></i> <!-- Ícone de cadeado -->
                        </span>
                        <input type="password" id="passwordField" class="form-control custom-password-box" name="password" placeholder="Senha">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fa fa-eye" id="eyeIcon"></i> <!-- Ícone de olho -->
                        </button>
                    </div>

                    <script>
                        document.getElementById("togglePassword").addEventListener("click", function() {
                            var passwordField = document.getElementById("passwordField");
                            var eyeIcon = document.getElementById("eyeIcon");

                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                                eyeIcon.classList.remove("fa-eye");
                                eyeIcon.classList.add("fa-eye-slash"); // Muda para olho fechado
                            } else {
                                passwordField.type = "password";
                                eyeIcon.classList.remove("fa-eye-slash");
                                eyeIcon.classList.add("fa-eye"); // Muda para olho aberto
                            }
                        });
                    </script>
                    
                    <div class="text-end">
                        <a href="{{ route('forgot-password') }}" class="text-muted">Esqueci minha senha</a>
                    </div>
                    
                    <button type="submit" class="btn btn-yellow mt-3">ENTRAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection
