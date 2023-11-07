<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Imágenes aleatorias de perros</h1>

<?php
    $dogData = file_get_contents('https://dog.ceo/api/breeds/image/random');
    $dogData = json_decode($dogData, true);

    if ($dogData && $dogData['status'] == 'success') {
        $dogImage = $dogData['message'];
        echo '<img src="' . $dogImage . '" alt="Imagen Aleatoria de Perro">';
    } else {
        echo 'No se pudo cargar la imagen del perro.';
    }
?>
</body>
</html>