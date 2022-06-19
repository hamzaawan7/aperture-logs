<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Stats</h2>

<table>
    <tr>
        <th>Country</th>
        <th>Date</th>
        <th>Count</th>
    </tr>
    @foreach($stats as $country => $info)
        <tr>
            <td>{{ $country }}</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($info as $date => $count)
            <tr>
                <td></td>
                <td>{{ $date }}</td>
                <td>{{ $count }}</td>
            </tr>
        @endforeach
    @endforeach
</table>

</body>
</html>

