@extends('layout')
@section('cabecalho', 'Enviar Email')

@section('conteudo')
    <form action="{{ route('email.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="to">To</label>
            <input type="email" name="to" class="form-control" id="to">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="mensagem" id="mensagem" cols="30" rows="10" placeholder="Escreva aqui a sua mensagem.."></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
@endsection