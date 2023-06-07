<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>

        body {
            background-color: #dedbdb;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .text-container {
            flex: 1;
            padding-right: 30px;
        }
        .image-container {
            flex: 1;
            text-align: center;
        }
        .image-container img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="text-container">
        <h1 style="font-size: 162px;">404</h1>
        <h2>Page Not Found</h2>
        <p><b>Oops! It seems like the information you were searching for has wandered off into the vast sea.</b></p>
        <p><u>Possible Reasons:</u></p>
        <ul>
            <li>Broken link</li>
            <li>Link no longer exists</li>
            <li>Mistyped address and more...</li>
        </ul>
        <p>But don't worry! We're always here to help you navigate back.
            You can return to the previous page to continue your marina exploration.</p>
        <button class="btn btn-primary" onclick="goBack()">Go Back</button>
    </div>
    <div class="image-container">
        <img src="/images/sailor.gif" alt="404 Error">
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
