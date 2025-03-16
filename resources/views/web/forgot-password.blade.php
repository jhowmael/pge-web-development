@extends('layouts.web') 

@section('content')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container-recuperacao {
            max-width: 800px;
            margin: auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .left-panel {
            background-color: #FFD700;
            padding: 40px;
            color: white;
            text-align: center;
            position: relative;
        }

        .left-panel h2 {
            font-weight: bold;
        }

        .btn-custom {
            border: 2px solid white;
            color: white;
            background: none;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-custom:hover {
            background: white;
            color: #FFD700;
        }

        .back-arrow {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 24px;
            color: white;
            text-decoration: none;
        }

        .right-panel {
            background-color: white;
            padding: 40px;
        }

        .form-control {
            border-radius: 25px;
        }

        .btn-yellow {
            background-color: #FFD700;
            border: none;
            border-radius: 25px;
            padding: 10px;
            color: white;
            font-weight: bold;
            width: 100%;
        }

        .btn-yellow:hover {
            background-color: #E6C200;
        }

        .link-muted {
            color: gray;
            text-decoration: none;
            font-size: 14px;
        }

        .link-muted:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="container-recuperacao row">
            
            <!-- Painel Esquerdo -->
            <div class="col-md-5 left-panel d-flex flex-column justify-content-center">
                <a href="#" class="back-arrow">&larr;</a>
                <h2>APROVAME</h2>
                <p>Não possui cadastro?</p>
                <p>Cadastre-se agora mesmo.</p>
                <a href="#" class="btn-custom">CADASTRAR</a>
            </div>
            
            <!-- Painel Direito -->
            <div class="col-md-7 right-panel">
                <h3 class="text-center text-warning fw-bold">Recupere sua conta</h3>
                <p class="text-center text-muted">Preencha seus dados</p>
                
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Confirme seu Email">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Código de recuperação">
                    </div>
                    
                    <div class="text-center">
                        <a href="C:\xampp\htdocs\pge-web-development\resources\views\Recuperação.blade.php" class="link-muted">Reenviar Código de Recuperação</a>
                    </div>
                    
                    <button type="submit" class="btn btn-yellow mt-3">CONFIRMAR</button>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
@endsection
