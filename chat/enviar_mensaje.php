<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['usuario'])) {
        $mensaje = $_POST['mensaje'];
        $fechaHora = date('Y-m-d H:i:s');
        $usuario = $_SESSION['usuario'];

        $archivo = 'chat.csv';
        $nuevoMensaje = [$usuario, $mensaje, $fechaHora];
        $csv = fopen($archivo, 'a');
        fputcsv($csv, $nuevoMensaje);
        fclose($csv);

        header('Location: chat.php');
    }
}
?>
</body>
</html>