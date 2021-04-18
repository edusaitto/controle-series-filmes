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

<a href="{{ route('form_create_serie')}}" class="btn btn-dark mb-4">Adicionar</a>
<ul class="list-group">
    <?php foreach($series as $serie): ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $serie->nome }}
        <span class="d-flex">
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mx-2">
                <i class="fa fa-external-link-alt"></i>
            </a>
            <form 
                action="/series/remove/{{ $serie->id }}"
                method="post"
                onsubmit="return confirm('Tem certeza que deseja excluir?')"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fa fa-trash-alt"></i>
                </button>
            </form>
        </span>
    </li>
    <?php endforeach; ?>
</ul>

@endsection
