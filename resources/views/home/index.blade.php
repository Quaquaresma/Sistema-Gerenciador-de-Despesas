@extends('layouts.layout')

@section('content')
<main>
    <h1>Sistema gerenciador de despesas</h1>
    @auth
        <h2>Seja bem vindo(a), {{Auth::user()->username}}</h2>
        <p>Agora você pode gerenciar suas despesas.</p>
    @endauth
    @guest
        <h2>Realize o login ou faça seu cadastro para gerenciar suas despesas.</h2>
    @endguest
</main>
@endsection