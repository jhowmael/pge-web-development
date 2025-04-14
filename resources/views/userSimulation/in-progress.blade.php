@extends('layouts.app')

@section('content')

<div id="simulation" style="max-width: 800px; margin: auto; padding: 20px;">
    <center>
        <h1 id="simulation-name" style="font-size: 2.5em; color: #449d5b; font-weight: bold;"></h1>
        <h3 id="simulation-duration" style="font-size: 1.2em; color: #777;"></h3>
        <h3 id="timer" style="font-size: 1.5em; color: #d9534f; font-weight: bold;"></h3>
    </center>

    <div id="question-container" style="padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-top: 20px;">
        <!-- Questão será carregada aqui -->
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button id="prev-question" disabled style="background-color: #f8f9fa; border: 1px solid #ccc; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 1.1em;">
            Anterior
        </button>
        <button id="next-question" style="background-color: #449d5b; color: white; border: 1px solid #449d5b; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 1.1em; margin-left: 10px;">
            Próxima
        </button>
        <form action="{{ route('userSimulation.finish', $userSimulation->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit"
                    style="background-color: rgb(119, 0, 231); color: white; border: 1px solid #449d5b; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 1.1em; margin-left: 10px;">
                Finalizar
            </button>
        </form>
    </div>
</div>

<!-- Caixa de confirmação -->
<div id="confirmation-box" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 9999; text-align: center; padding-top: 100px;">
    <div style="background-color: #fff; padding: 20px; border-radius: 8px; width: 400px; margin: auto;">
        <h3 style="color: #444;">Você tem certeza?</h3>
        <p style="font-size: 1.1em; color: #555;">Deseja confirmar sua resposta?</p>
        <button id="confirm-yes" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 1.1em; margin-right: 10px;">Sim</button>
        <button id="confirm-no" style="background-color: #dc3545; color: white; border: none; padding: 10px 20px; border-radius: 4px; font-size: 1.1em;">Não</button>
    </div>
</div>

<!-- Mensagem de sucesso -->
<div id="success-message" style="display: none; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); background-color: rgba(108, 117, 125, 0.6); color: white; padding: 15px 30px; border-radius: 4px; font-size: 1.2em; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 9999;">
    Resposta confirmada com sucesso!
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentQuestion = 1;
    const simulationId = <?= $simulation->id ?>;
    const userSimulationId = <?= $userSimulation->id ?>;
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
        const imageTag = imagePath ? `<br><img src="/storage/${imagePath}" alt="Imagem alternativa ${letter.toUpperCase()}" style="max-height: 150px; margin-top: 5px;">` : '';
        return `
            <label style="display: block; margin-bottom: 15px;">
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
                    `<img src="/storage/${question.image}" alt="Imagem da Questão" class="img-thumbnail" style="max-width: 100%; height: auto; margin-top: 20px;">` :
                    '';

                $('#question-container').html(`
                    <center>
                        <h2 style="font-size: 1.8em; color: #444;">Questão ${question.number} - ${getThemeText(question.theme)}</h2>
                    </center>

                    <p style="font-size: 1.2em; color: #555;">${question.enunciation}</p>
                    <center>${imageHtml}</center>

                    <form id="response-form" style="margin-top: 20px; text-align: left;">
                        ${renderAlternative('a', question.alternative_a, question.alternative_a_image)}
                        ${renderAlternative('b', question.alternative_b, question.alternative_b_image)}
                        ${renderAlternative('c', question.alternative_c, question.alternative_c_image)}
                        ${renderAlternative('d', question.alternative_d, question.alternative_d_image)}
                        ${renderAlternative('e', question.alternative_e, question.alternative_e_image)}
                    </form>
                `);

                $('#prev-question').prop('disabled', question.number === 1);
            },
            error: function() {
                alert('Não foi possível carregar a questão.');
            }
        });
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
            $('#confirmation-box').show();
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
                    $('#confirmation-box').hide();
                    $('#success-message').fadeIn(500).delay(1500).fadeOut(500);
                },
                error: function() {
                    alert('Erro ao salvar a resposta!');
                }
            });
        });

        $('#confirm-no').click(function() {
            $('#confirmation-box').hide();
        });
    });
</script>

@endsection
