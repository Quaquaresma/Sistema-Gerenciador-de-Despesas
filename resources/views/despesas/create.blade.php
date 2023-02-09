@extends('layouts.layout')

@section('content')
<main class="formPage">
    <form method="post" action="{{ route('despesas.store') }}">
    @csrf

    <h1>Registrar</h1>

    <div>
        <label for="descricao">Descrição da despesa</label>
        <input type="text" name="descricao" value="{{ old('descricao') }}" placeholder="..." required="required" autofocus>
        @error('descricao')
            <div class="formError">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label for="date">Data da despesa</label>
        <input type="date" name="data" value="2023-02-08" required="required" autofocus>
        @error('data')
            <div class="formError">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div>
        <label for="valor">Valor da despesa (R$)</label>
        <input type="number" step="0.01" name="valor" min="0.01" value="{{ old('valor') }}" placeholder="0.00" required="required">
        @error('valor')
            <div class="formError">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit">Cadastrar</button>

    </form>
</main>
@endsection