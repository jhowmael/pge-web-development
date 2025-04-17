@extends('layouts.web')

@section('content')
<section>
    <div class="container">
        <!-- Título principal -->
        <div class="text-center mt-5">
            <h3 class="fw-bold" data-aos="fade-up" data-aos-delay="30">Sobre nós</h3>
            <p class="lead text-secondary" data-aos="fade-up" data-aos-delay="30">
                Conheça mais sobre nós e como ajudamos na sua preparação para o vestibular.
            </p>
        </div>
        <br>
        <!-- Primeira parte: Imagem à esquerda -->
        <div class="row align-items-center flex-column-reverse flex-md-row my-5">
            <!-- Coluna de Imagem -->
            <div class="col-md-6 text-center text-md-start" data-aos="fade-right" data-aos-delay="30">
                <img src="{{ asset('images/estudantes.jpg') }}"
                     alt="Imagem de estudos"
                     class="img-fluid rounded"
                     style="max-width: 400px; opacity: 0; transition: opacity 1s ease-in-out;"
                     onload="this.style.opacity=1;">
            </div>
            <!-- Coluna de Texto -->
            <div class="col-md-6 text-center" data-aos="fade-left" data-aos-delay="30">
                <h2 class="text-dark mb-3 fw-bold">Quem somos</h2>
                <p class="lead text-muted mb-4">
                    Somos uma equipe apaixonada por educação e comprometida com o sucesso dos estudantes. Nossa missão é fornecer uma plataforma acessível, com ferramentas inovadoras e recursos eficazes para quem está se preparando para o vestibular. Acreditamos que cada aluno tem um potencial único e queremos ajudá-lo a alcançar seus objetivos com confiança e preparação.
                </p>
            </div>
        </div>

        <!-- Segunda parte: Imagem à direita -->
        <div class="row align-items-center flex-column-reverse flex-md-row-reverse my-5">
            <!-- Coluna de Imagem -->
            <div class="col-md-6 text-center text-md-end" data-aos="fade-left" data-aos-delay="30">
            <img src="{{ asset('images/analisando-dados.jpg') }}"
                alt="Imagem de estudos"
                     class="img-fluid rounded"
                     style="max-width: 400px; opacity: 0; transition: opacity 1s ease-in-out;"
                     onload="this.style.opacity=1;">
            </div>
            <!-- Coluna de Texto -->
            <div class="col-md-6 text-center" data-aos="fade-right" data-aos-delay="30">
                <h2 class="text-dark mb-3 fw-bold">Nossa abordagem</h2>
                <p class="lead text-muted mb-4">
                    Com a combinação de uma metodologia exclusiva e a inteligência artificial, nossa plataforma oferece um suporte individualizado que adapta-se ao seu ritmo de aprendizado. Se você busca mais do que simples materiais de estudo, mas uma experiência que potencialize seus resultados, está no lugar certo.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
