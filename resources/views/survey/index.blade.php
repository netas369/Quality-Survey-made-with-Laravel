<!DOCTYPE html>
<html>
<head>
    <title>VVW Schelde Flushing</title>

    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/stylingsurvey.css">
</head>
<body>
<header>
    <h1>VVW Schelde Flushing</h1>
    <nav class="topnav">
        <ul>

            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <h2>Survey</h2>
        <p>We would very much appreciate if you would complete the survey below.</p>
        <p>By means of your comments – your expectations and recommendations – we can try to improve our service.</p>
        <br>
        <h2>Survey Language Options</h2>
        <p>Choose your survey language:</p>
        <ul>
            <li><a href="{{ url(request()->path() . '/submition') }}">English</a></li>
            <li><a href="{{ url(request()->path() . '/survey-nl') }}">Dutch (Nederlands)</a></li>
        </ul>
    </section>

</main>
</body>
</html>
