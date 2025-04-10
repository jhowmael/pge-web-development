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
                    <h4>Dados do Perfil</h4>
                </div>
                <div class="card-body">
                    <center>
                        <p>Você pode alterar as informações básicas da sua conta</p>
                    </center>

                    @if(session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                    @endif
                    @if(session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                    @endif

                    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf

                        <!-- Foto de Perfil -->
                        <div class="form-group">
                            <strong>Foto de Perfil:</strong>
                            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                            @if($user->profile_picture)
                            <br>
                            <p class="text-muted">Foto atual:</p>
                            <center>
                                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Foto de Perfil" class="img-thumbnail" style="width: 300px">
                            </center>
                            @endif
                            @error('profile_picture')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nome -->
                        <div class="form-group">
                            <strong>Nome:</strong>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- E-mail -->
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Telefone -->
                        <div class="form-group">
                            <strong>Telefone:</strong>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control" required>
                            @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Data de Nascimento -->
                        <div class="form-group">
                            <strong>Data de Nascimento:</strong>
                            <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="form-control" required>
                            @error('birthday')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <br>
                        <!-- Botão de Submissão -->
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

<!-- Máscara de telefone (usando jQuery Mask Plugin) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        // Aplica a máscara de telefone (formato (XX) XXXXX-XXXX)
        $('#phone').mask('(00) 00000-0000');
    });
</script>

<!-- (Alternativa usando Inputmask, caso queira usar esse método) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.42/inputmask.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var phoneInput = document.getElementById('phone');
        var im = new Inputmask('(99) 99999-9999'); // Máscara de telefone brasileiro
        im.mask(phoneInput);
    });
</script>
