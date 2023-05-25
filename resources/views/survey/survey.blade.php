<!DOCTYPE html>
<html>
<head>
    <title>Survey</title>

    <link rel="stylesheet" type="text/css" href="/css/stylingsurveys.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/surveystars.css">
    <link rel="stylesheet" href="/css/WelcomePage.css">
    <script src="/js/surveyscript.js"></script>

    <style>
        .hidden {
            display: none;
        }
         .progress-bar {
             width: 100%;
             height: 20px;
             background-color: #f0f0f0;
             border-radius: 5px;
             margin-bottom: 10px;
         }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4caf50;
            border-radius: 5px;
            transition: width 0.3s;
        }
    </style>

</head>

<header>
    <h1>VVW Schelde Flushing</h1>
    <nav class="topnav">
        <ul>
            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            @guest
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Dashboard</a></li>
            @endguest
            @auth
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
            @endauth
        </ul>
    </nav>
</header>
<body>

<form method="POST" action="/survey/submition">
    @csrf

    <div class="progress-bar">
        <div class="progress" id="progress"></div>
    </div>

    <div id="page1">
        <label for="PeopleOnBoard">{{ trans('messages.question1') }}</label>
        <select id="PeopleOnBoard" name="PeopleOnBoard" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select><br><br>

        <label for="TypeOfVessel">{{ trans('messages.question2') }}</label>
        <input type="text" id="TypeOfVessel" name="TypeOfVessel" required><br><br>

        <label for="FirstVisit">{{ trans('messages.question3') }}</label>
        <select id="FirstVisit" name="FirstVisit" required>
            <option value="1">{{ trans('messages.yes') }}</option>
            <option value="0">{{ trans('messages.no') }}</option>
        </select><br><br>
    </div>

    <div id="page2" class="hidden">
        <label for="WhichHarbour">{{ trans('messages.question4') }}</label>
        <select id="WhichHarbour" name="WhichHarbour" required>
            <option value="V.V.W Schelde">V.V.W Schelde</option>
            <option value="Stadshaven Scheldekwartier">Stadshaven Scheldekwartier</option>
        </select><br><br>

        <label for="HearAboutHarbour">{{ trans('messages.question5') }}</label>
        <select id="HearAboutHarbour" name="HearAboutHarbour" required>

            <option value="internet">internet</option>
            <option value="almanac">almanac</option>
            <option value="recommended by others">recommended by others</option>
            <option value="different">different</option>
        </select><br><br>


        <label for="OverallCleanliness">{{ trans('messages.question6') }}</label>
        <div class="rating">
            <input type="radio" id="ocStar5" name="OverallCleanliness" value="5" required/><label for="ocStar5" title="5 stars"></label>
            <input type="radio" id="ocStar4" name="OverallCleanliness" value="4" /><label for="ocStar4" title="4 stars"></label>
            <input type="radio" id="ocStar3" name="OverallCleanliness" value="3" /><label for="ocStar3" title="3 stars"></label>
            <input type="radio" id="ocStar2" name="OverallCleanliness" value="2" /><label for="ocStar2" title="2 stars"></label>
            <input type="radio" id="ocStar1" name="OverallCleanliness" value="1" /><label for="ocStar1" title="1 star"></label>
        </div>
    </div>

    <div id="page3" class="hidden">
        <label for="StaffFriendlyAndHelpful">{{ trans('messages.question7') }}</label>
        <div class="rating">
            <input type="radio" id="staffStar5" name="StaffFriendlyAndHelpful" value="5" required/><label for="staffStar5" title="5 stars"></label>
            <input type="radio" id="staffStar4" name="StaffFriendlyAndHelpful" value="4" /><label for="staffStar4" title="4 stars"></label>
            <input type="radio" id="staffStar3" name="StaffFriendlyAndHelpful" value="3" /><label for="staffStar3" title="3 stars"></label>
            <input type="radio" id="staffStar2" name="StaffFriendlyAndHelpful" value="2" /><label for="staffStar2" title="2 stars"></label>
            <input type="radio" id="staffStar1" name="StaffFriendlyAndHelpful" value="1" /><label for="staffStar1" title="1 star"></label>
        </div>

        <label for="SafetyAtTheHarbour">{{ trans('messages.question8') }}</label>
        <div class="rating">
            <input type="radio" id="star5-safety" name="SafetyAtTheHarbour" value="5" required/><label for="star5-safety" title="5 stars"></label>
            <input type="radio" id="star4-safety" name="SafetyAtTheHarbour" value="4" /><label for="star4-safety" title="4 stars"></label>
            <input type="radio" id="star3-safety" name="SafetyAtTheHarbour" value="3" /><label for="star3-safety" title="3 stars"></label>
            <input type="radio" id="star2-safety" name="SafetyAtTheHarbour" value="2" /><label for="star2-safety" title="2 stars"></label>
            <input type="radio" id="star1-safety" name="SafetyAtTheHarbour" value="1" /><label for="star1-safety" title="1 star"></label>
        </div>

        <label for="HowWouldYouRecommendToOthers">{{ trans('messages.question9') }}</label>
        <div class="rating">
            <input type="radio" id="star5-recommend" name="HowWouldYouRecommendToOthers" value="5" required/><label for="star5-recommend" title="5 stars"></label>
            <input type="radio" id="star4-recommend" name="HowWouldYouRecommendToOthers" value="4" /><label for="star4-recommend" title="4 stars"></label>
            <input type="radio" id="star3-recommend" name="HowWouldYouRecommendToOthers" value="3" /><label for="star3-recommend" title="3 stars"></label>
            <input type="radio" id="star2-recommend" name="HowWouldYouRecommendToOthers" value="2" /><label for="star2-recommend" title="2 stars"></label>
            <input type="radio" id="star1-recommend" name="HowWouldYouRecommendToOthers" value="1" /><label for="star1-recommend" title="1 star"></label>
        </div>
    </div>

    <div id="page4" class="hidden">
        <label for="QualityForMoney">{{ trans('messages.question9') }}</label>
        <div class="rating">
            <input type="radio" id="star5-money" name="QualityForMoney" value="5" required/><label for="star5-money" title="5 stars"></label>
            <input type="radio" id="star4-money" name="QualityForMoney" value="4" /><label for="star4-money" title="4 stars"></label>
            <input type="radio" id="star3-money" name="QualityForMoney" value="3" /><label for="star3-money" title="3 stars"></label>
            <input type="radio" id="star2-money" name="QualityForMoney" value="2" /><label for="star2-money" title="2 stars"></label>
            <input type="radio" id="star1-money" name="QualityForMoney" value="1" /><label for="star1-money" title="1 star"></label>
        </div>

        <label for="anyAdditionalAmenities">{{ trans('messages.question10') }}</label>
        <input type="text" id="anyAdditionalAmenities" name="AnyAdditionalAmenitiesYouWouldLikeToSee" required>

        <label for="DidYouHadAnyIssuesWithTheDocking">{{ trans('messages.question11') }}</label>
        <select name="DidYouHadAnyIssuesWithTheDocking" id="DidYouHadAnyIssuesWithTheDocking" required>
            <option value="1">{{ trans('messages.yes') }}</option>
            <option value="0">{{ trans('messages.no') }}</option>
        </select>

        <label for="WouldYouConsiderReturningToHarbour">{{ trans('messages.question12') }}</label>
        <select name="WouldYouConsiderReturningToHarbour" id="WouldYouConsiderReturningToHarbour" required>
            <option value="1">{{ trans('messages.yes') }}</option>
            <option value="0">{{ trans('messages.no') }}</option>
        </select>
    </div>
    <div>
        <button type="button" id="previousBtn" class="hidden" onclick="showPreviousPage()">Previous</button>
        <button type="button" id="nextBtn" onclick="showNextPage()">Next</button>
    </div>

    <br><br> <input type="submit" value="Submit">
</form>

</body>
<script>
    const totalPages = 4;
    let currentPage = 1;

    function showNextPage() {
        if (currentPage < totalPages) {
            document.getElementById(`page${currentPage}`).classList.add('hidden');
            document.getElementById(`page${currentPage + 1}`).classList.remove('hidden');
            currentPage++;
        }

        updatePaginationButtons();
        updateProgress();
    }

    function showPreviousPage() {
        if (currentPage > 1) {
            document.getElementById(`page${currentPage}`).classList.add('hidden');
            document.getElementById(`page${currentPage - 1}`).classList.remove('hidden');
            currentPage--;
        }

        updatePaginationButtons();
        updateProgress();
    }

    function updatePaginationButtons() {
        const previousBtn = document.getElementById('previousBtn');
        const nextBtn = document.getElementById('nextBtn');

        previousBtn.classList.toggle('hidden', currentPage === 1);
        nextBtn.classList.toggle('hidden', currentPage === totalPages);
    }

    function updateProgress() {
        const progress = (currentPage / totalPages) * 100;
        document.getElementById('progress').style.width = `${progress}%`;
    }
</script>
</html>
