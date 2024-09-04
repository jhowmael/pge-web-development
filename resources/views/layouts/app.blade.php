<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGE-1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        /* Estilo para garantir que o rodapé fique no final da tela */
        html, body {
            height: 100%;
            margin: 0;
        }
        .content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .flex-grow-1 {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="content d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">PGE-1</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plans') }}">Planos</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            <!-- Usuário não autenticado -->
                            <li class="nav-item">
                                <a class="btn btn-light me-2" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-light" href="{{ route('register') }}">Registrar</a>
                            </li>
                        @else
                            <!-- Usuário autenticado -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('welcome') }}">{{ auth()->user()->name }}</a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-light">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <div class="flex-grow-1">
            <div class="container">
                @yield('content')
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="bg-primary text-white text-center py-3 mt-auto">
            <div class="container">
                <p class="mb-0">&copy; {{ date('Y') }} PGE-1. Todos os direitos reservados.</p>
                <p class="mb-0">
                    <a href="{{ route('contact') }}" class="text-white">Contato</a> |
                    <a href="{{ route('plans') }}" class="text-white">Planos</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
