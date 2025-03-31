<div class="card mb-4">
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
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('userSimulation.index') ? 'active' : '' }}"
                    href="{{ route('userSimulation.index') }}">
                    Histórico de simulado
                    @if(request()->routeIs('userSimulation.index'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>