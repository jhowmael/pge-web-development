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
                    <p><strong>Já tem cadastro?</strong></p>
                </h3>
                <p><strong>Faça login para acessar sua conta.</strong></p>
                <a href="{{ route('login') }}" class="btn-custom d-flex justify-content-center">FAZER LOGIN</a>
            </div>

            <!-- Painel Direito -->
            <div class="col-md-7 right-panel bg-white" style="padding: 48px;">
                <h3 class="text-center text-warning fw-bold">Crie sua conta</h3>
                <p class="text-center text-muted">Preencha os dados abaixo para se cadastrar</p>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Campo de Nome -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-user transparent-icon"></i> <!-- Ícone de usuário -->
                         </span>
                          <input type="text" class="form-control custom-input-box custom-rectangular-box" name="name" placeholder="Nome Completo" value="{{ old('name') }}">
                    </div>

                    <!-- Campo de E-mail -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-envelope transparent-icon"></i> <!-- Ícone de envelope -->
                        </span>
                        <input type="email" class="form-control custom-email-box" name="email" placeholder="E-mail" value="{{ old('email') }}">
                    </div>

                    <!-- Campo de Senha -->
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

                    <!-- Campo de Confirmar Senha -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-lock transparent-icon"></i> <!-- Ícone de cadeado -->
                        </span>
                        <input type="password" id="confirmPasswordField" class="form-control custom-password-box" name="password_confirmation" placeholder="Confirmar Senha">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="fa fa-eye" id="eyeIconConfirm"></i> <!-- Ícone de olho -->
                        </button>
                    </div>

                    <script>
                        document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
                            var confirmPasswordField = document.getElementById("confirmPasswordField");
                            var eyeIconConfirm = document.getElementById("eyeIconConfirm");

                            if (confirmPasswordField.type === "password") {
                                confirmPasswordField.type = "text";
                                eyeIconConfirm.classList.remove("fa-eye");
                                eyeIconConfirm.classList.add("fa-eye-slash"); // Muda para olho fechado
                            } else {
                                confirmPasswordField.type = "password";
                                eyeIconConfirm.classList.remove("fa-eye-slash");
                                eyeIconConfirm.classList.add("fa-eye"); // Muda para olho aberto
                            }
                        });
                    </script>

                    <!-- Botão de Registrar -->
                    <button type="submit" class="btn btn-yellow mt-3">CADASTRAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection