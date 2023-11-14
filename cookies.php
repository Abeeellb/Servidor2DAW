<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Selecciona una categoría:</h1>
    <form method="post">
        <select name="categorySelect">
            <option value="camisetas">Camisetas</option>
            <option value="pantalones">Pantalones</option>
            <option value="chaquetas">Chaquetas</option>
            <option value="zapatillas">Zapatillas</option>
        </select>
        <input type="submit" value="Mostrar productos">
    </form>

    <div id="productsList">
        <!-- Aquí se mostrarán los productos -->
        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["categorySelect"])) {
                $selectedCategory = $_POST["categorySelect"];
                $_SESSION["selectedCategory"] = $selectedCategory;
            }
        }

        if (isset($_SESSION["selectedCategory"])) {
            $selectedCategory = $_SESSION["selectedCategory"];

            // Mostrar los productos según la categoría seleccionada
            $products = [];
            $csvFile = $selectedCategory . ".csv";

            if (file_exists($csvFile)) {
                $file = fopen($csvFile, "r");

                while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $products[] = $data;
                }

                fclose($file);

                echo "<h2>Mostrando productos de la categoría: " . $selectedCategory . "</h2>";
                echo "<ul>";
                foreach ($products as $product) {
                    echo "<li>Categoría: " . $product[0] . ", Talla: " . $product[1] . ", Color: " . $product[2] . "</li>";
                }
                echo "</ul>";
            }
        }
        ?>
    </div>
</body>
</html>
