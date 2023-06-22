@extends('layouts.auth-master')

@section('content')
    <form method="post" class="flex flex-col items-center justify-center h-screen" action="{{ route('password.request') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/schelde_logo.jpg') !!}" alt="" width="72" height="57">
        <h1 class="text-2xl font-semibold mb-4">Reset password</h1>
        @include('layouts.partials.messages')
        <div class="mb-4 flex flex-col items-center">
            <input type="text" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @if ($errors->has('email'))
                <span class="text-red-500">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <button class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">Submit</button>
    </form>
@endsection
