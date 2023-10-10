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
    $rand1 = $_POST['rand1'];
    $rand2 = $_POST['rand2'];
    $result = $_POST['result'];
    $randOp = $_POST['randOp'];
    $rightAnswer = 0;

    switch ($randOp) {
        case '+':
            $rightAnswer = $rand1 + $rand2;
            break;
        case '-':
            $rightAnswer = $rand1 - $rand2;
            break;
        case '*':
            $rightAnswer = $rand1 * $rand2;
            break;
        case '/':
            if ($rand2 != 0) {
            $rightAnswer = $rand1 / $rand2;
            }
            break;
        }

        if ($result == $rightAnswer){
            echo "<h1>Respuesta correcta</h1>";
        } else {
            echo "<h1>Respuesta incorrecta</h1>";
        }
    echo "<br><br>";

    if($result != $rightAnswer){
        echo "<a href='javascript:history.back()'><button type='button'>Volver</button></a>";
    } else{
        echo "<a href='operacion.php'><button type='button'>Volver</button></a>";
    }
    ?>
</body>
</html>