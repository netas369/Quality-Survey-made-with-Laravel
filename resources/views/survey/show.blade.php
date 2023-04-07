<!DOCTYPE html>
<html>
<head>
    <title>VVW Schelde Flushing</title>
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
</head>
<body>
<header>
    <h1>VVW Schelde Flushing</h1>
    <nav class="topnav">
        <ul>

            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('survey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <h2>Test</h2>
        <p>This is a test</p>
    </section>
</main>
</body>
</html>
