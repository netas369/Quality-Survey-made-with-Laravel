<html>
<head>
    <title>Thank You</title>
    <link rel="stylesheet" type="text/css" href="/css/thanksstyling.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<header>
    <h1>VVW Schelde Flushing</h1>
    <nav class="topnav">
        <ul>

            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'choosesurvey' ? 'active' : '' }}" href="{{ url('choosesurvey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<body>
<div class="container">
    <h1>Dankjewel!</h1>
    <p>Bedankt voor het invullen van de enquête. De antwoorden sturen we naar de secretaris.</p>
</div>
</body>
</html>
