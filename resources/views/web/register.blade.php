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
        <div class="row shadow-lg rounded-4 overflow-hidden w-100" style="max-width: 900px; background-color: rgba(0, 0, 0, 0.4)" data-aos="fade-up" data-aos-delay="100">

            <!-- Painel Esquerdo -->
            <div class="col-md-5 d-flex flex-column justify-content-center align-items-center p-5 text-center">
                <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" class="img-fluid mb-4" style="max-width: 220px;">
                <h4 class="fw-bold text-dark">Já tem cadastro?</h4>
                <p class="fw-bold text-white">Faça login para acessar sua conta</p>
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">Fazer Login</a>
            </div>

            <!-- Painel Direito -->
            <div class="col-md-7 bg-white p-5 text-center">
                <h3 class="fw-bold mb-1 text-dark">Crie sua conta</h3>
                <p class="text-muted mb-4">Preencha os dados abaixo</p>

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nome -->
                    <div class="mb-3 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome Completo">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail">
                        </div>
                    </div>

                    <!-- Telefone -->
                    <div class="mb-3 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="(00) 00000-0000" maxlength="15">
                        </div>
                    </div>

                    <!-- Data de nascimento -->
                    <div class="mb-3 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-cake-candles"></i></span>
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        </div>
                    </div>

                    <!-- Foto de perfil -->
                    <div class="mb-3 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-camera-retro"></i></span>
                            <input type="file" class="form-control" name="profile_picture">
                        </div>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="passwordField" name="password" placeholder="Senha">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fa fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Confirmar Senha -->
                    <div class="mb-4 text-start">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="confirmPasswordField" name="password_confirmation" placeholder="Confirmar Senha">
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                <i class="fa fa-eye" id="eyeIconConfirm"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-outline-dark btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Font Awesome -->
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
