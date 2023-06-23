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
                            <a href="{{ url('/settings') }}"
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-cog pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-red-600 md:text-gray-200 block md:inline-block">Settings</span>
                            </a>
                        </li>
                        <li class="mr-3 flex-1">
                            <a href="{{ route('export.csv') }}"
                               class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-download pr-0 md:pr-3"></i><span
                                    class="pb-1 md:pb-0 text-xs md:text-base text-red-600 md:text-gray-200 block md:inline-block">Download CSV</span>
                            </a>
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
                        <h1 class="font-bold pl-2">Analytics</h1>
                    </div>
                </div>

                <div class="flex justify-center items-center my-4 text-left">
                    <form action="{{ route('dashboard.reviews') }}" method="GET">
                        <div class="flex flex-wrap justify-between mb-4">
                            <div class="flex items-center mr-2 mb-2">
                                <label for="start_date" class="mr-2">Start Date:</label>
                                <input type="date" name="start_date" id="start_date" class="border border-gray-300 rounded px-2 py-1">
                            </div>
                            <div class="flex items-center mr-2 mb-2">
                                <label for="end_date" class="mr-2">End Date:</label>
                                <input type="date" name="end_date" id="end_date" class="border border-gray-300 rounded px-2 py-1">
                            </div>
                            <div class="flex items-center mr-2 mb-2">
                                <label for="typeOfVessel" class="mr-2">Type of Vessel:</label>
                                <select name="typeOfVessel" id="typeOfVessel" class="border border-gray-300 rounded px-2 py-1">
                                    <option value="">All</option>
                                    <option value="Sailboat">Sailboat</option>
                                    <option value="Motorboat">Motorboat</option>
                                </select>
                            </div>
                            <div class="flex items-center mr-2 mb-2">
                                <label for="marina" class="mr-2">Marina:</label>
                                <select name="marina" id="marina" class="border border-gray-300 rounded px-2 py-1">
                                    <option value="">All</option>
                                    <option value="V.V.W Schelde">V.V.W Schelde</option>
                                    <option value="Stadshaven Scheldekwartier">Stadshaven Scheldekwartier</option>
                                    <!-- Add more marina options here -->
                                </select>
                            </div>
                            <div class="flex items-center mr-2 mb-2">
                                <label for="read" class="mr-2">Read:</label>
                                <select name="read" id="read" class="border border-gray-300 rounded px-2 py-1">
                                    <option value="">All</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Apply Filters
                        </button>
                    </form>



                </div>

                <div class="flex justify-center items-center my-4">
                    {{ $survey->links('pagination::tailwind') }}
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
                                <td class="px-4 py-2">{{ $review->RecommendToOthers  }}</td>
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
    </div>
</main>
</body>
<script>
    document.getElementById('filter-rating').addEventListener('change', function () {
        let selectedRating = this.value;

        let reviews = document.querySelectorAll('#main table tbody tr');
        reviews.forEach(function (review) {
            let rating = review.querySelector('td:nth-child(11)').textContent;

            if (selectedRating === '' || rating === selectedRating) {
                review.style.display = '';
            } else {
                review.style.display = 'none';
            }
        });
    });
</script>
</html>
