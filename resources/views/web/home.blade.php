@extends('layouts.web-home')

@section('content')


<!-- Top -->
<section>
    <div class="side-top">
        <div class="container">
            <br>
            <br>
            <br>
            <div class="text-center mt-5">
                <h3 class="fw-bold text-white">Seja bem-vindo ao AproveME!</h3>
                <p class="lead text-muted; text-white">Estamos aqui para ajudá-lo a alcançar o sucesso nos vestibulares com um plano de estudo personalizado e apoio especializado.</p>
            </div>
            <br>
            <br>
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <!-- Coluna de Texto -->
                <div class="col-md-6 text-center text-md-start">
                    <div class="bg-light p-4 rounded-4 shadow-lg position-relative overflow-hidden hover-effect">
                        <div class="text-center mt-5">

                            <h2 class="display-5 text-dark mb-3 fw-bold" >Seu futuro começa aqui</h2>
                            <p class="lead text-muted mb-4">
                                Realize seu sonho de sucesso nos vestibulares com um plano de estudo eficaz e apoio especializado.
                            </p>
                            <!-- Centralizando o botão -->
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('plans') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">
                                    Comece agora!
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Coluna de Imagem -->
                <div class="col-md-6 mb-4 mb-md-0 text-center">
                </div>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</section>
<br>
<br>
<section>
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-md-row">
            <!-- Coluna de Texto -->
            <div class="col-md-6 text-center text-md-start" data-aos="fade-right" data-aos-delay="30">
                <img src="{{ asset('images/lapis.avif') }}"
                    alt="Imagem de estudos"
                    class="img-fluid rounded"
                    style="max-width: 400px; opacity: 0; transition: opacity 1s ease-in-out;"
                    onload="this.style.opacity=1;">
            </div>
            <!-- Coluna de Imagem -->
            <div class="col-md-6 mb-4 mb-md-0 text-center" data-aos="fade-left" data-aos-delay="30">
                <div class="text-center mt-5">

                    <h2 class=" text-dark mb-3 fw-bold"> Nossa Visão </h2>
                    <p class="lead text-muted mb-4">
                        Acreditamos que todo estudante merece acesso a uma preparação de qualidade para o vestibular. Por isso, oferecemos uma plataforma completa, com conteúdo direcionado, ferramentas inteligentes e tecnologia de ponta para ajudar você a alcançar seus objetivos.                    <!-- Centralizando o botão -->
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('about') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill shadow-sm">
                            Saiba mais
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<section>
    <div class="container">
        <!-- Por que estudar na AproveME -->
        <div class="py-5">
            <h2 class="text-center fw-bold">Por que estudar na AproveME?</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ([
                    ['Metodologia Eficaz', 'Nossa metodologia personalizada garante um aprendizado eficiente e adaptado ao seu ritmo. Ela considera suas dificuldades, pontos fortes e estilo de estudo para potencializar seus resultados.', 'fa-solid fa-brain'],
                    ['Revisão com IA', 'A IA analisa sua redação com precisão, oferecendo sugestões para melhorar seu desempenho. Com isso, você desenvolve textos mais coerentes, coesos e alinhados aos critérios dos avaliadores.', 'fa-solid fa-robot'],
                    ['Material Exclusivo', 'Estude com conteúdos atualizados, pensados para os principais vestibulares do país. Cada material é elaborado por especialistas para facilitar sua compreensão e fixação do conteúdo.', 'fa-solid fa-book'],
                    ['Simulados Realistas', 'Treine com simulados que reproduzem a estrutura e nível das provas oficiais. Ao se familiarizar com o ambiente do vestibular, você ganha confiança e aprende a gerenciar melhor o tempo.', 'fa-solid fa-file-alt'],
                    ['Análise Pessoal', 'Receba relatórios completos com dados sobre seu desempenho e pontos de melhoria. Isso permite um planejamento mais estratégico, com foco em resultados concretos e evolução constante.', 'fa-solid fa-chart-line'],
                    ['Mentoria Personalizada', 'Tenha acompanhamento individual com mentores que orientam sua jornada de estudos. Eles ajudam na organização da rotina, motivam e ajustam o caminho conforme seu progresso.', 'fa-solid fa-user-graduate']
                ] as $item)
                <div class="col">
                    <div class="card shadow-sm border-0 rounded-3 h-100 hover-effect position-relative" data-aos="fade-up" data-aos-delay="30" >
                        <div class="card-body d-flex flex-column pt-4 position-relative">
                            <!-- Ícone com espaço da borda -->
                            <div style="top: 1rem; left: 1.25rem; pointer-events: none;">
                                <i class="{{ $item[2] }} fa-lg text-white"></i>
                            </div>
                            <h5 class="card-title home-card-text text-center">{{ $item[0] }}</h5>
                            <p class="card-text text-center flex-grow-1 text-light">{{ $item[1] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Testemunhos -->
<section>
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
                                <p class="testimonial-text">"Estudar no Aproveme foi a melhor decisão! O suporte personalizado me ajudou a melhorar minhas habilidades em redação e a ter mais confiança para os vestibulares."</p>
                                <p class="testimonial-author">Mario da Silva, Aluno</p>
                            </div>
                        </div>
                        <!-- Testemunho 2 -->
                        <div class="carousel-item" data-bs-interval="5000" data-image="estudante-2.jpg">
                            <div class="testimonial-item">
                                <p class="testimonial-text">"A metodologia de estudo é incrível, com materiais atualizados e simulados que me prepararam perfeitamente para os exames."</p>
                                <p class="testimonial-author">João Pereira, Aluno</p>
                            </div>
                        </div>
                        <!-- Testemunho 3 -->
                        <div class="carousel-item" data-bs-interval="5000" data-image="estudante-3.jpg">
                            <div class="testimonial-item">
                                <p class="testimonial-text">"A mentoria personalizada me fez sentir mais preparado e focado. Hoje, tenho certeza de que estou no caminho certo para o sucesso."</p>
                                <p class="testimonial-author">Ana Costa, Aluna</p>
                            </div>
                        </div>
                        <!-- Testemunho 4 -->
                        <div class="carousel-item" data-bs-interval="5000" data-image="estudante-4.jpg">
                            <div class="testimonial-item">
                                <p class="testimonial-text">"Os simulados e a análise de redação foram essenciais para o meu desempenho. Consegui melhorar minhas notas e me sentir mais seguro para o vestibular."</p>
                                <p class="testimonial-author">Carolina Oliveira, Aluna</p>
                            </div>
                        </div>
                        <!-- Testemunho 5 -->
                        <div class="carousel-item" data-bs-interval="5000" data-image="estudante-5.jpg">
                            <div class="testimonial-item">
                                <p class="testimonial-text">"O Aproveme me ajudou a ter uma preparação completa e focada. Sou muito grato pela dedicação dos mentores e pela qualidade dos materiais oferecidos."</p>
                                <p class="testimonial-author">Juliana Martins, Aluna</p>
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
</section>

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