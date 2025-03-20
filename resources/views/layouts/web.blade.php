<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APROVAME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>

<body style="height: 100%; margin: 0;">
    <div class="content d-flex flex-column" style="min-height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-light-yellow text-dark shadow navbar-padding">
            <div class="container-fluid">
                <!-- Logo e botão de menu colapsado no mobile -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" style="height: 40px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Itens da navbar -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Itens à esquerda -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center align-items-center">
                        <li class="nav-item me-3">
                            <a class="nav-link fw-semibold {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Quem somos</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link fw-semibold {{ request()->routeIs('plans') ? 'active' : '' }}" href="{{ route('plans') }}">Planos</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link fw-semibold {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contato</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link fw-semibold {{ request()->routeIs('help') ? 'active' : '' }}" href="{{ route('help') }}">Ajuda</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link fw-semibold {{ request()->routeIs('portal') ? 'active' : '' }}" href="{{ route('portal') }}">Portal</a>
                        </li>
                    </ul>

                    <!-- Itens à direita (botões) -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="btn btn-warning me-2 btn-outline-dark fw-bold" href="{{ route('login') }}">Seja Premium</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-light me-2 btn-outline-dark fw-bold" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-dark fw-bold" href="{{ route('register') }}">Registrar</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Imagem do Usuário -->
                                @if(auth()->user()->profile_picture)
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto de Perfil" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 8px;">
                                @endif
                                {{ explode(' ', auth()->user()->name)[0] }}
                                <i class="fas fa-chevron-down"></i> <!-- Ícone de seta para baixo -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('welcome') }}">Área do Estudante</a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Conteúdo Principal -->
        <div class="flex-grow-1">
            <div class="container">
                @yield('content')
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="bg-light-yellow text-dark text-center py-3 mt-auto fw-semibold footer-shadow">
            <div class="container">
                <a href="https://www.instagram.com/seuperfil" target="_blank" class="text-dark">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/seuperfil" target="_blank" class="text-dark">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://wa.me/seunumerodetelefone" target="_blank" class="text-dark">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <p class="mb-0">&copy; {{ date('Y') }} APROVAME. Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>