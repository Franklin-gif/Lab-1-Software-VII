<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Pro UI/UX</title>
  <style>
    :root {
       
        --primary: #ec4899; /* Rosa vibrante (Vibrant Pink) */
        --secondary: #4566f8; /* Violeta intenso (Vibrant Violet) */
        --primary-hover: #27c0db;
        --bg-body: #f1f5f9; /* Gris muy pálido para el fondo de pantalla */
        --card-bg: #ffffff; /* Blanco puro para la tarjeta */
        --text-main: #111827; /* Casi negro para el texto principal */
        --text-muted: #6b7280; /* Gris para labels */
        --input-bg: #f9fafb; /* Fondo sutil para inputs */
        --border: #e5e7eb; /* Bordes suaves */
        
        /* Degradado moderno para el botón */
        --btn-gradient: linear-gradient(135deg, #7aacf8 0%, #8b5cf6 100%);
        --btn-gradient-hover: linear-gradient(135deg, #7aacf8 0%, #211536 100%);
    }

    body {
        font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
        background-color: var(--bg-body);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .calculator-card {
        background: var(--card-bg);
        padding: 1.5rem; /* Compacto, como te gusta */
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(139, 92, 246, 0.1); /* Sombra suave con tono violeta */
        width: 280px; /* Compacto */
        border: 1px solid var(--border);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .calculator-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(139, 92, 246, 0.15);
    }

    h2 { 
        color: var(--text-main); 
        font-size: 1.25rem; 
        margin-bottom: 0.25rem;
        font-weight: 800;
        letter-spacing: -0.025em;
        text-align: left;
    }

    .subtitle {
        color: var(--text-muted);
        font-size: 0.8rem;
        margin-bottom: 1.25rem;
        text-align: left;
    }

    .input-group { 
        margin-bottom: 0.8rem; 
        text-align: left; 
    }

    label { 
        display: block; 
        margin-bottom: 3px; 
        color: var(--text-main); 
        font-size: 0.75rem; 
        font-weight: 600;
        margin-left: 2px;
    }

    input[type="number"], select {
        width: 100%;
        padding: 10px 12px;
        border: 2px solid #eee;
        border-radius: 8px;
        font-size: 0.9rem;
        background-color: var(--input-bg);
        color: var(--text-main);
        box-sizing: border-box;
        transition: border-color 0.2s, background-color 0.2s;
    }

    input:focus, select:focus {
        border-color: var(--secondary); /* El borde se ilumina en violeta */
        background-color: #fff;
        outline: none;
    }

    .btn-calc {
        width: 100%;
        padding: 12px;
        background: var(--btn-gradient); /* Botón con degradado vibrante */
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        margin-top: 0.5rem;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(236, 72, 153, 0.2);
    }

    .btn-calc:hover { 
        background: var(--btn-gradient-hover); 
        transform: translateY(-1px);
        box-shadow: 0 6px 15px rgba(236, 72, 153, 0.3);
    }

    .btn-calc:active { 
        transform: translateY(0); 
    }

    .res-container {
        margin-top: 1.25rem;
        padding: 12px;
        background: #faf5ff; /* Violeta extremadamente pálido */
        border-radius: 8px;
        border: 1px solid #e9d5ff; /* Violeta suave */
        text-align: center;
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .res-label {
        font-size: 0.7rem;
        color: #6b86ff; /* Violeta intenso */
        display: block;
        margin-bottom: 2px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .res-val { 
        font-size: 1.2rem; 
        color: #003daf; /* Violeta oscuro */
        font-weight: 800; 
    }
</style>
</head>
<body>

<div class="calculator-card">
    <h2>Calculadora</h2>
    <form method="POST">
        <div class="input-group">
            <label>Número 1</label>
            <input type="number" step="any" name="n1" required placeholder="0.00">
        </div>
        
        <div class="input-group">
            <label>Operación</label>
            <select name="operacion">
                <option value="suma">Suma (+)</option>
                <option value="resta">Resta (−)</option>
                <option value="multi">Multiplicación (×)</option>
            </select>
        </div>

        <div class="input-group">
            <label>Número 2</label>
            <input type="number" step="any" name="n2" required placeholder="0.00">
        </div>

        <button type="submit" class="btn-calc">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Trimming y Sanitización
        $n1 = filter_var(trim($_POST['n1']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $n2 = filter_var(trim($_POST['n2']), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $op = $_POST['operacion'];
        $res = 0;
        $simbolo = "";

        // Lógica de la calculadora
        switch ($op) {
            case "suma":
                $res = $n1 + $n2;
                $simbolo = "+";
                break;
            case "resta":
                $res = $n1 - $n2;
                $simbolo = "-";
                break;
            case "multi":
                $res = $n1 * $n2;
                $simbolo = "×";
                break;
        }

        echo "<div class='res-container'>";
        echo "<small style='color: #888;'>Resultado:</small><br>";
        echo "<span class='res-val'>$n1 $simbolo $n2 = " . number_format($res) . "</span>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>