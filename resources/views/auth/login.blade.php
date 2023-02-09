@extends('layouts.layout')
@section('content')
<main class="formPage">
    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1>Login</h1>

        @include('layouts.partials.messages')

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

        <button type="submit">Login</button>
        
    </form>
</main>
@endsection