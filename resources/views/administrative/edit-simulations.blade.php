@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.administrative-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Editar Simulado</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrative.update-simulations', $simulation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">
                            <div class="col-md-4">
                                <label for="type" class="form-label">Tipo / Modelo</label>
                                <select class="form-select" id="type" name="type" required>
                                    @foreach (config('simulations.types') as $key => $type)
                                        <option value="{{ $key }}" {{ old('type', $simulation->type) == $key ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="year" class="form-label">Ano</label>
                                <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $simulation->year) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="lengague" class="form-label">Opção de Língua</label>
                                <select class="form-select" id="lengague" name="lengague" required>
                                    @foreach (config('simulations.lengagues') as $key => $lengague)
                                        <option value="{{ $key }}" {{ old('lengague', $simulation->lengague) == $key ? 'selected' : '' }}>{{ $lengague }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="book" class="form-label">Caderno</label>
                                <select class="form-select" id="book" name="book" required>
                                    @foreach (config('simulations.books') as $key => $book)
                                        <option value="{{ $key }}" {{ old('book', $simulation->book) == $key ? 'selected' : '' }}>{{ $book }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="edition" class="form-label">Edição</label>
                                <input placeholder="opcional" type="text" class="form-control" id="edition" name="edition" value="{{ old('edition', $simulation->edition) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="total_points" class="form-label">Total de Pontos</label>
                                <input type="number" class="form-control" id="total_points" name="total_points" value="{{ old('total_points', $simulation->total_points) }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="minimum_minute" class="form-label">Mínimo em Minutos</label>
                                <input type="number" class="form-control" id="minimum_minute" name="minimum_minute" value="{{ old('minimum_minute', $simulation->minimum_minute) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="total_duration" class="form-label">Duração Total</label>
                                <input type="number" class="form-control" id="total_duration" name="total_duration" value="{{ old('total_duration', $simulation->total_duration) }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="redaction_theme" class="form-label">Tema da Redação</label>
                                <input type="text" class="form-control" id="redaction_theme" name="redaction_theme" value="{{ old('redaction_theme', $simulation->redaction_theme) }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="quill-editor" class="form-label">Texto Introdutório (Redação)</label>

                                {{-- Editor visual --}}
                                <div id="quill-editor" style="height: 200px;"></div>

                                {{-- Campo oculto para envio --}}
                                <input type="hidden" name="redaction_introduction" id="redaction_introduction" value="{{ old('redaction_introduction', $simulation->redaction_introduction) }}" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label>Imagem Primária (Redação)</label>
                                <input type="file" name="primary_image_redaction" class="form-control">
                                @if($simulation->primary_image_redaction)
                                    <small class="text-muted">Imagem atual:</small><br>
                                    <img src="{{ asset('storage/redactions/' . $simulation->primary_image_redaction) }}" alt="Imagem Primária" class="img-thumbnail mt-1" style="max-width: 100px;">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label>Imagem Secundária (Redação)</label>
                                <input type="file" name="secondary_image_redaction" class="form-control">
                                @if($simulation->secondary_image_redaction)
                                    <small class="text-muted">Imagem atual:</small><br>
                                    <img src="{{ asset('storage/redactions/' . $simulation->secondary_image_redaction) }}" alt="Imagem Secundária" class="img-thumbnail mt-1" style="max-width: 100px;">
                                @endif
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="description" class="form-label">Observação</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $simulation->description) }}</textarea>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <x-buttons.submit text="Salvar Alterações" />
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

{{-- Quill.js CDN --}}
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

{{-- Inicialização e sincronização --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
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

        // Pega o valor salvo e insere no editor
        const content = document.getElementById('redaction_introduction').value;
        quill.root.innerHTML = content;

        // Sincroniza mudanças com input hidden
        quill.on('text-change', function () {
            document.getElementById('redaction_introduction').value = quill.root.innerHTML;
        });

        // Garante que o conteúdo seja atualizado antes do submit
        document.querySelector('form').addEventListener('submit', function () {
            document.getElementById('redaction_introduction').value = quill.root.innerHTML;
        });
    });
</script>

@endsection
