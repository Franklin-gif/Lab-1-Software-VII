<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de entrada de datos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            width: 380px;
            text-align: center;
        }
        h2 { color: #d63384; margin-bottom: 25px; } 
        
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        label { 
            display: block; 
            margin-bottom: 5px; 
            font-weight: bold;
            color: #444;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #d63384;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #b02a6b;
        }
        .resultado-container {
            margin-top: 25px;
            padding: 15px;
            border-radius: 8px;
            text-align: left;
            font-size: 0.95em;
        }
        .exito { background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; }
        .error { background-color: #f8d7da; color: #842029; border: 1px solid #f5c2c7; }
        .info-tecnica {
            font-size: 0.8em;
            color: #666;
            margin-top: 5px;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Formulario De Entrada De Datos</h2>
    
    <form method="POST" action="">
        <div class="form-group">
            <label for="nombre">Ingrese su nombre:</label>
            <input type="text" name="nombre" id="nombre" required placeholder="Ej: JUAN PEREZ">
        </div>

        <div class="form-group">
            <label for="edad">Ingrese su Edad:</label>
            <input type="number" name="edad" id="edad" required placeholder="0">
        </div>

        <input type="submit" value="Confirmar Registro">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $raw_nombre = trim($_POST['nombre']);
        $raw_edad = trim($_POST['edad']);

   
        $nombre_sanitizado = htmlspecialchars($raw_nombre, ENT_QUOTES, 'UTF-8');
        $edad_sanitizada = filter_var($raw_edad, FILTER_SANITIZE_NUMBER_INT);

  
        $nombre_final = ucwords(strtolower($nombre_sanitizado));

        
        $clase = ($edad_sanitizada >= 18) ? "exito" : "error";

        echo "<div class='resultado-container $clase'>";
        echo "<strong>Nombre procesado:</strong> " . $nombre_final . "<br>";
        echo "<strong>Edad detectada:</strong> " . $edad_sanitizada . " años<br><br>";

        if ($edad_sanitizada >= 18) {
            echo "✅ <strong>Usted puede votar en las próximas elecciones 2028.</strong>";
        } else {
            echo "❌ <strong>Usted no es mayor de edad para votar.</strong>";
        }
        
        echo "<div class='info-tecnica'>Datos procesados con Trimming, Sanitización y Normalización.</div>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>