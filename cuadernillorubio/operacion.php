<!DOCTYPE html>
<html lang="en">
<head>
    <link href="operacion.css" rel="stylesheet" type="text/css" media="screen"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $rand1 = rand(0, 50);
    $rand2 = rand(0, 50);
    $randOp = rand(0,3);

    switch ($randOp) {
        case '0':
            $randOp = "+";
            break;
        case '1':
            $randOp = "-";
            break;
        case '2':
            $randOp = "*";
            break;
        case '3':
            $randOp = "/";
            break;
        }

        echo "<form action='recibirop.php' method='post'>
        <input type='hidden' name='randOp' value='$randOp'>
        <h1>CUADERNILLO RUBIO</h1>";
        echo '<input type="hidden" name="rand1" value="' . $rand1 . '">';
        echo '<input type="hidden" name="rand2" value="' . $rand2 . '">';
        echo '<h1>'. $rand1 . ' ' . $randOp . ' ' . $rand2 .  ' = ' . '<input type="number" id="result" name="result" required>' . '</h1>';
        ?>
        <input type="submit" value="Comprobar">
    </form>
</body>
</html>