@extends('layouts.app')

@section('content')

    <div class="main-content">
        <h1>Bem-vindo, {{explode(' ', auth()->user()->name)[0]}} 👋</h1>
        <p>Este é o conteúdo principal da página.</p>
    </div>

@endsection

