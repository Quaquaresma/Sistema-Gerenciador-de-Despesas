@extends('layouts.layout')

@section('content')
<main>
    <div id="containerBotoesCRUD">
        <a href=" {{ route('despesas.create') }}">
            <div class="botaoDespesa">
                Cadastrar despesa
            </div>
        </a>
    </div>
    @if (count($despesas) > 0)
    <form action="{{ route('despesas.index') }}" method="get" id="formBusca" >
        <label for="coluna">Buscar por</label>
        <select name="coluna">
            <option style="display:none" disabled selected value></option>
            <option value="descricao">Descrição</option>
            <option value="valor">Valor</option>
            <option value="data">Data(YYYY-MM-DD)</option>
        </select>
        <input type="text" name="search" placeholder="Valor da busca"  id="busca" autofocus>
        <label for="atributo">Filtrar por</label>
        <select name="atributo">
            <option style="display:none" disabled selected value></option>
            <option value="descricao">Descrição</option>
            <option value="valor">Valor</option>
            <option value="data">Data(YYYY-MM-DD)</option>
        </select>
        <label for="ordem">Ordem</label>
        <select name="ordem">
            <option style="display:none" disabled selected value></option>
            <option value="asc">asc</option>
            <option value="desc">desc</option>
        </select>
        <button type="submit">Buscar</button>
    </form>
        @foreach ($despesas as $despesa)
            <div>
                <h3>
                    <a href="{{ route('despesas.show', ['despesa' => $despesa['id']])}}">{{$despesa['descricao']}}</a>
                </h3>
                <ul>
                    <li>
                        Valor: R$ {{$despesa['valor']}}
                    </li>
                    <li>
                        Data: {{$despesa['data']}}
                    </li>
                </ul>
            </div>
        @endforeach
    @else
        <h2>Não há despesas para mostrar</h2>
    @endif
</main>
@endsection