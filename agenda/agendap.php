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
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
    </tr>
    <?php
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apell"];
    $telefono = $_POST["tlf"];
    
    $archivo = fopen("agenda.txt", 'a');
    
    if ($archivo) {
        fwrite($archivo, "$nombre, $apellido, $telefono\n");
        
        fclose($archivo);
        
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error al abrir el archivo.";
    }

    $archivo = fopen("agenda.txt", 'a+');

    if ($archivo) {
        while (($linea = fgets($archivo)) !== false) {
            $datos = explode(", ", $linea);

            echo "<tr>";
            echo "<td>{$datos[0]}</td>";
            echo "<td>{$datos[1]}</td>";
            echo "<td>{$datos[2]}</td>";
            echo "</tr>";
        }
        fclose($archivo);
    } else {
        echo "Error al abrir el archivo.";
    }
?>
</table>
</body>
</html>