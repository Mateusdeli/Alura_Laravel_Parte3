@extends('layout')

@section('cabecalho')
    Entrar
@endsection

@section('conteudo')
@include('errors', ['errors' => $errors])
    <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
       <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="{{ route('registrar.create') }}" class="btn btn-secondary mt-3">
            Registrar-se
        </a>
    </form>
@endsection