<!DOCTYPE html>
<html lang="en">

<head>
    <title>VVW Schelde Flushing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
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
                    <li><a class="text-white hover:text-gray-200" href="{{ url('/login') }}">Login</a></li>
                @endguest
                @auth
                    <li><a class="text-white hover:text-gray-200" href="{{ url('/dashboard') }}">Dashboard</a></li>
                @endauth
            </ul>
        </nav>
    </div>

</header>

<main class="container mx-auto py-8">
    <section class="bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-4">Survey</h2>
        <p class="text-gray-700 mb-4">We would very much appreciate if you would complete the survey below.</p>
        <p class="text-gray-700 mb-4">By means of your comments – your expectations and recommendations – we can
            try to improve our service.</p>
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-2">Survey Language Options</h2>
            <p class="text-gray-700 mb-4">Choose your survey language:</p>
            <ul class="grid grid-cols-2 gap-4">
                <li>
                    <a href="{{ url(request()->path() . '/submition/en') }}"
                       class="bg-blue-500 text-white py-3 px-4 rounded-lg block hover:bg-blue-600">English</a>
                </li>
                <li>
                    <a href="{{ url(request()->path() . '/submition/nl') }}"
                       class="bg-blue-500 text-white py-3 px-4 rounded-lg block hover:bg-blue-600">Dutch
                        (Nederlands)</a>
                </li>
                <li>
                    <a href="{{ url(request()->path() . '/submition/de') }}"
                       class="bg-blue-500 text-white py-3 px-4 rounded-lg block hover:bg-blue-600">German
                        (Deutsch)</a>
                </li>
                <li>
                    <a href="{{ url(request()->path() . '/submition/fr') }}"
                       class="bg-blue-500 text-white py-3 px-4 rounded-lg block hover:bg-blue-600">French
                        (Français)</a>
                </li>
            </ul>
        </div>
    </section>
</main>

</body>

</html>
