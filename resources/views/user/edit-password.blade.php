@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.user-sidebar />
        </div>


        <div class="col-md-8">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Alterar Senha</h4>
                </div>
                <div class="card-body">
                    <center>
                        <p>Você pode a senha da sua conta</p>
                    </center>
                    <form action="{{ route('user.update-password') }}" method="POST" class="form">
                        @csrf

                        <div class="form-group">
                            <strong>Senha Atual:</strong>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                            @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <strong>Nova Senha:</strong>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                            @error('new_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <strong>Confirmar Nova Senha:</strong>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                            @error('new_password_confirmation')
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