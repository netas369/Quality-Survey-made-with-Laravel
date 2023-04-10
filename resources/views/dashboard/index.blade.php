<!DOCTYPE html>
<html>
<head>
    <title>VVW Schelde Flushing</title>
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td:first-child {
            font-weight: bold;
        }

        td:last-child {
            text-align: right;
        }

        @media only screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>VVW Schelde Flushing</h1>
    <h1>Control Dashboard</h1>
    <nav class="topnav">
        <ul>
            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
        </ul>
    </nav>
</header>
<main>
    <h1> Latest reviews</h1>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>People On Board</th>
            <th>Adults On Board</th>
            <th>Age of children</th>
            <th>Type of Vessel</th>
            <th>First Visit</th>
            <th>Hear about harbour</th>
            <th>Submitted at</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($latestAnswers as $surveyAnswer)
            <tr>
                <td>{{ $surveyAnswer->id }}</td>
                <td>{{ $surveyAnswer->people_on_board }}</td>
                <td>{{ $surveyAnswer->adults_on_board }}</td>
                <td>{{ $surveyAnswer->age_of_children }}</td>
                <td>{{ $surveyAnswer->vessel_type }}</td>
                <td>{{ $surveyAnswer->is_first_visit ? 'Yes' : 'No' }}</td>
                <td>{{ $surveyAnswer->how_did_you_hear }}</td>
                <td>{{ $surveyAnswer->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
