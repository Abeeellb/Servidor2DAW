<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedMunicipio = $_POST["municipioSelect"];
    $xmlFile = $selectedMunicipio . ".xml";

    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);

        echo "<h2>Pronóstico del Tiempo para " . $xml->nombre . ", " . $xml->provincia . "</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Día</th><th>Temperatura Mínima</th><th>Temperatura Máxima</th></tr>";

        foreach ($xml->prediccion->dia as $dia) {
            echo "<tr>";
            echo "<td>" . $dia["fecha"] . "</td>";
            echo "<td>" . $dia->temperatura->minima . "°C</td>";
            echo "<td>" . $dia->temperatura->maxima . "°C</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontró el archivo XML para el municipio seleccionado.";
    }
} else {
    echo "Acceso no válido.";
}
?>

</body>
</html>