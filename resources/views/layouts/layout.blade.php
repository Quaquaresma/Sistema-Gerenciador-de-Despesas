<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <nav>
            <a href="{{ route('home.index') }}">Início</a>
            <a href="{{ route('home.about') }}">Sobre</a>
            @auth
                <a href="{{ route('despesas.index') }}">Despesas</a>
                <a href="{{ route('logout.perform') }}" class="authButton">Logout</a>
            @endauth
            @guest
                <a href="{{ route('login.perform') }}" class="authButton">Login</a>
                <a href="{{ route('register.perform') }}" class="authButton">Sign-up</a>
            @endguest
        </nav>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @yield('content')
        </div>
    </body>
</html>
