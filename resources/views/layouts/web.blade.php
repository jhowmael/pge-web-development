<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APROVAME</title>

    <!-- CSS Bootstrap e personalizados -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/web.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Ícone do site -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>

<body style="height: 100%; margin: 0;">
    <!-- Loader de Carregamento -->
    <div id="loader" class="loader">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

    <div class="content d-flex flex-column" style="min-height: 100vh;">

        <!-- Navbar -->
        <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-custom px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" style="height: 40px;" class="img-fluid">
                </a>

                <!-- Botão Hamburguer -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-3"><a class="nav-link fw-semibold" href="{{ route('home') }}">Início</a></li>
                        <li class="nav-item me-3"><a class="nav-link fw-semibold" href="{{ route('about') }}">Sobre nós</a></li>
                        <li class="nav-item me-3"><a class="nav-link fw-semibold" href="{{ route('plans') }}">Planos</a></li>
                        <li class="nav-item me-3"><a class="nav-link fw-semibold" href="{{ route('contact') }}">Contato</a></li>
                        <li class="nav-item me-3"><a class="nav-link fw-semibold" href="{{ route('help') }}">Ajuda</a></li>
                        <li class="nav-item me-3"><a class="nav-link fw-semibold" href="{{ route('blog') }}">Notícias</a></li>
                    </ul>

                    <!-- Ações (lado direito) -->
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        @php $user = auth()->user(); @endphp

                        @if($user)
                        @if($user->premium === 1)
                        <li class="nav-item">
                            <a class="btn fw-bold" href="{{ route('welcome') }}">Área do Estudante</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="btn fw-bold" href="{{ route('plans') }}">Seja Premium</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="btn fw-bold" href="{{ route('plans') }}">Seja Premium</a>
                        </li>
                        @endif

                        @guest
                        <li class="nav-item">
                            <a class="btn fw-bold" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn fw-bold" href="{{ route('register') }}">Registrar</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link fw-bold dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if(auth()->user()->profile_picture)
                                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Foto de Perfil" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 8px;">
                                @endif
                                {{ explode(' ', auth()->user()->name)[0] }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('plans') }}">Minha assinatura</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
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
        <br>
        <br>
        <!-- Conteúdo dinâmico -->
        <main class="flex-grow-1">
            @yield('content')
        </main>

        <!-- Botão WhatsApp -->
        <a href="https://wa.me/seunumerodetelefone" target="_blank" class="whatsapp-icon">
            <i class="fa-brands fa-whatsapp"></i>
        </a>

        <!-- Rodapé -->
        <footer class="text-light text-center py-3 mt-auto fw-semibold">
            <div class="container">
                <a href="https://www.instagram.com/seuperfil" target="_blank" class="text-light me-3">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/seuperfil" target="_blank" class="text-light me-3">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://wa.me/seunumerodetelefone" target="_blank" class="text-light">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <p class="mb-0 mt-2">&copy; {{ date('Y') }} APROVAME. Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init(); // Animações com AOS
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 10) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });

        // Esconde o loader após o carregamento da página
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loader').style.display = 'none';
            }, 700);
        });
    </script>
    
</body>

</html>
