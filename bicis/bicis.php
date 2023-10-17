<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <th>Fecha</th>
        <th>Lesividad</th>
        <th>Tipo de Vehículo</th>
    </tr>
        <?php
        $csvFile = 'AccidentesBicicletas_2023.csv';

        if (($bicis = fopen($csvFile, 'r')) !== false) {
            fgetcsv($bicis, 1000, ';');

            while (($data = fgetcsv($bicis, 1000, ';')) !== false) {
                $fecha = $data[1];
                $lesividad = $data[13];
                $tipo_vehiculo = $data[9];

                echo "<tr>";
                echo "<td>$fecha</td>";
                echo "<td>$lesividad</td>";
                echo "<td>$tipo_vehiculo</td>";
                echo "</tr>";
            }
            fclose($bicis);
        } else {
            echo "No se pudo abrir el archivo CSV.";
        }
        ?>
    </table>
</body>
</html>