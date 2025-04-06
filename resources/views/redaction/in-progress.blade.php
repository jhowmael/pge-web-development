@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Redação</h4>
                </div>
                <div class="card-body">
                    <center>
                        <h1>Escreva sua Redação: Tema - {{ $redaction->theme }}</h1>
                    </center>

                    <!-- Dicas de Redação -->
                    <div class="alert alert-info">
                        <h5><strong>Dicas para sua Redação:</strong></h5>
                        <ul>
                            <li><strong>Tamanho mínimo recomendado:</strong> 200 palavras.</li>
                            <li><strong>Estrutura:</strong> Introdução, desenvolvimento e conclusão.</li>
                            <li><strong>Revise:</strong> Após terminar, faça uma revisão geral para corrigir possíveis erros de gramática e coesão.</li>
                            <li><strong>Use um vocabulário adequado:</strong> Evite repetições e busque enriquecer seu texto com novas palavras.</li>
                            <li><strong>Tempo estimado:</strong> 60 minutos para a conclusão completa.</li>
                        </ul>
                    </div>

                    <!-- Texto Introdutório -->
                    <div class="alert alert-success">
                        <h5><strong>Texto Introdutório:</strong></h5>
                        <p>{{ $redaction->introduction }}</p>
                    </div>

                    <!-- Formulário para a Redação -->
                    <form action="{{ route('redaction.finish', $redaction->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Campo para o Texto da Redação -->
                        <div class="form-group">
                            <label for="text">Texto</label>
                            <textarea id="text" name="text" class="form-control" rows="10" required>{{ $redaction->text }}</textarea>
                        </div>

                        <br>

                        <!-- Botões de Ação -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Salvar Redação</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
