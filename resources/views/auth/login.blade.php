@extends('layouts.auth-master')

@section('content')
    <form method="post" style="margin-top: 50vh; transform: translateY(-50%)" action="{{ route('login.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/schelde_logo.jpg') !!}" alt="" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Login</h1>

        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3" style="display: flex; justify-content: center; align-items: center; flex-direction: column">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus style="width: min(20%, 30%)">
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3" style="display: flex; justify-content: center; align-items: center; flex-direction: column">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required style="width: min(20%, 30%)">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class=" btn btn-lg btn-primary" type="submit">Login</button>
    </form>
@endsection
