@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header text-center">
                    <h4>Início</h4>
                </div>
                <div class="card-body">
                    <center>
                        <h1>Bem-vindo, {{ explode(' ', auth()->user()->name)[0] }} 👋</h1>
                    </center>

                    <!-- Texto explicativo -->
                    <div class="my-4">
                        <h5>Sobre seu desempenho:</h5>
                        <p>
                            As suas últimas pontuações nas 10 últimas matérias estão representadas no gráfico abaixo.
                            Ele mostra sua evolução ao longo do tempo e te ajuda a visualizar em quais matérias você está se saindo melhor.
                            Lembre-se, a prática constante é fundamental para alcançar o seu objetivo no vestibular!
                        </p>
                    </div>

                    <h5>Gráfico de Barras (Pontuação por Matéria)</h5>
                    <p>
                        "As suas últimas pontuações nas 10 últimas matérias estão representadas no gráfico abaixo.
                        Ele mostra sua evolução ao longo do tempo e te ajuda a visualizar em quais matérias você está se saindo melhor.
                        Lembre-se, a prática constante é fundamental para alcançar o seu objetivo no vestibular!"
                    </p>

                    <!-- Gráfico de barras -->
                    <div class="my-4 text-center">
                        <div style="max-width: 1000px; max-height: 600px; margin: auto;">
                            <canvas id="scoreChart"></canvas>
                        </div>
                    </div>

                    <h5>Gráfico Radar (Desempenho em Redação)</h5>
                    <p>
                        "O gráfico abaixo representa sua performance nos diferentes critérios avaliados na redação.
                        Ele permite identificar seus pontos fortes e quais aspectos ainda podem ser aprimorados,
                        como clareza na argumentação, estrutura do texto e coesão.
                        Praticar redações regularmente e revisar seus erros ajudará você a melhorar sua nota!"
                    </p>

                    <!-- Gráfico Radar de Redação -->
                    <div class="my-4 text-center">
                        <div style="max-width: 1000px; max-height: 600px; margin: auto;">
                            <canvas id="radarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dados fictícios para o gráfico de barras
    var labels = ['Linguagens', 'Ciências Humanas', 'Ciências da Natureza', 'Matemática'];
    var scores = [80, 75, 90, 85];

    var ctx = document.getElementById('scoreChart').getContext('2d');
    var scoreChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pontuação por Matéria',
                data: scores,
                backgroundColor: 'rgba(0, 117, 97, 0.5)',
                borderColor: 'rgba(0, 117, 97, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Dados fictícios para o gráfico Radar de Redação
    var radarLabels = ['Clareza', 'Argumentação', 'Coesão', 'Estrutura', 'Ortografia'];
    var radarScores = [80, 70, 90, 85, 75];

    var radarCtx = document.getElementById('radarChart').getContext('2d');
    var radarChart = new Chart(radarCtx, {
        type: 'radar',
        data: {
            labels: radarLabels,
            datasets: [{
                label: 'Desempenho em Redação',
                data: radarScores,
                backgroundColor: 'rgba(0, 117, 97, 0.3)',
                borderColor: 'rgba(0, 117, 97, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>

@endsection