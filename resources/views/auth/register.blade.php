@extends('layouts.layout')

@section('content')
<main class="formPage">
    <form method="post" action="{{ route('register.perform') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    <h1>Registrar</h1>

    <div>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
        @if ($errors->has('email'))
            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div>
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
        @if ($errors->has('username'))
            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
        @endif
    </div>

    <div>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
        @if ($errors->has('password'))
            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div>
        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
        @if ($errors->has('password_confirmation'))
            <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>

    <button type="submit">Register</button>

    </form>
</main>
@endsection