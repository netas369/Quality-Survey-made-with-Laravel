@extends('layouts.auth-master')

@section('content')
    <form method="post" class="flex items-center flex-col justify-center h-screen" action="{{ route('register.perform') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/schelde_logo.jpg') !!}" alt="" width="72" height="57">
        <h1 class="text-2xl font-semibold mb-4">Register</h1>
        <div class="mb-4 flex items-center flex-col">
            <input type="email" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            @if ($errors->has('email'))
                <span class="text-red-500">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="mb-4 flex flex-col items-center">
            <input type="text" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
            @if ($errors->has('username'))
                <span class="text-red-500">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="mb-4 flex flex-col items-center">
            <input type="password" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" value="{{ old('password') }}" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="text-red-500">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="mb-4 flex flex-col items-center">
            <input type="password" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required>
            @if ($errors->has('password_confirmation'))
                <span class="text-red-500">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
        <button class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">Register</button>
        @include('auth.partials.copy')
    </form>

@endsection
