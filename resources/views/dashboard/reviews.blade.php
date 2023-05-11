<!DOCTYPE html>
<html>
<head>
    <title>VVW Schelde Flushing</title>
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
            @guest
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Dashboard</a></li>
            @endguest
            @auth
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
            @endauth
        </ul>
    </nav>
</header>
<nav>
    <div class="sidenav">
        <h2>MENU</h2>
        <a href={{ url('/dashboard') }}>Status</a>
        <a href={{ url('/reviews') }}>Reviews</a>
        <a href={{ url('/logout') }}>Logout</a>
    </div>
</nav>
<main>

{{--    {{ $bar->labels(['One', 'Two', 'Three']) }}--}}

    <div class="pagination">
        {{ $survey->links() }}
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
