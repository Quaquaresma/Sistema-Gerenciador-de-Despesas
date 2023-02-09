@extends('layouts.layout')

@section('content')
    @if($despesa['user_id'] == Auth::user()->id)
        <main class="formPage">
            <form method="post" action="{{ route('despesas.update', ['despesa' => $despesa->id]) }}">
            @csrf
            @method('PUT')
            <h1>Registrar</h1>

            <div>
                <label for="descricao">Descrição da despesa</label>
                <input type="text" name="descricao" value="{{ $despesa['descricao'] }}" placeholder="..." required="required" autofocus>
                @error('descricao')
                    <div class="formError">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="date">Data da despesa</label>
                <input type="date" name="data" value="{{ $despesa['data'] }}" required="required" autofocus>
                @error('data')
                    <div class="formError">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="valor">Valor da despesa (R$)</label>
                <input type="number" step="0.01" name="valor" min="0.01" value="{{ $despesa['valor'] }}" placeholder="0.00" required="required">
                @error('valor')
                    <div class="formError">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit">Atualizar</button>

            </form>
        </main>
    @else
        <div class="formError">
            <h1>Esta despesa não é do seu usuário</h1>
        </div>
    @endif
@endsection