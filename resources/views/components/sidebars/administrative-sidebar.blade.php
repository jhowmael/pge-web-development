<div class="card mb-4" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
    <div class="card-header text-center">
        <h4><i class="fa-solid fa-sliders"></i> Administrativo </h4>
    </div>
    <div class="card-body">
        <center>
            <p>Painel onde é possível cadastrar simulados e gerenciar usuários de forma prática e centralizada.</p>
        </center>

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
                <a class="nav-link d-inline-block"
                    style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                    Adicionar Simulado <i class="fa-solid fa-chevron-right"></i>
                </a>
                @endif

                @if(request()->routeIs('administrative.view-simulations'))
                <a class="nav-link d-inline-block"
                    style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                    Visualizar Simulado <i class="fa-solid fa-chevron-right"></i>
                </a>
                @endif

                @if(request()->routeIs('administrative.edit-simulations'))
                <a class="nav-link d-inline-block"
                    style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                    Editar Simulado <i class="fa-solid fa-chevron-right"></i>
                </a>
                @endif

                @if(request()->routeIs('administrative.edit-questions'))
                <a class="nav-link d-inline-block"
                    style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                    Editar Questão <i class="fa-solid fa-chevron-right"></i>
                </a>
                @endif

                @if(request()->routeIs('administrative.view-questions'))
                <a class="nav-link d-inline-block"
                    style="color: #007561; font-weight: bold; font-size: 0.9em; margin-left: 10px;">
                    Visualizar Questão <i class="fa-solid fa-chevron-right"></i>
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