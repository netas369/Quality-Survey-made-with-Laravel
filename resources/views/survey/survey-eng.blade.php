<!DOCTYPE html>
<html>
<head>
    <title>Simple HTML Form</title>

    <link rel="stylesheet" type="text/css" href="/css/stylingsurveys.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">

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

<form method="POST" action="/survey/survey-eng">
    @csrf

    <label for="PeopleOnBoard">How many people do/did you have on board?</label>
    <select id="PeopleOnBoard" name="PeopleOnBoard">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select><br><br>

    <label for="AdultsOnBoard">What is/was the number of adults?</label>
    <select id="AdultsOnBoard" name="AdultsOnBoard">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
    </select><br><br>

    <label for="AgeOfChildren">What ages are the children, if any?</label>
    <select id="AgeOfChildren" name="AgeOfChildren">
        <option value="0-4 years">0-4 years</option>
        <option value="5-10 years">5-10 years</option>
        <option value="11 years and older">11 years and older</option>
        <option value="nvt">nvt</option>
    </select><br><br>

    <label for="TypeOfVessel">What type of vessel are you on?</label>
    <input type="text" id="TypeOfVessel" name="TypeOfVessel" required><br><br>

    <label for="FirstVisit">Is this your first visit to our harbour?</label>
    <select id="FirstVisit" name="FirstVisit">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select><br><br>

    <label for="HearAboutHarbour">How did you hear of our harbour?</label>
    <select id="HearAboutHarbour" name="HearAboutHarbour">
        <option value="internet">internet</option>
        <option value="almanac">almanac</option>
        <option value="recommended by others">recommended by others</option>
        <option value="different">different</option>
    </select><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
