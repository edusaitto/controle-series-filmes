@extends('layout')

@section('cabecalho')
Adicionar Série

@endsection
@section('conteudo')
<form method="post">
    @csrf
    <div class="form-group">
        <label for="nome" class="">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <button class="btn btn-dark mt-3">Adicionar</button>
</form>

@endsection