<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APROVAME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://6346-2804-46dc-420-32aa-478a-ff07-629f-b786.ngrok-free.app/css/app.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light-yellow text-dark shadow" style="padding-top: 5px; padding-bottom: 5px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" style="height: 40px;">
            </a>

            <!-- Botão de menu só em telas pequenas -->
            <button class="btn btn-outline-dark d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                ☰ Menu
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @php $user = auth()->user(); @endphp
                    @if($user && $user->premium === 1)
                    <li class="nav-item">
                        <a class="btn btn-light me-2 btn-outline-dark fw-bold" href="{{ route('welcome') }}">Área do Estudante</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="btn btn-warning me-2 btn-outline-dark fw-bold" href="{{ route('plans') }}">Seja Premium</a>
                    </li>
                    @endif

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
                            @if(auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto de Perfil" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 8px;">
                            @endif
                            {{ explode(' ', auth()->user()->name)[0] }}
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('plans') }}">Minha assinatura</a>
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

    <!-- Menu mobile (Offcanvas) -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}"><i class="fa-solid fa-house"></i> Início</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.configurations') }}"><i class="fa-solid fa-user"></i> Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('learn') }}"><i class="fa-solid fa-graduation-cap"></i> Aprendizado</a></li>
                @if(auth()->user() && auth()->user()->type === 'admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('administrative.dashboard') }}"><i class="fa-solid fa-sliders"></i> Administrativo</a></li>
                @endif
            </ul>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger w-100"><i class="fa-solid fa-right-from-bracket"></i> Sair</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar desktop -->
            <div class="col-md-2 d-none d-md-block">
                <div class="sidebar bg-light p-3" style="min-height: 100vh; box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);">
                    <div class="text-center mb-4">
                        <h6 class="fw-bold">{{ auth()->user()->name }}</h6>
                        @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; box-shadow: 0 0 10px rgba(0, 117, 97, 0.4);">
                        @endif
                        <p class="mt-2" style="color: {{ auth()->user()->total_points >= 2000 ? '#ffd700' : (auth()->user()->total_points >= 1000 ? '#7C7C7C' : '#cd7f32') }};">
                            Pontuação total: {{ auth()->user()->total_points }}
                        </p>
                        <i class="fa-solid fa-trophy" style="color: {{ auth()->user()->total_points >= 2000 ? '#ffd700' : (auth()->user()->total_points >= 1000 ? '#7C7C7C' : '#cd7f32') }}; font-size: 28px;"></i>
                    </div>

                    <hr style="border: 0; height: 2px; background-color: #007561">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}"><i class="fa-solid fa-house"></i> Início</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.configurations') || request()->routeIs('user.edit-password') ? 'active' : '' }}" href="{{ route('user.configurations') }}"><i class="fa-solid fa-user"></i> Perfil</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('learn') ? 'active' : '' }}" href="{{ route('learn') }}"><i class="fa-solid fa-graduation-cap"></i> Aprendizado</a></li>
                    </ul>

                    @if(auth()->user() && auth()->user()->type === 'admin')
                    <hr style="border: 0; height: 2px; background-color: #007561">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('administrative.dashboard') ? 'active' : '' }}" href="{{ route('administrative.dashboard') }}"><i class="fa-solid fa-sliders"></i> Administrativo</a></li>
                    </ul>
                    @endif
                </div>
            </div>

            <!-- Conteúdo principal -->
            <div class="col-md-10 col-12 px-4 py-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-light-yellow text-dark text-center py-3 mt-auto fw-semibold footer-shadow">
        <div class="container">
            <a href="https://www.instagram.com/seuperfil" target="_blank" class="text-dark me-2">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/seuperfil" target="_blank" class="text-dark me-2">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://wa.me/seunumerodetelefone" target="_blank" class="text-dark">
                <i class="fa-brands fa-whatsapp"></i>
            </a>
            <p class="mb-0 mt-2">&copy; {{ date('Y') }} APROVAME. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>