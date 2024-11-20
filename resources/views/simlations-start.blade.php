@extends('layouts.simulation')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulado - {{ $simulation->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">{{ $simulation->name }}</h1>
        <p class="text-center">{{ $simulation->description }}</p>
    
        <form action="#" method="POST">
            @csrf
            @foreach ($simulation->questions as $index => $question)
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Questão {{ $index + 1 }}</h5>
                        <p>{{ $question->enunciation }}</p>
                        <p> RESPOSTA ID: {{ $question->user_question_response->id }}</p>

                        @foreach (['A', 'B', 'C', 'D', 'E'] as $option)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" id="question-{{ $question->id }}-option-{{ $option }}">
                                <label class="form-check-label" for="question-{{ $question->id }}-option-{{ $option }}">
                                    {{ $option }}. {{ $question['option_' . strtolower($option)] }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar Respostas</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
