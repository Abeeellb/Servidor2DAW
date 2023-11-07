<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
    <?php
        $datos = file_get_contents('http://192.168.4.205/verjson/verjson.php');
        $contactos = json_decode($datos, true);

        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido</th>";
        echo "<th>Teléfono</th>";
        echo "</tr>";

        foreach ($contactos as $contacto) {
            echo "<tr>";
            echo "<td>" . $contacto['Nombre'] . "</td>";
            echo "<td>" . $contacto['Apellido'] . "</td>";
            echo "<td>" . $contacto['Telf'] . "</td>";
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>