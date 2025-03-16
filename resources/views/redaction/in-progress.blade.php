@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Escreva sua Redação: Tema - {{ $redaction->theme }}</h2>
    
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

    <div class="alert alert-success">
        <h5><strong>Texto Introdutório:</strong></h5>
        <ul>
            <p>{{ $redaction->introduction }}</p>

        </ul>
    </div>  

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
        <center>
            <button type="submit" class="btn btn-primary">Salvar Redação</button>
        </center>
        <br>
    </form>
</div>
@endsection
