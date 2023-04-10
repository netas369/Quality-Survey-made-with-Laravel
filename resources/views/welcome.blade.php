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
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <h2>Welcome to VVW Schelde Flushing</h2>
        <p>We are a sailing club based in Flushing, Netherlands. On the Western Scheldt behind the locks of Vlissingen and the Canal through Walcheren,
            you will find the spacious and modern marina V.V.W. Schelde.<br>

            During a cruise in Zeeland
            is allowed a trip on the Western Schelde or Veerse Meer,
            and a visit to Vlissingen should not be missed.<br>

            The harbor is a good base for water sports enthusiasts.
            The cities of Vlissingen and Middelburg are easily and quickly accessible.
            During the summer period you can expect numerous activities here.</p>
    </section>
</main>
</body>
</html>
