<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
$nombre = $_POST['nombre'];
    $matr = $_POST['matr'];
    $telef = $_POST['telef'];
    $email = $_POST['email'];
    $cars = $_POST['cars'];
    $seguro = $_POST['seguro'];
    
    if(isset($_POST["morning"])){
      $morning = $_POST["morning"];
  }
  else{
      $morning = "";
      
  }
  if(isset($_POST["afternoon"])){
      $afternoon = $_POST["afternoon"];
  }
  else{
      $afternoon = "";
     
  }
  if(isset($_POST["night"])){
      $night = $_POST["night"];
  }
  else{
      $night = "";
      
  }

echo "<table>
        <tr>
            <th>Nombre:</th>
            <td>$nombre</td>
        </tr>
        <tr>
            <th>Matricula:</th>
            <td>$matr</td>
        </tr>
        <tr>
            <th>Teléfono:</th>
            <td>$telef<td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>$email</td>
        </tr>
        <tr>
            <th>Marca:</th>
            <td>$cars</td>
        </tr>
        <tr>
            <th>Seguro:</th>
            <td>$seguro</td>
        </tr>
        <tr>
            <th>Turno/s:</th>
            <td>$morning</td>
            <td>$afternoon</td>
            <td>$night</td>
            
        </tr>
    </table>";

    $opciones = fopen("tallerform.csv", 'a+');
    
    if ($opciones) {
        fwrite($opciones, "$nombre, $matr, $telef, $email, $cars, $seguro, $morning, $afternoon, $night\n");
        
        fclose($opciones);
        
        echo "Datos guardados exitosamente.";
    } else {
        echo "Error al abrir el archivo.";
    }
  ?>
</table>
</body>
</html>

    
