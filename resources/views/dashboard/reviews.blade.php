<!DOCTYPE html>
<html lang="en">

<head>
    <title>VVW Schelde Flushing</title>
    <style>
        .progress-bar {
            width: 1043px;
            height: 20px;
            background-color: #f2f2f2;
            border-radius: 4px;
            margin-bottom: 10px;
            text-align: center;
        }

        .progress-bar span{
            position: absolute;
            text-align: center;
        }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4caf50;
            border-radius: 4px;
            transition: width 0.3s ease-in-out;
            text-align: center;
            color: white;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/stylingsurvey.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VVW Schelde Dashboard</title>
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
            <h1 class="mb-4 text-3xl font-bold text-white md:text-6xl lg:text-5xl">Reviews Dashboard</h1>
        </div>
    </nav>
</header>

<main>


    <div class="flex flex-col md:flex-row">
        <nav aria-label="alternative nav">


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
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                                <i class="fas fa-tasks pr-0 md:pr-3 text-blue-600"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">All reviews</span>
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
        </nav>

        <section>

            <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-800 pt-3">
                    <div
                        class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                        <h1 class="font-bold pl-2">Analytics</h1>
                    </div>
                </div>

                <div class="flex justify-center items-center my-4">
                    {{ $survey->links('pagination::tailwind') }}
                </div>

                <div class="progress-bar">
                    <span> {{ round($averageSatisfaction, 2) }}  </span>
                    <div class="progress" style="width: {{ $averageSatisfaction * 20 }}%"> </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Review ID</th>
                            <th class="px-4 py-2">People On Board</th>
                            <th class="px-4 py-2">Type of Vessel</th>
                            <th class="px-4 py-2">First Visit</th>
                            <th class="px-4 py-2">Hear About Harbour</th>
                            <th class="px-4 py-2">Overall Cleanliness</th>
                            <th class="px-4 py-2">Staff Friendly and Helpful</th>
                            <th class="px-4 py-2">Safety at the Harbour</th>
                            <th class="px-4 py-2">How Would You Recommend to Others</th>
                            <th class="px-4 py-2">Quality for Money</th>
                            <th class="px-4 py-2">Rating</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($survey as $review)
                            <tr>
                                <td class="px-4 py-2">{{ $review->id }}</td>
                                <td class="px-4 py-2">{{ $review->PeopleOnBoard }}</td>
                                <td class="px-4 py-2">{{ $review->TypeOfVessel }}</td>
                                <td class="px-4 py-2">{{ $review->FirstVisit }}</td>
                                <td class="px-4 py-2">{{ $review->HearAboutHarbour }}</td>
                                <td class="px-4 py-2">{{ $review->OverallCleanliness }}</td>
                                <td class="px-4 py-2">{{ $review->StaffFriendlyAndHelpful }}</td>
                                <td class="px-4 py-2">{{ $review->SafetyAtTheHarbour }}</td>
                                <td class="px-4 py-2">{{ $review->RecommendToOthers }}</td>
                                <td class="px-4 py-2">{{ $review->QualityForMoney }}</td>
                                <td class="px-4 py-2">{{ $review->rating() }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('dashboard.show', $review->id) }}"
                                       class="text-blue-600 hover:text-blue-800">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center items-center my-4">
                    {{ $survey->links('pagination::tailwind') }}
                </div>
            </div>
        </section>
    </div>
</main>
</body>
</html>
