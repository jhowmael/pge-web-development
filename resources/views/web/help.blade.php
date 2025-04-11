@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="fw-bold text-warning">Dúvidas Frequentes</h2>
        </div>
    </div>

    <div class="mt-4">
        <div>
            <h5 class="fw-bold text-warning faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" role="button">
                Posso fazer estorno?
                <span class="faq-arrow">&#9660;</span>
            </h5>
            <p id="faq1" class="collapse">SIM! Você pode solicitar o estorno em até 7 dias após sua compra, caso não esteja satisfeito.</p>
        </div>

        <hr>

        <div>
            <h5 class="fw-bold text-warning faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" role="button">
                Como é o Guia de Estudos?
                <span class="faq-arrow">&#9660;</span>
            </h5>
            <p id="faq2" class="collapse">O Guia de Estudos é personalizado de acordo com a dificuldade do aluno. Nosso software analisa em quais matérias e temas específicos você mais precisa de apoio.</p>
        </div>

        <hr>

        <div>
            <h5 class="fw-bold text-warning faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" role="button">
                Como funciona a IA?
                <span class="faq-arrow">&#9660;</span>
            </h5>
            <p id="faq3" class="collapse">Nossa IA é a mais moderna no mercado. As análises são feitas considerando: escrita, abordagem do tema, decorrer do texto e domínio da Língua Portuguesa.</p>
        </div>

        <hr>

        <div>
            <h5 class="fw-bold text-warning faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" role="button">
                Quais os Métodos de Pagamento?
                <span class="faq-arrow">&#9660;</span>
            </h5>
            <p id="faq4" class="collapse">Os métodos de pagamento são os mais variados: boleto, pix, crédito e débito. Disponibilizamos também renovações automáticas diretamente no cartão (crédito ou débito).</p>
        </div>
    </div>
</div>
@endsection
