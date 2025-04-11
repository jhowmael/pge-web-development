@extends('layouts.web')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-10 col-md-12"> <!-- Mantendo largura aumentada -->
        <div class="card" style="height: 100%; min-height: 350px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5)"> <!-- Garante que o card use toda a largura disponível -->
            <br>
            <div class="text-center">
                <h3 class="fw-bold">Contato</h3>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('contact.submit') }}" method="POST" class="w-100">
                    @csrf
                    <div class="mb-3">

                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user transparent-icon"></i></span>
                            <input type="text" class="form-control custom-rectangular-box input-lg" id="name" name="name" placeholder="Nome" required>
                        </div>
                    </div>
                    <div class="mb-3">

                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope transparent-icon"></i></span>
                            <input type="email" class="form-control custom-rectangular-box input-lg" id="email" name="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="mb-3">

                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone transparent-icon"></i></span>
                            <input type="tel" class="form-control custom-rectangular-box input-lg" id="phone" name="phone" placeholder="Celular" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-pen transparent-icon"></i></span>
                            <textarea class="form-control custom-rectangular-box input-lg" id="message" name="message" rows="6" placeholder="Mensagem" required></textarea>
                        </div>
                    </div>
                    <div>
                    </div>
                </form>
                <button type="submit" class="btn-custom d-flex justify-content-center">ENVIAR</button>
            </div>
        </div>
    </div>
</div>
<br>
@endsection