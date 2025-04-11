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

            <div class="col-md-5 left-panel d-flex flex-column justify-content-start text-start" style="padding: 90px;">
                <br>
                <br>
                <br>
                <img src="http://localhost/pge-web-development/public/images/logo-aprovame.png" alt="Logo Aprovame" class="img-fluid">
                <br>
                <h3>
                    <p><strong>Já tem cadastro?</strong></p>
                </h3>
                <p><strong>Faça login para acessar sua conta.</strong></p>
                <a href="{{ route('login') }}" class="btn-custom d-flex justify-content-center">FAZER LOGIN</a>
                <br>
                <br>
                <br>
                <br>
            </div>

            <div class="col-md-7 right-panel bg-white" style="padding: 45px;">
                <h3 class="text-center fw-bold">Crie sua conta</h3>
                <p class="text-center text-muted">Preencha os dados abaixo para se cadastrar</p>

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-user transparent-icon"></i> </span>
                        <input type="text" class="form-control custom-input-box custom-rectangular-box" name="name" placeholder="Nome Completo" value="{{ old('name') }}">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-envelope transparent-icon"></i> </span>
                        <input type="email" class="form-control custom-email-box" name="email" placeholder="E-mail" value="{{ old('email') }}">
                    </div>

                    <!-- Máscara de Telefone -->
                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-phone transparent-icon"></i> </span>
                        <input type="text" id="phone" class="form-control custom-phone-box" name="phone" placeholder="Telefone" value="{{ old('phone') }}" maxlength="15">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-cake-candles transparent-icon"></i> </span>
                        <input type="date" class="form-control custom-birthday-box" name="birthday" placeholder="Data de nascimento" value="{{ old('birthday') }}">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-camera-retro transparent-icon"></i> </span>
                        <input type="file" class="form-control custom-birthday-box" name="profile_picture" placeholder="Foto de Perfil">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-lock transparent-icon"></i> </span>
                        <input type="password" id="passwordField" class="form-control custom-password-box" name="password" placeholder="Senha">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fa fa-eye" id="eyeIcon"></i> </button>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const phoneInput = document.getElementById('phone');

                            phoneInput.addEventListener('input', function(event) {
                                let value = event.target.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                                let formattedValue = '';

                                // Formatar o número no padrão (XX) XXXXX-XXXX
                                if (value.length > 0) {
                                    formattedValue = '(' + value.slice(0, 2); // Primeiro dois dígitos
                                }
                                if (value.length > 2) {
                                    formattedValue += ') ' + value.slice(2, 7); // Adicionar o número (XXXX)
                                }
                                if (value.length > 6) {
                                    formattedValue += '-' + value.slice(7, 11); // Adicionar o hífen e o número final (XXXX)
                                }

                                event.target.value = formattedValue; // Atribui a formatação ao campo
                            });

                            // Mostrar/Ocultar Senha
                            document.getElementById("togglePassword").addEventListener("click", function() {
                                var passwordField = document.getElementById("passwordField");
                                var eyeIcon = document.getElementById("eyeIcon");

                                if (passwordField.type === "password") {
                                    passwordField.type = "text";
                                    eyeIcon.classList.remove("fa-eye");
                                    eyeIcon.classList.add("fa-eye-slash");
                                } else {
                                    passwordField.type = "password";
                                    eyeIcon.classList.remove("fa-eye-slash");
                                    eyeIcon.classList.add("fa-eye");
                                }
                            });
                        });
                    </script>

                    <div class="input-group mb-4">
                        <span class="input-group-text">
                            <i class="fa fa-lock transparent-icon"></i> </span>
                        <input type="password" id="confirmPasswordField" class="form-control custom-password-box" name="password_confirmation" placeholder="Confirmar Senha">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="fa fa-eye" id="eyeIconConfirm"></i> </button>
                    </div>
                    <center>
                        <button type="submit" class="btn-custom d-flex justify-content-center">CADASTRAR</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
@endsection
