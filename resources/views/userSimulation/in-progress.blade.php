@extends('layouts.app')

@section('content')

<div id="simulation" class="container py-4">
    <div class="text-center mb-4">
        <h1 id="simulation-name" class="display-4 text-success fw-bold"></h1>
        <h3 id="simulation-duration" class="h5 text-secondary"></h3>
        <h3 id="timer" class="h4 text-danger fw-bold"></h3>
    </div>

    <div id="question-container" class="p-4 bg-light rounded shadow-sm mt-4">
        <!-- Questão será carregada aqui -->
    </div>

    <!-- Barra de Progresso -->
    <div class="progress mt-4">
        <div id="progress" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p id="progress-text" class="text-center mt-2">Questões respondidas: 0/0</p>

    <div class="text-center mt-4">
        <button id="prev-question" disabled class="btn btn-outline-secondary btn-lg">
            Anterior
        </button>
        <button id="next-question" class="btn btn-success btn-lg ms-2">
            Próxima
        </button>
        <form action="{{ route('userSimulation.finish', $userSimulation->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg ms-2">
                Finalizar
            </button>
        </form>
    </div>
</div>

<!-- Caixa de confirmação -->
<div id="confirmation-box" class="d-none position-fixed top-0 start-0 end-0 bottom-0 bg-dark bg-opacity-50 z-3 text-center pt-5 d-flex justify-content-center align-items-center">
    <div class="bg-white p-4 rounded w-100" style="max-width: 400px; margin: auto;">
        <h3 class="text-dark">Você tem certeza?</h3>
        <p class="fs-5 text-secondary">Deseja confirmar sua resposta?</p>
        <button id="confirm-yes" class="btn btn-success btn-lg me-2">Sim</button>
        <button id="confirm-no" class="btn btn-danger btn-lg">Não</button>
    </div>
</div>

<!-- Mensagem de sucesso -->
<div id="success-message" class="d-none position-fixed top-0 start-50 translate-middle-x bg-secondary bg-opacity-75 text-white px-4 py-3 rounded shadow fs-5 mt-3 z-3">
    Resposta confirmada com sucesso!
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentQuestion = 1;
    const simulationId = <?= $simulation->id ?>;
    const userSimulationId = <?= $userSimulation->id ?>;
    const totalQuestions = <?= $simulation->quantity_questions ?>;
    const totalDuration = <?= $simulation->total_duration ?>;
    let remainingTime = totalDuration * 60;

    function formatTime(seconds) {
        const hours = Math.floor(seconds / 3600);
        const minutes = Math.floor((seconds % 3600) / 60);
        const remainingSeconds = seconds % 60;
        return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
    }

    function updateTimer() {
        $('#timer').text(formatTime(remainingTime));

        // Alterando a cor e tamanho do timer quando o tempo está curto
        if (remainingTime <= 60) {
            $('#timer').addClass('urgent');
        } else {
            $('#timer').removeClass('urgent');
        }

        if (remainingTime > 0) {
            remainingTime--;
        } else {
            clearInterval(timerInterval);
            alert('O tempo acabou!');
        }
    }

    const timerInterval = setInterval(updateTimer, 1000);

    function getThemeText(theme) {
        const themes = {
            'languages_codes_technologies': 'Linguagens, Códigos e suas Tecnologias',
            'human_sciences_technologies': 'Ciências Humanas e suas Tecnologias',
            'natural_sciences_technologies': 'Ciências da Natureza e suas Tecnologias',
            'mathematics_technologies': 'Matemática e suas Tecnologias'
        };
        return themes[theme] || 'Tema não encontrado';
    }

    function renderAlternative(letter, text, imagePath) {
        const imageTag = imagePath ? `<br><img src="/storage/${imagePath}" alt="Imagem alternativa ${letter.toUpperCase()}" class="img-fluid mt-2" style="max-height: 150px;">` : '';
        return `
            <label class="d-block mb-3">
                <input type="radio" name="response" value="${letter}" ${text.response === letter ? 'checked' : ''}>
                ${text}
                ${imageTag}
            </label>
        `;
    }

    function loadQuestion(questionNumber) {
        $.ajax({
            url: `/userSimulations/${simulationId}/questions/${questionNumber}`,
            method: 'GET',
            success: function(data) {
                $('#simulation-name').text("<?= $simulation->name ?>");
                $('#simulation-duration').text(`Duração Mínima: <?= $simulation->minimum_minute ?> / Máxima: <?= $simulation->total_duration ?> minutos`);

                const question = data.question;
                const userResponse = question.user_question_response?.response || '';

                const imageHtml = question.image ? 
                    `<img src="/storage/${question.image}" alt="Imagem da Questão" class="img-thumbnail mt-3">` : '';

                $('#question-container').html(`
                    <div class="text-center">
                        <h2> Questão ${question.number} - ${getThemeText(question.theme)}</h2>
                    </div>
                    <p>${question.enunciation}</p>
                    <div class="text-center">${imageHtml}</div>

                    <form id="response-form" class="mt-4 text-start">
                        ${renderAlternative('a', question.alternative_a, question.alternative_a_image)}
                        ${renderAlternative('b', question.alternative_b, question.alternative_b_image)}
                        ${renderAlternative('c', question.alternative_c, question.alternative_c_image)}
                        ${renderAlternative('d', question.alternative_d, question.alternative_d_image)}
                        ${renderAlternative('e', question.alternative_e, question.alternative_e_image)}
                    </form>
                `);

                $('#prev-question').prop('disabled', question.number === 1);

                updateProgressBar();
            },
            error: function() {
                alert('Não foi possível carregar a questão.');
            }
        });
    }

    function updateProgressBar() {
        const progressPercentage = (currentQuestion / totalQuestions) * 100;
        $('#progress').css('width', `${progressPercentage}%`).attr('aria-valuenow', progressPercentage);

        // Alterando a cor da barra de progresso
        if (progressPercentage < 50) {
            $('#progress').removeClass('bg-success').addClass('bg-danger');
        } else if (progressPercentage < 80) {
            $('#progress').removeClass('bg-danger').addClass('bg-warning');
        } else {
            $('#progress').removeClass('bg-warning').addClass('bg-success');
        }

        $('#progress-text').text(`Questões respondidas: ${currentQuestion}/${totalQuestions}`);
    }

    $(document).ready(function() {
        loadQuestion(currentQuestion);

        $('#prev-question').click(function() {
            if (currentQuestion > 1) {
                currentQuestion--;
                loadQuestion(currentQuestion);
            }
        });

        $('#next-question').click(function() {
            currentQuestion++;
            loadQuestion(currentQuestion);
        });

        $(document).on('change', '#response-form input[name="response"]', function() {
            $('#confirmation-box').removeClass('d-none');
        });

        $('#confirm-yes').click(function() {
            const response = $('#response-form input[name="response"]:checked').val();
            if (!response) {
                alert('Por favor, selecione uma resposta!');
                return;
            }

            $.ajax({
                url: `/userSimulations/${userSimulationId}/questions/${currentQuestion}/response`,
                method: 'POST',
                data: {
                    _token: '<?= csrf_token() ?>',
                    response: response,
                },
                success: function() {
                    $('#confirmation-box').addClass('d-none');
                    $('#success-message').fadeIn(500).delay(1500).fadeOut(500);
                    updateProgressBar(); // Atualiza a barra de progresso após a resposta
                },
                error: function() {
                    alert('Erro ao salvar a resposta!');
                }
            });
        });

        $('#confirm-no').click(function() {
            $('#confirmation-box').addClass('d-none');
        });
    });
</script>

@endsection
