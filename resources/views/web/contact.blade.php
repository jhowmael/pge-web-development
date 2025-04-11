@extends('layouts.web')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-10 col-md-12"> <!-- Mantendo largura aumentada -->
        <div class="card hover-effect w-100"> <!-- Garante que o card use toda a largura disponível -->
            <div class=" text-warning text-center">
                <br>
                <h4>Contato</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('contact.submit') }}" method="POST" class="w-100">
                    @csrf
                    <div class="mb-3">
                        
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control custom-rectangular-box input-lg" id="name" name="name" placeholder="Nome" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control custom-rectangular-box input-lg" id="email" name="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control custom-rectangular-box input-lg" id="phone" name="phone" placeholder="Celular" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-pen"></i></span>
                            <textarea class="form-control custom-rectangular-box input-lg" id="message" name="message" rows="6" placeholder="Mensagem" required></textarea>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-yellow btn-hover">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
