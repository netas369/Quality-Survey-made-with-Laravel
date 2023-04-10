<!DOCTYPE html>
<html>
<head>
    <title>Simple HTML Form</title>

    <link rel="stylesheet" type="text/css" href="/css/stylingsurveys.css">
    <link rel="stylesheet" type="text/css" href="/css/styling.css">

</head>

<header>
    <h1>VVW Schelde Vlissingen</h1>
    <nav class="topnav">
        <ul>

            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'choosesurvey' ? 'active' : '' }}" href="{{ url('choosesurvey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<body>

<form method="POST" action="/survey/survey-nl">
    @csrf

    <label for="PeopleOnBoard">Met hoeveel personen bent u totaal aan boord?</label>
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

    <label for="AdultsOnBoard">Aantal volwassenen?</label>
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

    <label for="AgeOfChildren">Wat is de leeftijdscategorie van eventuele kinderen?</label>
    <select id="AgeOfChildren" name="AgeOfChildren">
        <option value="0-4 years">0-4 jaar</option>
        <option value="5-10 years">5-10 jaar</option>
        <option value="11 years and older">11 jaar en ouder</option>
        <option value="nvt">nvt</option>
    </select><br><br>

    <label for="TypeOfVessel">Met welk type boot bent u op bezoek?</label>
    <input type="text" id="TypeOfVessel" name="TypeOfVessel" required><br><br>

    <label for="FirstVisit">Is dit uw eerste bezoek aan onze haven?</label>
    <select id="FirstVisit" name="FirstVisit">
        <option value="Yes">Ja</option>
        <option value="No">Nee</option>
    </select><br><br>

    <label for="HearAboutHarbour">Hoe weet u van onze haven?</label>
    <select id="HearAboutHarbour" name="HearAboutHarbour">
        <option value="internet">internet</option>
        <option value="almanac">almanak</option>
        <option value="recommended by others">aanbevolen door anderen</option>
        <option value="different">anders</option>
    </select><br><br>

    <input type="submit" value="Verzenden">
</form>

</body>
</html>
