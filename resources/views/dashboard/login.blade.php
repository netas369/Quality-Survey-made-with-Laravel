<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/stylingsurvey.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <title>Login to dashboard</title>
</head>
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
<body>
<h1>Login to see dashboard</h1>
<form>
    <label>Username</label>
    <input type="text"><br><br>
    <label>Password</label>
    <input type="text">
</form>
<button onclick="window.location.href='/dashboard'">Login</button>
</body>
</html>
