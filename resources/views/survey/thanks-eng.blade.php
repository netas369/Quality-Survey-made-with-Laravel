<!DOCTYPE html>
<html lang="en">

<head>
    <title>thanks-eng</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <link rel="stylesheet" type="text/css" href="/css/stylingsurveys.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/surveystars.css">
    <link rel="stylesheet" href="/css/WelcomePage.css">
</head>

<body class="bg-gray-100">

<header class="bg-blue-500 py-8">
    <div class="container mx-auto">
        <h1 class="text-white text-4xl font-bold text-center">VVW Schelde Flushing</h1>
        <nav class="mt-6">
            <ul class="flex justify-center space-x-6">
                <li><a class="text-white hover:text-gray-200" href="{{ url('/') }}">Home</a></li>
                <li><a class="text-white hover:text-gray-200" href="{{ url('/survey') }}">Survey</a></li>
                @guest
                    <li><a class="text-white hover:text-gray-200" href="{{ url('/login') }}">Dashboard</a></li>
                @endguest
                @auth
                    <li><a class="text-white hover:text-gray-200" href="{{ url('/dashboard') }}">Dashboard</a></li>
                @endauth
            </ul>
        </nav>
    </div>

</header>
<div class="container mx-auto mt-8 px-4">
    <h1 class="text-3xl font-bold">{{ trans('messages.Thanks') }}</h1>
    <p class="text-gray-800 mt-4">{{ trans('messages.Thanksmessage') }}</p>

    <div class="flex items-center justify-center mt-8">
        <a href="{{ url('/') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-full transition-colors duration-300 ease-in-out">Back to Home</a>
    </div>

    <div class="flex items-center justify-center mt-8">
        <img src="/images/thumb-up.gif" alt="Thumb Up">
    </div>
</div>
</body>
</html>

