<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Círculo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
        }
        h2 { color: #333; }
        input[type="number"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .resultado {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9f7ef;
            border-left: 5px solid #28a745;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Cálculo de Círculo</h2>
    <form method="POST" action="">
        <label for="radio">Introduce el radio:</label>
        <input type="number" step="any" name="radio" id="radio" required placeholder="Ej: 5.5">
        <input type="submit" value="Calcular Ahora">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $radio = $_POST['radio'];
        
        // Cálculos
        $area = pi() * pow($radio, 2);
        $perimetro = 2 * pi() * $radio;

        echo "<div class='resultado'>";
        echo "<strong>Radio:</strong> $radio <br>";
        echo "<strong>Área:</strong> " . number_format($area, 2) . "<br>";
        echo "<strong>Perímetro:</strong> " . number_format($perimetro, 2);
        echo "</div>";
    }
    ?>
</div>

</body>
</html>