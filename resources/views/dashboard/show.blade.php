<!DOCTYPE html>
<html lang="en">

<head>
    <title>VVW Schelde Flushing</title>
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
            <h1 class="mb-4 text-3xl font-bold text-white md:text-6xl lg:text-5xl">Survey form: {{ $review->id }} </h1>
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
                        <a href="{{ url('/settings') }}"
                           class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <i class="fas fa-cog pr-0 md:pr-3"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-red-600 md:text-gray-200 block md:inline-block">Settings</span>
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

        <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="bg-gray-800 pt-3">
                <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                    <h1 class="font-bold pl-2">Questionnare form</h1>
                </div>
            </div>
<main>
    <div class="overflow-x-auto">
    <div class="my-4">
        <div class="my-4">
            <div class="bg-blue-900 px-4 py-2 rounded-md">
                <p class="font-bold text-xl text-white">Demographic data of users:</p>
            </div>
        <p class="text-lg">Nationality:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->Nationality }}</p>
        </div>
        <p class="text-lg">Age:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->AgeOfVisitor }}</p>
        </div>
        <p class="text-lg">Vessel type:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->TypeOfVessel }}</p>
        </div>
        <p class="text-lg">People on board:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->PeopleOnBoard }}</p>
        </div>
        </div>

        <div class="my-4">
            <div class="bg-blue-900 px-4 py-2 rounded-md">
                <p class="font-bold text-xl text-white">Multiple choice:</p>
            </div>
        <p class="text-lg">Season the ship visited:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->WhichSeason }}</p>
        </div>
        <p class="text-lg">Heard about the harbour:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->HearAboutHarbour }}</p>
        </div>
        <p class="text-lg">Ship was berthed at dock:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->WhichHarbour }}</p>
        </div>
        @php
            $answers = [
                1 => 'Yes',
                0 => 'No',
            ];
        @endphp
        <p class="text-lg">First visit:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $answers[$review->FirstVisit] }}</p>
        </div>
        <p class="text-lg">Did they complete the purpose of their stay:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $answers[$review->CompletePurpose] }}</p>
        </div>
        <p class="text-lg">Their experience at the marina:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->DescribeExperience }}</p>
        </div>
        <p class="text-lg">Website opinion:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->DescribeWebsite }}</p>
        </div>
        <p class="text-lg">Will they visit us again:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $answers[$review->ConsiderAgain] }}</p>
        </div>
        </div>

        <div class="my-4">
            <div class="bg-blue-900 px-4 py-2 rounded-md">
                <p class="font-bold text-xl text-white">Rating:</p>
            </div>
        <p class="text-lg">Overall cleanliness:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->OverallCleanliness }}</p>
        </div>
        <p class="text-lg">Staff friendly and helpfulness:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->StaffFriendlyAndHelpful }}</p>
        </div>
        <p class="text-lg">Harbour safety:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->SafetyAtTheHarbour }}</p>
        </div>
        <p class="text-lg">Our facilities:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->OurFacilities }}</p>
        </div>
        <p class="text-lg">Visitor experience:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->RateOverallExperience }}</p>
        </div>
        <p class="text-lg">Recommend to others:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->RecommendToOthers }}</p>
        </div>
        <p class="text-lg">Quality for money:</p>
        <div class="bg-white p-4 h-8 flex items-center">
            <p class="text-gray-600">{{ $review->QualityForMoney }}</p>
        </div>
        </div>

        <div class="overflow-x-auto">
            <div class="my-4">
                <div class="bg-blue-900 px-4 py-2 rounded-md">
                    <p class="font-bold text-xl text-white">Open Answers:</p>
                </div>
                <p class="text-lg">Anything you would like us to improve:</p>
                <div class="bg-white p-4">
                    <textarea class="text-gray-600 resize-y h-32 w-full" readonly>{{ $review->AnythingToImprove }}</textarea>
                </div>

                <p class="text-lg">Any additional amenities:</p>
                <div class="bg-white p-4">
                    <textarea class="text-gray-600 resize-y h-32 w-full" readonly>{{ $review->anyAdditionalAmenities }}</textarea>
                </div>

                <p class="text-lg">Something to change on the website:</p>
                <div class="bg-white p-4">
                    <textarea class="text-gray-600 resize-y h-32 w-full" readonly>{{ $review->SomethingToChangeWebsite }}</textarea>
                </div>

                <p class="text-lg">Open remarks:</p>
                <div class="bg-white p-4">
                    <textarea class="text-gray-600 resize-y h-32 w-full" readonly>{{ $review->AnythingLeft }}</textarea>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
