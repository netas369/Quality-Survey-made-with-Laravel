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
    <h1>VVW Schelde Flushing</h1>
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

    <table>
        <thead>
            <tr>
                <th>REVIEW ID</th>
                <th>DATE</th>
                <th>HARBOUR</th>
                <th>RATING</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($survey as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->created_at }}</td>
                    <td>{{ $review->WhichHarbour }}</td>
                    <td>1</td>
                    <td>status</td>
                </tr>

            @endforeach
        </tbody>
    </table>

</main>
</body>
</html>
