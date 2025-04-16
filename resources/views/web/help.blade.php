@extends('layouts.web')

@section('content')
<div class="container py-5">
    <div class="card p-4" style="min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)">

        <div class="row text-center mb-4" data-aos="fade-up" data-aos-delay="30">
            <div class="col-12">
                <h3 class="fw-bold">Dúvidas Frequentes</h3>
            </div>
        </div>

        <div class="accordion" id="faqAccordion">
            @php
                $faqs = [
                    ['title' => 'Posso fazer estorno?', 'id' => 'faq1', 'content' => 'SIM! Você pode solicitar o estorno em até 7 dias após sua compra, caso não esteja satisfeito.'],
                    ['title' => 'Como é o Guia de Estudos?', 'id' => 'faq2', 'content' => 'O Guia de Estudos é personalizado de acordo com a dificuldade do aluno. Nosso software analisa em quais matérias e temas específicos você mais precisa de apoio.'],
                    ['title' => 'Como funciona a IA?', 'id' => 'faq3', 'content' => 'Nossa IA é a mais moderna no mercado. As análises são feitas considerando: escrita, abordagem do tema, decorrer do texto e domínio da Língua Portuguesa.'],
                    ['title' => 'Quais os métodos de pagamento?', 'id' => 'faq4', 'content' => 'Aceitamos boleto, pix, crédito e débito. Também oferecemos renovação automática via cartão de crédito ou débito.'],
                    ['title' => 'Como funcionam as correções de redações?', 'id' => 'faq5', 'content' => 'Você pode enviar quantas redações quiser para correção. Nossos professores e a IA analisam cada texto com base nos critérios do ENEM.'],
                    ['title' => 'Terei acesso a um painel de desempenho?', 'id' => 'faq6', 'content' => 'Sim! Você terá acesso a um painel de desempenho que mostra seu progresso e orienta nos pontos em que você precisa focar mais nos estudos.'],
                    ['title' => 'Como entro em contato com o suporte?', 'id' => 'faq7', 'content' => 'Nosso atendimento funciona 24h por dia via chat no site, WhatsApp ou e-mail. Estamos sempre prontos para te ajudar.'],
                ];
            @endphp

            @foreach ($faqs as $faq)
            <div class="mb-3">
                <h5 class="faq-header collapsed d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#{{ $faq['id'] }}" aria-expanded="false" role="button">
                    {{ $faq['title'] }}
                    <span class="faq-arrow">&#9660;</span>
                </h5>
                <div id="{{ $faq['id'] }}" class="collapse" data-bs-parent="#faqAccordion">
                    <p class="mt-2">{{ $faq['content'] }}</p>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const faqHeaders = document.querySelectorAll('.faq-header');

        faqHeaders.forEach(header => {
            header.addEventListener('click', function () {
                const arrow = this.querySelector('.faq-arrow');
                const isCollapsed = this.classList.contains('collapsed');

                if (arrow) {
                    arrow.innerHTML = isCollapsed ? '&#9650;' : '&#9660;';
                }
            });
        });
    });
</script>
@endpush

@push('styles')
<style>
    .faq-header {
        cursor: pointer;
        user-select: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-arrow {
        transition: transform 0.3s ease-in-out; /* Para animação suave (se quiser usar transformações) */
    }

    .faq-header.collapsed .faq-arrow {
        /* Se quiser usar transformações para girar a seta */
        /* transform: rotate(0deg); */
    }

    .faq-header:not(.collapsed) .faq-arrow {
        /* Se quiser usar transformações para girar a seta */
        /* transform: rotate(180deg); */
    }
</style>
@endpush
@endsection