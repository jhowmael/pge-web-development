@extends('layouts.web')

@section('content')

<div class="row align-items-center">
    <!-- Coluna de Texto -->
    <div class="text-center mt-5 mb-1">
        <h3 class="fw-bold">Seja bem-vindo ao AproveME!</h3> <!-- Texto de boas-vindas -->
        <p class="lead text-muted">Estamos aqui para ajudá-lo a alcançar o sucesso nos vestibulares com um plano de estudo personalizado e apoio especializado.</p>
    </div>

    <div class="col-md-6">
        <div class="bg-light p-5 rounded-5 shadow-lg position-relative overflow-hidden d-inline-block">
            <h2 class="display-4 text-dark mb-3 fw-bold text-nowrap">Seu futuro começa aqui</h2>
            <p class="lead text-muted mb-4">
                Realize seu sonho de sucesso nos vestibulares com um plano de estudo eficaz e apoio especializado.
            </p>

            <!-- Centralizando o botão -->
            <div class="d-flex justify-content-center">
                <a href="{{ route('plans') }}" class="btn btn-warning btn-lg mt-3 px-5 py-3 rounded-pill shadow-sm btn-hover">
                    Comece agora!
                </a>
            </div>

            <!-- Firulas com formas curvas (usando um efeito SVG de fundo) -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 start-0 w-100" style="z-index: -1;">
                <path fill="#f8f9fa" d="M0,160L1440,96L1440,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <!-- Coluna de Imagem -->
    <div class="col-md-6 text-center text-md-end">
        <img src="{{ asset('images/estudante-mulher.png') }}" alt="Imagem de estudos" class="img-fluid rounded">
    </div>
</div>

