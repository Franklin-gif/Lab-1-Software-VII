<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio #1 - Círculo</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a1a; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            text-align: center;
            width: 350px;
            border-top: 5px solid #d4af37; 
        }
        h2 { color: #333; margin-bottom: 20px; }
        .instruccion { font-size: 0.9em; color: #666; margin-bottom: 15px; }
        
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #d4af37;
            color: #000;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #b8962e;
        }
        .resultado {
            margin-top: 20px;
            padding: 15px;
            background-color: #fcfcfc;
            border: 1px solid #d4af37;
            border-radius: 8px;
            text-align: left;
        }
        .valor { color: #d4af37; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Problema #1</h2>
    <p class="instruccion">Cálculo de Área y Perímetro</p>
    
    <form method="POST" action="">
        <label for="radio">Introduce el radio (dato real):</label>
        <input type="number" step="any" name="radio" id="radio" required placeholder="0.00">
        <input type="submit" value="Calcular Resultados">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
       
        $radio_crudo = trim($_POST['radio']);

        
        $radio = filter_var($radio_crudo, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        if ($radio > 0) {
            
           
            $area = pi() * pow($radio, 2);
            
            
            $perimetro = 2 * pi() * $radio;

            
            echo "<div class='resultado'>";
            echo "<strong>Radio ingresado:</strong> <span class='valor'>$radio</span><br><hr>";
            echo "<strong>Área del círculo:</strong> " . number_format($area, 2) . "<br>";
            echo "<strong>Perímetro:</strong> " . number_format($perimetro, 2) . "<br>";
            echo "</div>";
        } else {
            echo "<div class='resultado' style='border-color:red; color:red;'>Por favor, ingrese un radio válido mayor a cero.</div>";
        }
    }
    ?>
</div>

</body>
</html>