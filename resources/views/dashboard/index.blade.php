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
<main>
    <h1> Latest reviews</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>People On Board</th>
            <th>Adults On Board</th>
            <th>Age of children</th>
            <th>Type of Vessel</th>
            <th>First Visit</th>
            <th>Hear about harbour</th>
            <th>Submitted at</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($latestAnswers as $surveyAnswer)
            <tr>
                <td>{{ $surveyAnswer->id }}</td>
                <td>{{ $surveyAnswer->PeopleOnBoard }}</td>
                <td>{{ $surveyAnswer->AdultsOnBoard }} </td>
                <td>{{ $surveyAnswer->AgeOfChildren }}</td>
                <td>{{ $surveyAnswer->TypeOfVessel }}</td>
                <td>{{ $surveyAnswer->FirstVisit ? 'Yes' : 'No' }}</td>
                <td>{{ $surveyAnswer->HearAboutHarbour }}</td>
                <td>{{ $surveyAnswer->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
