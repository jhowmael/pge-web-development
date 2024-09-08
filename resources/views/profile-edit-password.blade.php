@extends('layouts.connect')

@section('content')

    <div class="main-content">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h4><i class="fa-regular fa-user"></i> Minha conta</h4>
                    </div>                    
                    <div class="card-body">
                        <p>Altere as configurações e confira suas notificações</p>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile-configurations') }}"> <i class="fa-solid fa-house"></i> Configurações de perfil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile-edit-password') }}"> <i class="fa-solid fa-house"></i> Alterar senha</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <h4>Escolha uma nova senha</h4>

                <form action="{{ route('profile.update-password') }}" method="POST" class="form">
                    @csrf

                    <div class="form-group">
                        <label for="current_password" class="form-label">Senha Atual:</label>
                        <input type="password" id="current_password" name="current_password" class="form-control" required>
                        @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password" class="form-label">Nova Senha:</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" required>
                        @error('new_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation" class="form-label">Confirmar Nova Senha:</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                        @error('new_password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-purple">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
