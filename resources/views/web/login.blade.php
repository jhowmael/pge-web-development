@extends('layouts.web') 

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container row">
            
            <!-- Painel Esquerdo -->
            <div class="col-md-5 left-panel d-flex flex-column justify-content-start text-start">
            <img src="http://localhost/pge-web-development/public/images/logo-aprovame.png" alt="Logo Aprovame" class="img-fluid">
    <br>
    <h3><p><strong>Não possui Cadastro?</strong></p> </h3>
    <p><strong>Cadastre-se agora mesmo.</strong></p>
    <a href="#" class="btn-custom d-flex justify-content-center">CADASTRAR</a>
</div>

            
            <!-- Painel Direito -->
            <div class="col-md-7 right-panel">
                <h3 class="text-center text-warning fw-bold">Entre em sua conta</h3>
                <p class="text-center text-muted">Preencha seus dados</p>
                
                <form>
            <div class="input-group mb-4">
    <span class="input-group-text">
        <i class="fa fa-envelope transparent-icon"></i> <!-- Ícone de envelope -->
    </span>
    <input type="email" class="form-control custom-email-box w-75" placeholder="Email">
            </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<style>
    .transparent-icon {
        opacity: 0.5; /* Ajuste a opacidade conforme necessário */
    }

    .custom-email-box {
        border-radius: 0; /* Remove bordas arredondadas, deixando retangular */
        height: 40px; /* Define uma altura para tornar a caixa mais retangular */
    }
</style>
                    
<div class="input-group mb-4">
    <span class="input-group-text">
        <i class="fa fa-lock transparent-icon"></i> <!-- Ícone de cadeado -->
    </span>
    <input type="password" id="passwordField" class="form-control custom-password-box" placeholder="Senha">
    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
        <i class="fa fa-eye" id="eyeIcon"></i> <!-- Ícone de olho -->
    </button>
</div>
<script>
    document.getElementById("togglePassword").addEventListener("click", function () {
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<style>
    .transparent-icon {
        opacity: 0.5; /* Ajuste a opacidade conforme necessário */
    }

    .custom-password-box {
        border-radius: 0; /* Remove bordas arredondadas, deixando retangular */
        height: 40px; /* Define uma altura para tornar a caixa mais retangular */
    }
</style>  

                <div class="text-end">
                    <a href="#" class="text-muted">Esqueci minha senha</a>
                </div>
                    <button type="submit" class="btn btn-yellow mt-3">ENTRAR</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection