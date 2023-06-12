<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Homepage</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gradient-to-r from-blue-500 to-indigo-500 text-gray-900">

<nav class="flex justify-end py-4 pr-8">
    @auth
        <a href="{{ url('dashboard') }}" class="text-white font-medium hover:text-gray-200">Dashboard</a>
    @endauth

    @guest
        <a href="{{ url('login') }}" class="text-white font-medium hover:text-gray-200">Login</a>
    @endguest

</nav>

<div class="container mx-auto px-8 py-16">
    <header class="text-center">
        <h1 class="text-4xl font-bold text-white mb-6">Welcome to Our Survey!</h1>
        <p class="text-lg text-gray-200 mb-12">We value your opinion. Take part in our survey and help us improve.</p>
    </header>

    <main>
        <section class="text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Share Your Thoughts</h2>
            <p class="text-lg text-gray-200 mb-8">Take a few minutes to complete our survey and make a difference.</p>
            <a href="{{ url('/survey') }}" class="inline-block px-8 py-4 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 transition-colors duration-300 ease-in-out">Start Survey</a>
        </section>

        <section class="flex flex-wrap justify-center mt-16">
            <div class="max-w-sm rounded-lg overflow-hidden bg-white shadow-lg mx-4 my-8">
                <div class="p-8">
                    <i class="fas fa-check-circle text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Easy to Use</h3>
                    <p class="text-gray-700">Our user-friendly survey platform ensures a seamless experience.</p>
                </div>
            </div>

            <div class="max-w-sm rounded-lg overflow-hidden bg-white shadow-lg mx-4 my-8">
                <div class="p-8">
                    <i class="fas fa-shield-alt text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Secure and Confidential</h3>
                    <p class="text-gray-700">Your responses are protected and handled with utmost confidentiality.</p>
                </div>
            </div>

            <div class="max-w-sm rounded-lg overflow-hidden bg-white shadow-lg mx-4 my-8">
                <div class="p-8">
                    <i class="fas fa-chart-bar text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Help us Improve</h3>
                    <p class="text-gray-700">Your detailed insights and meaningful feedback will help us to change for the better.</p>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center text-gray-600 text-sm mt-8 py-4 bg-gray-200 fixed left-0 bottom-0 w-full">
        <p>&copy; 2023 VVW Schelde. All rights reserved.</p>
    </footer>
</div>

</body>

</html>
