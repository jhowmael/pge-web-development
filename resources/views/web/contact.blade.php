@extends('layouts.web')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card hover-effect">
            <div class="card-header text-center bg-light-yellow">
                <h4>Contato</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control custom-rectangular-box input-lg" id="name" name="name" placeholder="Nome" required>
                    </div>
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control custom-rectangular-box input-lg" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="tel" class="form-control custom-rectangular-box input-lg" id="phone" name="phone" placeholder="Celular" required>
                    </div>
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-pen"></i></span>
                        <textarea class="form-control custom-rectangular-box input-lg" id="message" name="message" rows="6" placeholder="Mensagem" required></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-yellow btn-hover">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
