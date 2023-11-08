<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Información de Países</h1>
    <table border = 1px>
        <tr>
            <th>Nombre del País</th>
            <th>Capital</th>
            <th>Google Maps</th>
        </tr>

        <?php
        $url = 'https://restcountries.com/v3.1/all';
        $data = file_get_contents($url);
        $countries = json_decode($data, true);

        foreach ($countries as $country) {
            $name = $country['name']['common'];
            if (isset($country['capital'][0])) {
                $capital = $country['capital'][0];
            } else {
                $capital = 'No disponible';
            }
            $maps = $country['maps']['googleMaps'];

            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$capital</td>";
            echo "<td>";
            echo "<a href='$maps' target='_blank'>Ver en Google Maps</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>