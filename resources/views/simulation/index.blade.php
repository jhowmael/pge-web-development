@extends('layouts.app')

@section('content')

<div class="main-content">
    <div class="row">
        <div class="col-md-3">
            <x-sidebars.learn-sidebar />
        </div>

        <div class="col-md-9">
            <div class="card mb-12" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); border-radius: 12px;">
                <div class="card-header text-center">
                    <h4>Filtrar Simulados</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('simulation.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="type" class="form-label"><strong>Tipo / Modelo:</strong></label>
                                <select class="form-select" class="form-control" name="type" value="{{ request('type') }}">
                                    <option></option>
                                    @foreach (config(key: 'simulations.types') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="book" class="form-label"><strong>Livro</strong></label>
                                <select class="form-select" class="form-control" name="book" value="{{ request('book') }}">
                                    <option></option>
                                    @foreach (config(key: 'simulations.books') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="lengague" class="form-label"><strong>Linguagem</strong></label>
                                <select class="form-select" class="form-control" name="lengague" value="{{ request('lengague') }}">
                                    <option></option>
                                    @foreach (config(key: 'simulations.lengagues') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><strong>Ano:</strong></label>
                                <input type="number" class="form-control" name="year" value="{{ request('year') }}">
                            </div>
                        </div>

                        <br>
                        <div class="text-center">
                            <x-buttons.submit text="Filtrar" />
                        </div>
                    </form>

                    <h5 class="mt-4">Resultados da Busca:</h5>
                    <div class="row">
                        @foreach($simulations as $simulation)
                        <div class="col-md-4 mb-4">
                            <div class="card" style="border: 2px solid #000; border-radius: 5px; transition: transform 0.3s ease, box-shadow 0.3s ease; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);"
                                onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 10px 20px rgba(0, 0, 0, 0.3)';"
                                onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 10px rgba(0, 0, 0, 0.2)';">

                                <!-- Card Header (com fundo verde claro) -->
                                <div class="card-header text-center"
                                    style="background-image: linear-gradient(to right, #ffffff, {{ $simulation->book }}); 
                                        border-bottom: 2px solid #000; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                                    <h5 class="card-title" style="font-size: 1.2rem; font-weight: bold;">{{ $simulation->name }}</h5>
                                </div>

                                <!-- Corpo do Card (com fundo branco) -->
                                <div class="card-body" style="background-color: #fff;">
                                    <p class="card-text text-center"><strong>Ano:</strong> {{ $simulation->year }}</p>
                                    <p class="card-text text-center"><strong>Duração Total:</strong> {{ $simulation->total_duration }}</p>
                                    <p class="card-text text-center"><strong>Questões:</strong> {{ $simulation->quantity_questions }}</p>
                                    <p class="card-text text-center"><strong>Lingaguem:</strong> {{ __('translate.' . $simulation->lengague) }} </p>
                                    <p class="card-text text-center"><strong>Livro:</strong> {{ __('translate.' . $simulation->book) }}</p>
                                    <!-- Botão Centralizado -->
                                    <div class="w-100 d-flex justify-content-center">
                                        <x-buttons.start route="simulation.start" :id="$simulation->id" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <x-buttons.pagination :entities="$simulations" />
                </div>
            </div>
        </div>
        <br>
    </div>
</div>

@endsection