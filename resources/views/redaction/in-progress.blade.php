@extends('layouts.app')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Redação</h4>
                </div>
                <div class="card-body">

                    <center>
                        <h5>Escreva sua Redação: Tema - {{ $redaction->theme }}</h5>
                    </center>
                    <br>

                    <!-- DICAS -->
                    <div class="alert alert-warning">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><strong>Dicas para sua Redação:</strong></h6>
                            <button class="btn btn-sm btn-link p-0 toggle-section" data-bs-toggle="collapse" data-bs-target="#dicasSection" aria-expanded="true">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                        </div>
                        <div id="dicasSection" class="collapse show">
                            <ul class="mt-2">
                                <li><strong>Tamanho mínimo recomendado:</strong> 200 palavras.</li>
                                <li><strong>Estrutura:</strong> Introdução, desenvolvimento e conclusão.</li>
                                <li><strong>Revise:</strong> Após terminar, faça uma revisão geral para corrigir possíveis erros de gramática e coesão.</li>
                                <li><strong>Use um vocabulário adequado:</strong> Evite repetições e busque enriquecer seu texto com novas palavras.</li>
                                <li><strong>Tempo estimado:</strong> 60 minutos para a conclusão completa.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- INTRODUÇÃO -->
                    <div class="alert alert-success">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><strong>Texto Introdutório:</strong></h6>
                            <button class="btn btn-sm btn-link p-0 toggle-section" data-bs-toggle="collapse" data-bs-target="#introSection" aria-expanded="true">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                        </div>
                        <div id="introSection" class="collapse show mt-2">
                            <p>{{ $redaction->introduction }}</p>
                        </div>
                    </div>

                    <!-- PROPOSTA -->
                    <div class="alert alert-dark">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><strong>Proposta de Redação:</strong></h6>
                            <button class="btn btn-sm btn-link p-0 toggle-section" data-bs-toggle="collapse" data-bs-target="#propostaSection" aria-expanded="true">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                        </div>
                        <div id="propostaSection" class="collapse show mt-2">
                            <p>A partir da leitura dos textos motivadores e com base nos conhecimentos construídos ao longo de sua
                                formação, redija texto dissertativo-argumentativo em modalidade escrita formal da língua portuguesa sobre o tema
                                “{{ $redaction->theme }}”, apresentando proposta de intervenção que respeite os direitos
                                humanos. Selecione, organize e relacione, de forma coerente e coesa, argumentos e fatos para defesa de seu ponto de vista</p>
                        </div>
                    </div>

                    <!-- FORMULÁRIO -->
                    <form action="{{ route('redaction.finish', $redaction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Campo Título -->
                        <div class="form-group">
                            <label for="title">Título</label>
                            <textarea id="title" name="title" class="form-control" required>{{ $redaction->title }}</textarea>
                        </div>

                        <!-- Campo Texto -->
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <textarea id="text" name="text" class="form-control" rows="10" required>{{ $redaction->text }}</textarea>
                        </div>

                        <br>

                        <!-- Botão -->
                        <div class="d-flex justify-content-center">
                            <x-buttons.submit />
                        </div>
                    </form>

                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-section').forEach(function (btn) {
            const icon = btn.querySelector('i');
            const target = document.querySelector(btn.getAttribute('data-bs-target'));

            target.addEventListener('shown.bs.collapse', () => {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            });

            target.addEventListener('hidden.bs.collapse', () => {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            });
        });
    });
</script>
@endpush
