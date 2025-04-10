<div class="card mb-4" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
    <div class="card-header text-center">
        <h4><i class="fa-solid fa-sliders"></i> Aprendizado </h4>
    </div>
    <div class="card-body">
        <center>
            <p>Painel onde é possível cadastrar simulados e gerenciar usuários de forma prática e centralizada.</p>
        </center>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('learn') ? 'active' : '' }}"
                    href="{{ route('learn') }}">
                    Introdução
                    @if(request()->routeIs('learn'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('simulation.index') ? 'active' : '' }}"
                    href="{{ route('simulation.index') }}">
                    Praticar com simulados
                    @if(request()->routeIs('simulation.index'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('redaction.index') ? 'active' : '' }}"
                    href="{{ route('redaction.index') }}">
                    Histórico de redações
                    @if(request()->routeIs('redaction.index'))
                        <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
                <!-- Verifica se a rota redaction.view está ativa -->
                @if(request()->routeIs('redaction.view'))
                    <a class="nav-link d-inline-block"
                        style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                        Visualizar Redação <i class="fa-solid fa-chevron-right"></i>
                    </a>
                @endif
            </li>
            
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('userSimulation.index') ? 'active' : '' }}"
                    href="{{ route('userSimulation.index') }}">
                    Histórico de simulado
                    @if(request()->routeIs('userSimulation.index'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif

                    @if(request()->routeIs('userSimulation.view'))
                        <a class="nav-link d-inline-block"
                            style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                            Visualizar Simulado <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>