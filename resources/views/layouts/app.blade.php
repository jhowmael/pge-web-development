<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>APROVAME</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dark-theme.css') }}">
    <link rel="stylesheet" href="https://6346-2804-46dc-420-32aa-478a-ff07-629f-b786.ngrok-free.app/css/app.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/821b65200f.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-4 py-0" style="min-height: 48px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}" style="margin-left: 35px;">
                <img src="{{ asset('images/logo-aprovame.png') }}" alt="Logo Aprovame" style="height: 40px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                    @auth
                    <li class="nav-item me-3">
                        <a class="nav-link position-relative" href="#">
                            <i class="fa-regular fa-envelope fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link position-relative" href="#">
                            <i class="fa-regular fa-bell fa-lg"></i>
                        </a>
                    </li>

                    <!-- Ícone de troca de tema posicionado na mesma linha que os outros ícones -->
                    <li class="nav-item me-3">
                        <a id="toggle-theme" class="nav-link position-relative" href="#">
                            <i id="theme-icon" class="fa-solid fa-moon fa-lg"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div class="d-flex">
        <div class="col-md-2 bg-light p-3" style="min-height: 100vh; box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);">
            @auth
            <div class="d-flex flex-column align-items-center mb-4">
                @if(auth()->user()->profile_picture)
                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }} "
                    class="rounded-circle"
                    style="width: 120px; height: 120px; object-fit: cover; box-shadow: 0 0 10px rgba(0, 117, 97, 0.4);">
                @endif
                <h6 class="fw-bold mt-2">{{ explode(' ', auth()->user()->name)[0] }}</h6>
                <p class="fw-bold mt-2"
                    style="color: {{ auth()->user()->total_points >= 2000 ? '#ffd700' : (auth()->user()->total_points >= 1000 ? '#7C7C7C' : '#cd7f32') }};">
                    Pontuação: {{ auth()->user()->total_points }}
                </p>
                <i class="fa-solid fa-trophy"
                    style="color: {{ auth()->user()->total_points >= 2000 ? '#ffd700' : (auth()->user()->total_points >= 1000 ? '#7C7C7C' : '#cd7f32') }}; font-size: 28px;"></i>
            </div>
            @endauth

            <hr style="border: 0; height: 2px; background-color: #007561">

            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}"><i
                            class="fa-solid fa-house"></i> Início</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.configurations') }}"><i
                            class="fa-solid fa-user"></i> Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('learn') }}"><i
                            class="fa-solid fa-graduation-cap"></i> Aprendizado</a></li>
                @if(auth()->user() && auth()->user()->type === 'admin')
                <hr style="border: 0; height: 2px; background-color: #007561">
                <li class="nav-item"><a class="nav-link" href="{{ route('administrative.dashboard') }}"><i
                            class="fa-solid fa-sliders"></i> Administrativo</a></li>
                @endif
            </ul>

            <hr style="border: 0; height: 2px; background-color: #007561">

            @auth
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"> Voltar para o site</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('plans') }}">Minha assinatura</a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                </li>
            </ul>
            @endauth
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-10 col-12 px-4 py-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3 mx-auto" style="max-width: 600px;" role="alert">
                    <strong>Erro:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->getMessages() as $field => $messages)
                            @foreach ($messages as $message)
                                <li><strong>{{ ucfirst($field) }}:</strong> {{ $message }}</li>
                            @endforeach
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3 mx-auto" style="max-width: 600px;" role="alert">
                    <strong>Sucesso:</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif
            @yield('content')
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="text-light text-center py-3 mt-auto fw-semibold bg-dark">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.getElementById('toggle-theme');
            const themeIcon = document.getElementById('theme-icon');

            // Aplica o tema salvo
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-mode');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            }

            themeToggle.addEventListener('click', () => {
                document.body.classList.toggle('dark-mode');

                const isDark = document.body.classList.contains('dark-mode');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');

                themeIcon.classList.toggle('fa-moon', !isDark);
                themeIcon.classList.toggle('fa-sun', isDark);
            });
        });
    </script>
</body>

</html>