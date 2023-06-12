<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VVW Schelde</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
            integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

<header>
    <!-- Nav -->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start">
                <a href="#" aria-label="Home">
                    <span class="text-4xl text-white"><i class="em em-grinning"></i></span>
                </a>
            </div>
            <h1 class="mb-4 text-3xl font-bold text-white md:text-6xl lg:text-5xl">Settings</h1>
        </div>
    </nav>
</header>


<main>

    <div class="flex flex-col md:flex-row">
        <nav aria-label="alternative nav">
            <div
                class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">

                <div
                    class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                    <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                        <li class="mr-3 flex-1">
                            <a href="{{ url('/dashboard') }}"
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-chart-area pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Analytics</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ url('/reviews') }}"
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-tasks pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">All reviews</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ url('/settings') }}"
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                                <i class="fas fa-cog pr-0 md:pr-3 text-blue-600"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">Settings</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ url('/logout') }}"
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-sign-out-alt pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-red-600 md:text-red-400 block md:inline-block">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <form class="mt-8">
            <input checked type="radio" name="radio" id="1" onchange="(()=>{document.querySelector('.form-register').classList.toggle('hidden'); document.querySelector('.form-password').classList.toggle('hidden')})()">
            <input type="radio" name="radio" id="2" onchange="(()=>{document.querySelector('.form-password').classList.toggle('hidden'); document.querySelector('.form-register').classList.toggle('hidden')})()">
        </form>
       <section>
           <form method="post" class="form-password flex flex-col items-center mt-8" action="{{ route('settings') }}">
               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               <h1 class="text-2xl font-semibold mb-4 text-white">Change password</h1>
               @include('layouts.partials.messages')
               <div class="mb-4 flex flex-col items-center">
                   <input type="password" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="password" value="{{ old('password') }}" placeholder="New Password" required>
                   @if ($errors->has('password'))
                       <span class="text-red-500">{{ $errors->first('password') }}</span>
                   @endif
               </div>
               <div class="mb-4 flex flex-col items-center">
                   <input type="password" class="w-64 px-4 py-2 rounded-lg border focus:outline-none focus:ring-2 focus:ring-blue-500" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm New Password" required>
                   @if ($errors->has('password_confirmation'))
                       <span class="text-red-500">{{ $errors->first('password_confirmation') }}</span>
                   @endif
               </div>
               <button class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">Confirm</button>
           </form>
       </section>

        <section>
            <form method="post" class="hidden form-register flex items-center flex-col justify-center mt-8" action="{{ route('register.perform') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h1 class="text-2xl font-semibold mb-4 text-white">Register</h1>
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
            </form>
        </section>
    </div>
</main>
</body>

</html>
