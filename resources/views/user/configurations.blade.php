@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.user-sidebar />
        </div>


        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Configurações de Perfil</h4>
                </div>
                <div class="card-body">
                    <center>
                        <p>Você pode alterar as inforamações básicas da sua conta</p>
                    </center>

                    @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                    @endif
                    @if(session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                    @endif

                    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="profile_picture" class="form-label">Foto de Perfil:</label>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                            @if($user->profile_picture)
                            <p class="text-muted">Foto atual:</p>
                            <center>
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto de Perfil" class="img-thumbnail" style="width: 300px">
                            </center>
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
                            <x-buttons.submit />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection