@extends('layouts.layout')

@section('content')
<main>

    @if($despesa['user_id'] == Auth::user()->id)
        <div id="containerBotoesCRUD">
            <a href="{{ route('despesas.edit', ['despesa' => $despesa['id']])}}">
                <div class="botaoDespesa">
                    Editar Despesa
                </div>
            </a>
            <form method="post" action="{{ route('despesas.destroy', ['despesa' => $despesa['id']])}}">
                @method('DELETE')
                @csrf
                <button type="submit" class="botaoDespesa" id="deletar">
                    Deletar despesa
                </button>
            </form>
        </div>
        <div>
            <h1>
                {{$despesa['descricao']}}
            </h1>
            <ul>
                <li>
                    <h2>Valor: R$ {{$despesa['valor']}}</h2>
                </li>
                <li>
                    <h2>Data: {{$despesa['data']}}</h2>
                </li>
            </ul>
        </div>
    @else
        <div class="formError">
            <h1>Esta despesa não é do seu usuário</h1>
        </div>
    @endif
</main>
@endsection