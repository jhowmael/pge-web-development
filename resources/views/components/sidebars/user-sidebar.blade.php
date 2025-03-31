<div class="card mb-4" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
    <div class="card-header text-center">
        <h4><i class="fa-regular fa-user"></i> Minha conta</h4>
    </div>
    <div class="card-body">
        <center>
            <p>Altere as configurações e confira suas notificações</p>
        </center>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.configurations') ? 'active' : '' }}"
                    href="{{ route('user.configurations') }}">
                    Configurações de Perfil
                    @if(request()->routeIs('user.configurations'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user.edit-password') ? 'active' : '' }}"
                    href="{{ route('user.edit-password') }}">
                    Alterar Senha
                    @if(request()->routeIs('user.edit-password'))
                    <i class="fa-solid fa-chevron-right"></i>
                    @endif
                </a>
            </li>

        </ul>
    </div>
</div>