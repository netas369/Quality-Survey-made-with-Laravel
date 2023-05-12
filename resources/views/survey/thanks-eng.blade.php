<html>
<head>
    <title>Thank You</title>
    <link rel="stylesheet" type="text/css" href="/css/thanksstyling.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" href="/css/WelcomePage.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
    <h1>VVW Schelde Flushing</h1>
    <nav class="topnav">
        <ul>

            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<body>
<div class="container">
    <h1>Thank You</h1>
    <p>Thank you for filling out the survey. We will send the answers to the secretary.</p>
</div>
</body>
</html>
