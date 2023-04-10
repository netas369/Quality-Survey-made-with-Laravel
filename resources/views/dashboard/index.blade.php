<!DOCTYPE html>
<html>
<head>
    <title>VVW Schelde Flushing</title>
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <style>
        .lol {
            font-size: 48px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
            text-shadow: 2px 2px #eaeaea;
            margin-top: 50px;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            letter-spacing: 2px;
            animation: scale-in 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
        }

        @keyframes scale-in {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>VVW Schelde Flushing</h1>
    <h1>Controll Dashboard</h1>
    <nav class="topnav">
        <ul>

            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<main>
<h1 class="lol">Here will be the dashboard : )</h1>
</main>
</body>
</html>
