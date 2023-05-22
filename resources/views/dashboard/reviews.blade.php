<!DOCTYPE html>
<html>
<head>
    <title>VVW Schelde Flushing</title>
    <style>
        .progress-bar {
            width: 1043px;
            height: 20px;
            background-color: #f2f2f2;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4caf50;
            border-radius: 4px;
            transition: width 0.3s ease-in-out;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/stylingsurvey.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
</head>
<body>
<header>
    <h1>Control Dashboard</h1>
    <nav class="topnav">
        <ul>
            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<nav>
    <div class="sidenav">
        <h2>MENU</h2>
        <a href={{ url('/dashboard') }}>Status</a>
        <a href={{ url('/reviews') }}>Reviews</a>
    </div>
</nav>
<main>

{{--    {{ $bar->labels(['One', 'Two', 'Three']) }}--}}

    <div class="pagination">
        {{ $survey->links() }}
    </div>

    <div class="progress-bar">
        <div class="progress" style="width: {{ $averageSatisfaction }}%"></div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>Review ID</th>
            <th>People On Board</th>
            <th>Type of Vessel</th>
            <th>First Visit</th>
            <th>Hear About Harbour</th>
            <th>Overall Cleanliness</th>
            <th>Staff Friendly and Helpful</th>
            <th>Safety at the Harbour</th>
            <th>How Would You Recommend to Others</th>
            <th>Quality for Money</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($survey as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->PeopleOnBoard }}</td>
                <td>{{ $review->TypeOfVessel }}</td>
                <td>{{ $review->FirstVisit }}</td>
                <td>{{ $review->HearAboutHarbour }}</td>
                <td>{{ $review->OverallCleanliness }}</td>
                <td>{{ $review->StaffFriendlyAndHelpful }}</td>
                <td>{{ $review->SafetyAtTheHarbour }}</td>
                <td>{{ $review->HowWouldYouRecommendToOthers }}</td>
                <td>{{ $review->QualityForMoney }}</td>
                <td>{{ $review->rating() }}</td>
                <td><a href="{{ route('dashboard.show', $review->id) }}" class="btn btn-primary">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $survey->links() }}
    </div>



</main>
</body>
</html>
