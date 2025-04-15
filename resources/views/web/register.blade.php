@extends('layouts.web')

@section('content')

    <br><br><br>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro:</strong> {{ $errors->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-2 mx-md-5 shadow rounded overflow-hidden" style="max-width: 900px;">

            <!-- Painel Esquerdo -->
            <div class="col-12 col-md-5 d-flex flex-column justify-content-center align-items-center text-center p-4 p-md-5" style="background-color: lightyellow;">
                <br><br><br><br><br><br><br>
                <img src="http://localhost/pge-web-development/public/images/logo-aprovame.png" alt="Logo Aprovame" class="img-fluid mb-4" style="max-width: 250px;">
                <h3><strong>Já tem cadastro?</strong></h3>
                <p><strong>Faça login para acessar sua conta.</strong></p>
                <a href="{{ route('login') }}" class="btn-custom d-flex justify-content-center mt-2">FAZER LOGIN</a>
                <br><br><br><br><br><br><br>
            </div>

            <!-- Painel Direito -->
            <div class="col-12 col-md-7 p-4 p-md-5 bg-white">
                <h3 class="text-center fw-bold">Crie sua conta</h3>
                <p class="text-center text-muted">Preencha os dados abaixo para se cadastrar</p>

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-user transparent-icon"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Nome Completo" value="{{ old('name') }}">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-envelope transparent-icon"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-phone transparent-icon"></i></span>
                        <input type="text" id="phone" class="form-control" name="phone" placeholder="Telefone" value="{{ old('phone') }}" maxlength="15">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-cake-candles transparent-icon"></i></span>
                        <input type="date" class="form-control" name="birthday" placeholder="Data de nascimento" value="{{ old('birthday') }}">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-camera-retro transparent-icon"></i></span>
                        <input type="file" class="form-control" name="profile_picture">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-lock transparent-icon"></i></span>
                        <input type="password" id="passwordField" class="form-control" name="password" placeholder="Senha">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fa fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa fa-lock transparent-icon"></i></span>
                        <input type="password" id="confirmPasswordField" class="form-control" name="password_confirmation" placeholder="Confirmar Senha">
                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                            <i class="fa fa-eye" id="eyeIconConfirm"></i>
                        </button>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-custom">CADASTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- Font Awesome para ícones -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Máscara de telefone
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function (event) {
                let value = event.target.value.replace(/\D/g, '');
                let formattedValue = '';

                if (value.length > 0) {
                    formattedValue = '(' + value.slice(0, 2);
                }
                if (value.length > 2) {
                    formattedValue += ') ' + value.slice(2, 7);
                }
                if (value.length > 6) {
                    formattedValue += '-' + value.slice(7, 11);
                }

                event.target.value = formattedValue;
            });

            // Toggle senha
            document.getElementById("togglePassword").addEventListener("click", function () {
                const field = document.getElementById("passwordField");
                const icon = document.getElementById("eyeIcon");
                if (field.type === "password") {
                    field.type = "text";
                    icon.classList.replace("fa-eye", "fa-eye-slash");
                } else {
                    field.type = "password";
                    icon.classList.replace("fa-eye-slash", "fa-eye");
                }
            });

            // Toggle confirmar senha
            document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
                const field = document.getElementById("confirmPasswordField");
                const icon = document.getElementById("eyeIconConfirm");
                if (field.type === "password") {
                    field.type = "text";
                    icon.classList.replace("fa-eye", "fa-eye-slash");
                } else {
                    field.type = "password";
                    icon.classList.replace("fa-eye-slash", "fa-eye");
                }
            });
        });
    </script>

@endsection
