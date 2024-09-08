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
                                <a class="nav-link" href="{{ route('profile-configurations') }}">Configurações de perfil <i class="fa-solid fa-chevron-right"></i></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile-edit-password') }}">Alterar senha <i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <h4>Configurações de perfil</h4>
                <p>Você pode alterar as inforamações básicas da sua conta</p>


                @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif
                @if(session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="form">
                    @csrf

                    <div class="form-group">
                        <label for="profile_picture" class="form-label">Foto de Perfil:</label>
                        <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                        @if($user->profile_picture)
                            <p class="text-muted">Foto atual:</p>
                            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto de Perfil" class="img-thumbnail">
                        @endif
                        @error('profile_picture')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="birthday" class="form-label">Data de Nascimento:</label>
                        <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="form-control" required>
                        @error('birthday')
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

