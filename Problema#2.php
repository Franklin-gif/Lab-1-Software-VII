<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Medidas</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        .input-group { margin-bottom: 20px; text-align: left; }
        label { display: block; margin-bottom: 5px; color: #666; }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box; 
        }
        input[type="submit"] {
            background-color: #2766ae;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        input[type="submit"]:hover { background-color: #062c57; }
        .resultado-box {
            margin-top: 25px;
            padding: 15px;
            background-color: #f1fcf4;
            border: 1px dashed #2766ae;
            border-radius: 8px;
            color: #2b35c9;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Pulgadas a cm</h2>
    
    <form method="POST" action="">
        <div class="input-group">
            <label for="pulgadas">Cantidad en pulgadas:</label>
            <input type="number" step="any" name="pulgadas" id="pulgadas" required placeholder="0.00">
        </div>
        <input type="submit" value="Convertir a Centímetros">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $pulgadas = $_POST['pulgadas'];
        
        
        $centimetros = $pulgadas * 2.54;

       
        echo "<div class='resultado-box'>";
        echo "<strong>Resultado:</strong><br>";
        echo $pulgadas . " pulg = " . number_format($centimetros, 2) . " cm";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>