<?php
// Incluir la conexión a la base de datos
require 'db_connection.php'; 

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $edad = $_POST['Edad'];
    $fecha = $_POST['Fecha'];
    $vip = $_POST['VIP'];
    $provincia = $_POST['Provincia'];

    // Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO registros_vuelos (nombre, direccion, Edad, Fecha, Provincia, VIP) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nombre, $direccion, $edad, $fecha, $provincia, $vip]);
}

// Mostrar los registros
$registro_query = "SELECT nombre, direccion, Edad, Fecha, Provincia FROM registros_vuelos";
$registro_result = $conn->query($registro_query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vuelos</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Alinea el contenido al inicio */
            align-items: center;
            margin: 0;
            background-image: url('avion de fondo.jpg'); /* Fondo de avión */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            min-height: 100vh; /* Asegura que el contenido ocupe al menos toda la altura de la ventana */
            padding-top: 60px; /* Espacio para la navegación */
            padding-bottom: 60px; /* Espacio para el pie de página */
        }

        nav {
            background-color: rgba(76, 175, 80, 0.8);
            padding: 10px;
            width: 100%;
            position: fixed; /* Mantiene la navegación fija en la parte superior */
            top: 0;
            z-index: 1000; /* Asegura que esté por encima de otros elementos */
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav li {
            margin: 0 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .results-section {
            margin: 20px auto;
            width: 80%;
            max-width: 600px;
        }

        .results-section h2 {
            text-align: center;
        }

        .results-section ul {
            list-style-type: none;
            padding: 0;
        }

        .results-section li {
            background: #e9e9e9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 5px 0;
        }

        footer {
            background-color: rgba(76, 175, 80, 0.8);
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed; /* Mantiene el pie de página fijo en la parte inferior */
            bottom: 0;
            width: 100%; /* Asegura que el pie de página ocupe todo el ancho */
        }

        ul.resultados {
            list-style-type: none;
            padding: 0;
            margin: 80px 0 0; /* Ajusta el margen superior para que no se superponga con el nav */
            border: 2px solid rgba(76, 175, 80, 0.8); /* Borde con color verde y opacidad */
            border-radius: 10px; /* Bordes redondeados (opcional) */
            background-color: rgba(255, 255, 255, 0.5); /* Fondo blanco con transparencia */
            padding: 20px; /* Espaciado interior para el contenido */
        }


        /* Adicional para el margen superior en el contenido */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 80px 0 0; /* Ajusta el margen superior para que no se superponga con el nav */
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="registro_vuelos.php">Ver Registros</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <ul class="resultados">
        <?php
        while ($row = $registro_result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>";
            echo "<table style='width: 100%; border-collapse: collapse;'>";
            echo "<tr>";
            echo "<td style='padding-right: 20px;'>Nombre: " . htmlspecialchars($row['nombre']) . "</td>";
            echo "<td style='padding-right: 20px;'>Dirección: " . htmlspecialchars($row['direccion']) . "</td>";
            echo "<td style='padding-right: 20px;'>Edad: " . htmlspecialchars($row['Edad']) . "</td>";
            echo "<td style='padding-right: 20px;'>Fecha: " . htmlspecialchars($row['Fecha']) . "</td>";
            echo "<td>Destino: " . htmlspecialchars($row['Provincia']) . "</td>";
            echo "</tr>";
            echo "</table>";
            echo "</li>";

        }
        ?>
    </ul>

    <footer>
        <p>&copy; 2024 Registro de Vuelos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
