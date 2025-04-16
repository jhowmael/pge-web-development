@extends('layouts.web')

@section('content')

<div class="container">
    <div class="text-center mt-5">
        <h3 class="fw-bold" data-aos="fade-up" data-aos-delay="30">Seja bem-vindo ao AproveME!</h3>
        <p class="lead text-muted" data-aos="fade-up" data-aos-delay="30">Estamos aqui para ajudá-lo a alcançar o sucesso nos vestibulares com um plano de estudo personalizado e apoio especializado.</p>
    </div>

    <div class="row align-items-center flex-column-reverse flex-md-row" data-aos="fade-up" data-aos-delay="30">
        <!-- Coluna de Texto -->
        <div class="col-md-6 text-center text-md-start">
            <div class="bg-light p-4 rounded-4 shadow-lg position-relative overflow-hidden hover-effect">
                <h2 class="display-5 text-dark mb-3 fw-bold">Seu futuro começa aqui</h2>
                <p class="lead text-muted mb-4">
                    Realize seu sonho de sucesso nos vestibulares com um plano de estudo eficaz e apoio especializado.
                </p>

                <!-- Centralizando o botão -->
                <div class="d-flex justify-content-center justify-content-md-start">
                    <a href="{{ route('plans') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">
                        Comece agora!
                    </a>
                </div>

                <!-- SVG decorativo -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="position-absolute bottom-0 start-0 w-100" style="z-index: -1;">
                    <path fill="#f8f9fa" d="M0,160L1440,96L1440,320L0,320Z"></path>
                </svg>
            </div>
        </div>

        <!-- Coluna de Imagem -->
        <div class="col-md-6 mb-4 mb-md-0 text-center">
        <img src="{{ asset('images/estudante-mulher.png') }}" 
     alt="Imagem de estudos" 
     class="img-fluid rounded" 
     style="max-width: 300px; opacity: 0; transition: opacity 1s ease-in-out;" 
     onload="this.style.opacity=1;">
        </div>
    </div>

    <!-- Por que estudar na AproveME -->
    <div class="py-5">
        <h3 class="text-center fw-bold">Por que estudar na AproveME?</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ([
            ['Metodologia Eficaz', 'Nossa metodologia personalizada ajuda cada aluno...'],
            ['Inteligência Artificial para Redação', 'Utilize nossa tecnologia de IA para análises detalhadas...'],
            ['Material Exclusivo', 'Tenha acesso a materiais de estudo atualizados e exclusivos...'],
            ['Simulados Realistas', 'Realize simulados com questões semelhantes aos vestibulares...'],
            ['Análise Pessoal', 'Receba uma avaliação detalhada do seu desempenho...'],
            ['Mentoria Personalizada', 'Conte com o apoio de mentores especializados...']
            ] as $item)
            <div class="col" >
                <div class="card shadow-sm border-0 rounded-3 h-100 hover-effect">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title home-card-text text-center">{{ $item[0] }}</h5>
                        <p class="card-text text-muted text-center flex-grow-1">{{ $item[1] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Testemunhos -->
    <div class="container py-5">
        <div class="row justify-content-center align-items-center">
            <!-- Colocando o título acima -->
            <div class="col-12 text-center mb-4">
                <h3 class="section-title fw-bold">O que nossos alunos pensam sobre nós</h3>
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
</div>

<!-- Script para trocar imagem do aluno -->
<script>
    const carousel = document.getElementById('testimonialCarousel');
    const studentImage = document.getElementById('studentImage');
    carousel.addEventListener('slid.bs.carousel', function() {
        const activeItem = document.querySelector('.carousel-item.active');
        const imageName = activeItem.getAttribute('data-image');
        studentImage.src = "{{ asset('images/') }}/" + imageName;
    });
</script>

@endsection