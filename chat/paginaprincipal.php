<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Bienvenido al chat PHP</h1>
<?php
    session_start();

    if (isset($_SESSION['usuario'])) {
        echo '<button onclick="location.href=\'chat.php\';">Volver al chat</button><br>';
        echo '<br><button onclick="location.href=\'logout.php\';">Cerrar Sesión</button>';
    } else {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usr = $_POST['usr'];
            $pwd = $_POST['pwd'];
            
            $archivo = 'usuarios.csv';
            $usuarios = array_map('str_getcsv', file($archivo));
            foreach ($usuarios as $usuario) {
                list($username, $password) = $usuario;
                if ($username === $usr && password_verify($pwd, $password)) {
                    $_SESSION['usuario'] = $usr;
                    header('Location: chat.php');
                    exit;
                }
            }
            
            echo '<p style="color: red;">Credenciales incorrectas. Inténtalo de nuevo.</p>';
        }
        
        echo '
        <form method="post" action="paginaprincipal.php">
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
            <input type="submit" value="Iniciar Sesión">
        </form>';
        echo '<br><button onclick="location.href=\'registro.php\';">Registrarse</button>';
    }
    ?>
</body>
</html>