<!-- Nova Seção "Por que estudar na Aproveme?" -->
<div class="container mt-5 py-5">
    <h2 class="text-center text-dark mb-5">Por que estudar na AproveME?</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Caixa 1 -->
        <div class="col">
            <div class="card shadow-sm border-0 rounded-3 hover-effect">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title home-card-text">Metodologia Eficaz</h5>
                    <p class="card-text text-muted text-center flex-grow-1">
                        Nossa metodologia personalizada ajuda cada aluno a alcançar seu melhor desempenho, focando nas suas necessidades individuais.
                    </p>
                </div>
            </div>
        </div>
        <!-- Caixa 2 -->
        <div class="col">
            <div class="card shadow-sm border-0 rounded-3 hover-effect">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title home-card-text">Inteligência Artificial para Redação</h5>
                    <p class="card-text text-muted text-center flex-grow-1">
                        Obtenha análises detalhadas de suas redações em tempo real com a ajuda de nossa tecnologia de Inteligência Artificial, identificando pontos fortes e áreas de melhoria para garantir sua melhor performance nos vestibulares.
                    </p>
                </div>
            </div>
        </div>
        <!-- Caixa 3 -->
        <div class="col">
            <div class="card shadow-sm border-0 rounded-3 hover-effect">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title home-card-text">Material Exclusivo</h5>
                    <p class="card-text text-muted text-center flex-grow-1">
                        Acesso a materiais de estudo exclusivos e atualizados para garantir o melhor conteúdo para a sua preparação.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        <!-- Caixa 4 -->
        <div class="col">
            <div class="card shadow-sm border-0 rounded-3 hover-effect">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title home-card-text">Simulados Realistas</h5>
                    <p class="card-text text-muted text-center flex-grow-1">
                        Realize simulados com questões semelhantes às dos vestibulares para se preparar de forma eficiente.
                    </p>
                </div>
            </div>
        </div>
        <!-- Caixa 5 -->
        <div class="col">
            <div class="card shadow-sm border-0 rounded-3 hover-effect">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title home-card-text">Análise Pessoal</h5>
                    <p class="card-text text-muted text-center flex-grow-1">
                        Receba uma avaliação personalizada do seu desempenho. Nossa equipe de especialistas irá identificar suas fortalezas e áreas a melhorar, garantindo que você tenha um plano de estudo adaptado às suas necessidades.
                    </p>
                </div>
            </div>
        </div>
        <!-- Caixa 6 -->
        <div class="col">
            <div class="card shadow-sm border-0 rounded-3 hover-effect">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title home-card-text">Mentoria Personalizada</h5>
                    <p class="card-text text-muted text-center flex-grow-1">
                        Nossa equipe de mentores acompanha seu progresso e oferece orientações para melhorar o seu desempenho.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <!-- Colocando o título acima -->
        <div class="col-12 text-center mb-4">
            <h2 class="section-title">O que nossos alunos pensam sobre nós</h2>
        </div>

        <!-- Imagem Redonda e Carrossel de Testemunhos Juntos -->
        <div class="col-md-4 text-center mb-4 mb-md-0">
            <!-- Esta imagem será alterada automaticamente pelo carrossel -->
            <img id="studentImage" src="{{ asset('images/estudante-1.jpg') }}" alt="Imagem de estudos" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
        </div>

        <div class="col-md-8">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <!-- Testemunho 1 -->
                    <div class="carousel-item active" data-bs-interval="5000" data-image="estudante-1.jpg">
                        <div class="testimonial-item">
                            <p class="text-muted testimonial-text">"Estudar no Aproveme foi a melhor decisão! O suporte personalizado me ajudou a melhorar minhas habilidades em redação e a ter mais confiança para os vestibulares."</p>
                            <footer class="blockquote-footer testimonial-author">Mario da Silva, Aluno</footer>
                        </div>
                    </div>
                    <!-- Testemunho 2 -->
                    <div class="carousel-item" data-bs-interval="5000" data-image="estudante-2.jpg">
                        <div class="testimonial-item">
                            <p class="text-muted testimonial-text">"A metodologia de estudo é incrível, com materiais atualizados e simulados que me prepararam perfeitamente para os exames."</p>
                            <footer class="blockquote-footer testimonial-author">João Pereira, Aluno</footer>
                        </div>
                    </div>
                    <!-- Testemunho 3 -->
                    <div class="carousel-item" data-bs-interval="5000" data-image="estudante-3.jpg">
                        <div class="testimonial-item">
                            <p class="text-muted testimonial-text">"A mentoria personalizada me fez sentir mais preparado e focado. Hoje, tenho certeza de que estou no caminho certo para o sucesso."</p>
                            <footer class="blockquote-footer testimonial-author">Ana Costa, Aluna</footer>
                        </div>
                    </div>
                    <!-- Testemunho 4 -->
                    <div class="carousel-item" data-bs-interval="5000" data-image="estudante-4.jpg">
                        <div class="testimonial-item">
                            <p class="text-muted testimonial-text">"Os simulados e a análise de redação foram essenciais para o meu desempenho. Consegui melhorar minhas notas e me sentir mais seguro para o vestibular."</p>
                            <footer class="blockquote-footer testimonial-author">Carolina Oliveira, Aluna</footer>
                        </div>
                    </div>
                    <!-- Testemunho 5 -->
                    <div class="carousel-item" data-bs-interval="5000" data-image="estudante-5.jpg">
                        <div class="testimonial-item">
                            <p class="text-muted testimonial-text">"O Aproveme me ajudou a ter uma preparação completa e focada. Sou muito grato pela dedicação dos mentores e pela qualidade dos materiais oferecidos."</p>
                            <footer class="blockquote-footer testimonial-author">Juliana Martins, Aluna</footer>
                        </div>
                    </div>
                </div>

                <!-- Indicadores de navegação (pontos) -->
                <div class="carousel-indicators mt-3">
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<script>
    // Script para atualizar a imagem conforme o slide
    const carousel = document.getElementById('testimonialCarousel');
    const studentImage = document.getElementById('studentImage');

    // Evento 'slid.bs.carousel' dispara quando o slide foi alterado
    carousel.addEventListener('slid.bs.carousel', function () {
        const activeItem = document.querySelector('.carousel-item.active');
        const imageName = activeItem.getAttribute('data-image'); // Recupera o nome da imagem associado ao slide
        studentImage.src = "{{ asset('images/') }}" + "/" + imageName; // Atualiza a imagem
    });
</script>

@endsection