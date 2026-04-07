<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio del Círculo</title>
</head>
<body>
    <?php
        <form name= "formulario" action="013-php_foreach-post-get.php" method= "POST">
            Introduce el radio del círculo: <input type="text" name="radio">
            <input type="submit" value="Calcular">
        </form>


        $radio = $_POST['radio'];
        $area = 3.14 * $radio * $radio;
        $perimetro = 2 * 3.14 * $radio;

        echo "El área del círculo es: " . $area . "<br>";
        echo "El perímetro del círculo es: " . $perimetro . "<br>";

    ?>
</body>
</html> 