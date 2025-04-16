@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4" data-aos="fade-up" data-aos-delay="30">
        <h2 class="fw-bold">Fique por dentro das novidades!</h2>
        <p class="lead text-muted">
            Acompanhe notícias, dicas e atualizações sobre vestibulares, ENEM e educação.
            Mantenha-se informado para conquistar sua aprovação!
        </p>
    </div>

    <!-- FeedWind integrado -->
    <div class="bg-white p-4 rounded-4 shadow-sm">
        <!-- start feedwind code -->
<!-- start feedwind code --> <script type="text/javascript" src="https://feed.mikle.com/js/fw-loader.js" preloader-text="Carregando..." data-fw-param="172355/"></script> <!-- end feedwind code -->        <!-- end feedwind code -->
    </div>
</div>
@endsection
