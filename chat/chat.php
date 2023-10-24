<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Chat</h1>
    <?php

    echo '</div>';
    echo '
    <form method="post" action="enviar_mensaje.php">
        <label for="mensaje">Mensaje:</label>
        <input type="text" name="mensaje" required>
        <br>
        <br>
        <input type="submit" value="Enviar Mensaje">
    </form>';

    session_start();
    if (isset($_SESSION['usuario'])) {
        echo '<div id="chat">';
        
        $archivo = 'chat.csv';
        $mensajes = array_map('str_getcsv', file($archivo));
        foreach ($mensajes as $mensaje) {
            list($usuario, $texto, $fechaHora) = $mensaje;
            echo "<p><strong>$usuario:</strong> $texto - $fechaHora</p>";
        }
        
    } else {
        header('Location: paginaprincipal.php');
    }
    ?>
    <br>
    <button onclick="location.href='logout.php';">Cerrar Sesión</button>
</body>
</html>