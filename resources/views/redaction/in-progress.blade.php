@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Texto da Redação</h4>
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
                            <p>{!! $redaction->introduction !!}</p>

                            <center>
                                @if (!empty($redaction->simulation->primary_image_redaction))
                                    <img src="{{ asset('storage/redactions/' . $redaction->simulation->primary_image_redaction) }}" 
                                        alt="Imagem Primária" 
                                        class="img-fluid img-thumbnail mt-1" 
                                        style="max-width: 100%;">
                                @endif
                                @if (!empty($redaction->simulation->secondary_image_redaction))
                                    <img src="{{ asset('storage/redactions/' . $redaction->simulation->secondary_image_redaction) }}" 
                                        alt="Imagem Secundária" 
                                        class="img-fluid img-thumbnail mt-1" 
                                        style="max-width: 100%;">
                                @endif
                            </center>
                        </div>
    
                    </div>

                    <!-- FORMULÁRIO -->
                    <form action="{{ route('redaction.finish', $redaction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Campo Título -->
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input id="title" name="title" class="form-control" required> {{ $redaction->title }} </input>
                        </div>

                        <!-- Editor Quill -->
                        <div class="form-group mt-3">
                            <label for="quill-editor">Texto</label>
                            <div id="quill-editor" style="height: 250px; background: white;"></div>
                            <input type="hidden" name="redaction_text" id="redaction_text">
                        </div>

                        <!-- Botão -->
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary">Enviar Redação</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quill.js CDN -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Inicialização do Quill e envio do conteúdo -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializa o Quill editor
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    ['link']
                ]
            }
        });

        // Se houver texto pré-existente, popula o editor
        @if($redaction->redaction_text)
            console.log('Texto pré-existente:', `{!! addslashes($redaction->redaction_text) !!}`);
            quill.root.innerHTML = `{!! addslashes($redaction->redaction_text) !!}`;
        @endif

        // Sempre que o conteúdo mudar, atualiza o campo oculto
        quill.on('text-change', function () {
            document.querySelector('#redaction_text').value = quill.root.innerHTML;
        });

        // Garante envio do conteúdo em casos extremos (fallback)
        const form = document.querySelector('form');
        form.addEventListener('submit', function () {
            document.querySelector('#redaction_text').value = quill.root.innerHTML;
        });
    });
</script>

@endsection
