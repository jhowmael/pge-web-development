<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APROVAME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Esse style é temporaário troca de acordo com o ngrok -->
    <link rel="stylesheet" href="https://9b81-2804-46dc-420-32aa-e408-6f3f-4682-ca9c.ngrok-free.app/css/app.css">
    <!---->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-light-yellow text-dark shadow navbar-padding">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto justify-content-center d-flex align-items-center"> <!-- Navbar itens à esquerda -->
                            <li class="nav-item me-1">
                                <a class="navbar-brand" href="{{ route('home') }}">
                                    <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" style="height: 40px;">
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav"> <!-- Navbar itens à direita -->
                            <li class="nav-item">
                                <a class="btn btn-warning me-2 btn-outline-dark fw-bold" href="{{ route('plans') }}">Seja Premium</a>
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
                                    <!-- Opção Área do Estudante -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('welcome') }}">Área do Estudante</a>
                                    </li>
                                    <!-- Opção Logout -->
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
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="d-flex">
                    <div class="sidebar bg-light p-3" style="width: 250px; min-height: 170vh; display: flex; flex-direction: column; overflow-y: auto; box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);">
                        <div class="text-center mb-4">
                            <!-- User Image -->
                            <h6 class="font-weight-bold" style="font-size: 20px; color: #333;"> {{auth()->user()->name }}
                            </h6>
                            @if(auth()->user()->profile_picture)
                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                alt="Foto de Perfil"
                                class="rounded-circle"
                                style="width: 150px; height: 150px; object-fit: cover; margin-right: 8px; 
                    border: none; box-shadow: 0 0 15px rgba(0, 117, 97, 0.4);">
                            @endif
                            @error('profile_picture')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <br>
                            @php
                            $points = auth()->user()->total_points;
                            $trophy = 'fa-bronze'; // Padrão: bronze
                            $color = '#cd7f32'; // Cor do bronze

                            if ($points >= 2000) {
                            $trophy = 'fa-gold';
                            $color = '#ffd700'; // Ouro
                            } elseif ($points >= 1000) {
                            $trophy = 'fa-silver';
                            $color = '#7C7C7C'; // Prata
                            }
                            @endphp
                            <br>
                            <h8 style="color: {{ $color }}; font-weight: 600;">
                                Pontuação total: {{ auth()->user()->total_points }}
                            </h8>

                        </div>
                        <center>
                            <div class="mt-0"> <!-- Reduzi a margem inferior -->
                                <i class="fa-solid fa-trophy" style="font-size: 30px; color: {{ $color }};"></i>
                            </div>
                        </center>

                        <hr style="border: 0; height: 2px; background-color: #007561">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}"
                                    href="{{ route('welcome') }}">
                                    <i class="fa-solid fa-house"></i> Início
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('user.configurations') ||
                                     request()->routeIs('user.edit-password') ? 'active' : '' }}"
                                    href="{{ route('user.configurations') }}">
                                    <i class="fa-solid fa-user"></i> Perfil
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('learn') ||
                                    request()->routeIs('simulation.index') ||
                                    request()->routeIs('redaction.index') ||
                                    request()->routeIs('userSimulation.index') ? 'active' : '' }}"
                                    href="{{ route('learn') }}">
                                    <i class="fa-solid fa-graduation-cap"></i> Aprendizado
                                </a>
                            </li>
                        </ul>

                        <hr style="border: 0; height: 2px; background-color: #007561">
                        @if(auth()->user() && auth()->user()->type === 'administrative')
                            <ul class="nav flex-column">
                                <li class="nav-item">

                                    <a class="nav-link {{ request()->routeIs('administrative.dashboard') ||
                                        request()->routeIs('administrative.dashboard-simulations') ||
                                        request()->routeIs('administrative.dashboard-users') || 
                                        request()->routeIs('administrative.add-simulations')
                                        ? 'active' : '' }}"
                                        href="{{ route('administrative.dashboard') }}">
                                        <i class="fa-solid fa-sliders"></i> Administrativo
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>