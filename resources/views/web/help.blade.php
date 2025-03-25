@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="fw-bold">Dúvidas Frequentes</h2>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="faq-item p-4 bg-light-yellow shadow-sm rounded">
                <h5 class="fw-bold">Posso fazer estorno?</h5>
                <p>SIM! Você pode solicitar o estorno em até 7 dias após sua compra, caso não esteja satisfeito.</p>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="faq-item p-4 bg-light-yellow shadow-sm rounded">
                <h5 class="fw-bold">Como é o Guia de Estudos?</h5>
                <p>O Guia de Estudos é personalizado de acordo com a dificuldade do aluno. Nosso software analisa em quais matérias e temas específicos você mais precisa de apoio.</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="faq-item p-4 bg-light-yellow shadow-sm rounded">
                <h5 class="fw-bold">Como funciona a IA?</h5>
                <p>Nossa IA é a mais moderna no mercado. As análises são feitas considerando: escrita, abordagem do tema, decorrer do texto e domínio da Língua Portuguesa.</p>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="faq-item p-4 bg-light-yellow shadow-sm rounded">
                <h5 class="fw-bold">Quais os Métodos de Pagamento?</h5>
                <p>Os métodos de pagamento são os mais variados: boleto, pix, crédito e débito. Disponibilizamos também renovações automáticas diretamente no cartão (crédito ou débito).</p>
            </div>
        </div>
    </div>
</div>

@endsection
