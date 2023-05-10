<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VW Schelde Marina Survey</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background-color: #f2f2f2;
    }

    header {
        background-color: #fff;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    main {
        max-width: 800px;
        margin: 0 auto;
        padding: 60px 40px;
        text-align: center;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 20px;
        color: #005f9e;
    }

    p {
        font-size: 18px;
        margin-bottom: 40px;
        color: #777;
        line-height: 1.5;
    }

    button {
        background-color: #0072c6;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 12px 24px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #005f9e;
    }

    footer {
        background-color: #fff;
        padding: 40px 20px;
        text-align: center;
        box-shadow: 0 -2px;
    (0, 0, 0, 0.1);
    }

    .footer-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    nav li {
        margin-right: 20px;
    }

    nav li:last-child {
        margin-right: 0;
    }

    nav a {
        text-decoration: none;
        color: #0072c6;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    nav a:hover {
        color: #005f9e;
    }

    .social-media-icons {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .social-media-icons a {
        display: block;
        width: 40px;
        height: 40px;
        background-color: #0072c6;
        color: #fff;
        border-radius: 50%;
        margin-right: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        transition: background-color 0.3s ease;
    }

    .social-media-icons a:hover {
        background-color: #005f9e;
    }

    .copy-right {
        font-size: 14px;
        color: #777;
        margin: 0;
        padding: 20px 0;
    }



</style>
<body>
<header>
    <img src="https://ibb.co/pr8YQPv" alt="VW Schelde Marina Logo">
</header>
<main>
    <h1>Share Your Experience with VW Schelde Marina</h1>
    <p>Thank you for choosing VW Schelde Marina. We strive to provide the best possible experience for our customers, and your feedback helps us achieve that goal. Please take a few minutes to complete this survey and share your thoughts with us.</p>
    <a href="{{ url('/survey') }}"><button>Start Survey</button><a/>
</main>
<footer>

    <ul class="social-media-icons">
        <li><a href="#"><img src="facebook-icon.png" alt="Facebook Icon"></a></li>
        <li><a href="#"><img src="twitter-icon.png" alt="Twitter Icon"></a></li>
        <li><a href="#"><img src="instagram-icon.png" alt="Instagram Icon"></a></li>
    </ul>
</footer>
</body>
</html>



{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>VVW Schelde Flushing</title>--}}
{{--    <link rel="stylesheet" type="text/css" href="/css/styling.css">--}}
{{--    <link rel="stylesheet" type="text/css" href="/css/stylingsurvey.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<header>--}}
{{--    <h1>VVW Schelde Flushing</h1>--}}
{{--    <nav class="topnav">--}}
{{--        <ul>--}}

{{--            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>--}}
{{--            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>--}}
{{--            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Dashboard</a></li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
{{--</header>--}}
{{--<main>--}}
{{--    <section>--}}
{{--        <h2>Welcome to VVW Schelde Flushing</h2>--}}
{{--        <p>We are a sailing club based in Flushing, Netherlands. On the Western Scheldt behind the locks of Vlissingen and the Canal through Walcheren,--}}
{{--            you will find the spacious and modern marina V.V.W. Schelde.<br>--}}

{{--            During a cruise in Zeeland--}}
{{--            is allowed a trip on the Western Schelde or Veerse Meer,--}}
{{--            and a visit to Vlissingen should not be missed.<br>--}}

{{--            The harbor is a good base for water sports enthusiasts.--}}
{{--            The cities of Vlissingen and Middelburg are easily and quickly accessible.--}}
{{--            During the summer period you can expect numerous activities here.</p>--}}
{{--    </section>--}}
{{--</main>--}}


{{--</body>--}}
{{--</html>--}}
