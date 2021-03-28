@extends('layout')

@section('cabecalho')
Séries

@endsection
@section('conteudo')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

<a href="series/create" class="btn btn-dark mb-4">Adicionar</a>
<ul class="list-group">
    <?php foreach($series as $serie): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->nome }}
        <form 
            action="/series/remove/{{ $serie->id }}"
            method="post"
            onsubmit="return confirm('Tem certeza que deseja excluir?')"
        >
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Excluir</button>
        </form>
    </li>
    <?php endforeach; ?>
</ul>

@endsection
