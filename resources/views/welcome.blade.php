<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Survey Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.seame.com%2Fapi%2Fassets%2F3lgueieymhes88oc%3Fw%3D1200%26h%3D850%26f%3Dcrop%26q%3D60&f=1&nofb=1&ipt=206024c087c6064cbe8ffcbcd45975253031d3502d1d24bb7e1c2f51f6aa4bb1&ipo=images);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .topnav {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px 20px;
            background-color: transparent;
        }

        .topnav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .topnav ul a {
            color: #333;
            text-decoration: none;
            margin-right: 10px;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            color: #333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .hero {
            text-align: center;
            margin-bottom: 40px;
        }

        .hero h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        .features {
            display: flex;
            justify-content: space-between;
        }

        .feature {
            text-align: center;
            flex-basis: 30%;
        }

        .feature i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 20px;
        }

        .feature h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 30px;
            padding: 10px 0;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f9f9f9;
        }

        .button:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-top: 30px;
            padding: 10px 0;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f9f9f9;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<nav class="topnav">
    <ul>
        <a class="button" href="{{ url('dashboard') }}">Dashboard</a>
    </ul>
</nav>
<div class="container">
    <header>
        <h1>Welcome to Our Survey!</h1>
        <p>We value your opinion. Take part in our survey and help us improve.</p>
    </header>
    <main>
        <section class="hero">
            <h2>Share Your Thoughts</h2>
            <p>Take a few minutes to complete our survey and make a difference.</p>
            <a class="button" href="{{ url('/survey') }}">Start Survey</a>
        </section>
        <section class="features">
            <div class="feature">
                <i class="fas fa-check-circle"></i>
                <h3>Easy to Use</h3>
                <p>Our user-friendly survey platform ensures a seamless experience.</p>
            </div>
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <h3>Secure and Confidential</h3>
                <p>Your responses are protected and handled with utmost confidentiality.</p>
            </div>
            <div class="feature">
                <i class="fas fa-chart-bar"></i>
                <h3>Help us improve</h3>
                <p>Your detailed insights and meaningful feedback will help us to change for better.</p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 VVW Schelde. All rights reserved.</p>
    </footer>
</div>
</body>
</html>
