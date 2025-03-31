<div class="card mb-4">
    <div class="card-header text-center">
        <h4><i class="fa-solid fa-sliders"></i> Painel Administrativo </h4>
    </div>
    <div class="card-body">
        <p>Painel onde é possível cadastrar simulados e gerenciar usuários de forma prática e centralizada.</p>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('administrative.dashboard') ? 'active' : '' }}"
                    href="{{ route('administrative.dashboard') }}">
                    Introdução
                    @if(request()->routeIs('administrative.dashboard'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('administrative.dashboard-simulations') ? 'active' : '' }}"
                    href="{{ route('administrative.dashboard-simulations') }}">
                    Dashboard Simulados
                    @if(request()->routeIs('administrative.dashboard-simulations'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>

                @if(request()->routeIs('administrative.add-simulations'))
                <span> > </span>
                <a class="nav-link d-inline-block"
                    href="{{ route('administrative.add-simulations') }}"
                    style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                    Adicionar Novo Simulado
                </a>
                @endif
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('administrative.dashboard-users') ? 'active' : '' }}"
                    href="{{ route('administrative.dashboard-users') }}">
                    Dashboard Usuários
                    @if(request()->routeIs('administrative.dashboard-users'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div>