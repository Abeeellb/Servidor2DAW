<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formulario.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="matr">Matrícula:</label>
        <input type="text" name="matr" id="matr"><br>
        <label for="telef">Teléfono:</label>
        <input type="number" name="telef" id="telef"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>
        
        <label for="cars">Elige una marca:</label>
        <select id="cars" name="cars">
            <?php
            $opciones = fopen("marcas.csv", "r");

            if($opciones){
              while(($linea = fgets($opciones)) !== false){
                $valores = explode(",", $linea);
                $nombre = trim($valores[0]);
                $abreviatura = trim($valores[1]);
                echo "<option value='$abreviatura'>$nombre ($abreviatura)</option>";
              }
              fclose($opciones);
            } else {
                echo "Error al abrir el archivo CSV.";
            }
            ?>
          </select>
          <br>
        <input type="radio" name="seguro" id="siS" value="Si">
        <label for="siS">Si, tengo seguro</label><br>
        <input type="radio" name="seguro" id="noS" value="No">
        <label for="noS">No, no tengo seguro</label><br>
          <br>
        <label>Horas de llamada:</label><br>
          <input type="checkbox" name="morning" id="mañana" value="Mañana">
          <label for="mañana">Mañana</label><br>
          <input type="checkbox" name="afternoon" id="tarde" value="Tarde">
          <label for="tarde">Tarde</label><br>
          <input type="checkbox" name="night" id="noche" value="Noche">
          <label for="noche">Noche</label><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>