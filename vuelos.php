<?php
// Incluir la conexión a la base de datos
require 'db_connection.php'; 

// Consultar los registros
$registro_query = "SELECT nombre, direccion, Edad, Fecha, Provincia, VIP FROM registros_vuelos";
$registro_result = $conn->query($registro_query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Vuelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #e9e9e9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Registros de Vuelos</h1>
    <ul>
        <?php
        while ($row = $registro_result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>";
            echo "Nombre: " . htmlspecialchars($row['nombre']) . "<br>";
            echo "Dirección: " . htmlspecialchars($row['direccion']) . "<br>";
            echo "Edad: " . htmlspecialchars($row['Edad']) . "<br>";
            echo "Fecha: " . htmlspecialchars($row['Fecha']) . "<br>";
            echo "Ciudad Destino: " . htmlspecialchars($row['Provincia']) . "<br>";
            echo "Cliente VIP: " . htmlspecialchars($row['VIP']);
            echo "</li>";
        }
        ?>
    </ul>
    <a href="index.php">Volver al inicio</a>
</body>
</html>
