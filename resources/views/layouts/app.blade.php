<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APROVAME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <div class="col-12"> 
        <nav class="navbar navbar-expand-lg navbar-dark bg-purple shadow-lg custom-navbar">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand" href="{{ route('home') }}"><i class="fa-solid fa-backward"></i> APROVAME </a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('welcome') }}">{{ auth()->user()->name }}</a>
                        </li>
                        <li class="nav-item text-white">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row">
        <div class="col-2"> 
            <div class="sidebar bg-light p-3" style="width: 250px; min-height: 100vh;">
                <div class="text-center mb-4">
                    <!-- User Image -->
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto de Perfil" class="img-thumbnail">
                    @endif
                    @error('profile_picture')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <h6>{{ auth()->user()->name }}</h6>
                </div>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}"> <i class="fa-solid fa-house"></i> Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.configurations') }}"> <i class="fa-solid fa-user"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('learn') }}"><i class="fa-solid fa-graduation-cap"></i> Aprendizado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-pen"></i> Redações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa-solid fa-file-signature"></i> Planos</a>
                    </li>
                </ul>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administrative.dashboard') }}"><i class="fa-solid fa-sliders"></i> Administrativo</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-10">
            <br>
            <br>
            <div class="flex-grow-1">
                @yield('content')
            </div>
        </div>
    </div>
</div>

</div>

    <footer class="bg-purple text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} APROVAME. Todos os direitos reservados.</p>
            <p class="mb-0">
                <a href="{{ route('contact') }}" class="text-white">Contato</a> |
                <a href="{{ route('plans') }}" class="text-white">Planos</a>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


