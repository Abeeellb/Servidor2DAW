<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$mensajeError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usr = $_POST['usr'];
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    $archivo = 'usuarios.csv';
    $usuarios = array_map('str_getcsv', file($archivo));
    
    $usuarioExistente = false;
    foreach ($usuarios as $usuario) {
        list($username, $password) = $usuario;
        if ($username === $usr) {
            $usuarioExistente = true;
            break;
        }
    }
    
    if ($usuarioExistente) {
        $mensajeError = 'El nombre de usuario ya está en uso. Elija otro.';
    } else {
        $nuevoUsuario = [$usr, $pwd];
        $csv = fopen($archivo, 'a');
        if ($csv) {
            fputcsv($csv, $nuevoUsuario);
            fclose($csv);
            header('Location: paginaprincipal.php');
            exit;
        } else {
            $mensajeError = 'Error al guardar los datos. Inténtalo de nuevo.';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <p style="color: red;"><?php echo $mensajeError; ?></p>
    <form method="post" action="registro.php">
        <label for="usr">Nombre de usuario:</label>
        <br>
        <input type="text" name="usr" required>
        <br>
        <br>
        <label for="pwd">Contraseña:</label>
        <br>
        <input type="password" name="pwd" required>
        <br>
        <br>
        <input type="submit" value="Registrarse">
    </form>
    <br>
    <button onclick="location.href='paginaprincipal.php';">Volver a la Página Principal</button>
</body>
</html>