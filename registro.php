<?php
include 'db_connection.php'; // Incluye tu archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar las entradas
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);

    // Verificar que el nombre de usuario no esté vacío y cumpla con ciertas reglas
    if (empty($username) || strlen($username) < 3) {
        echo "El nombre de usuario debe tener al menos 3 caracteres.";
        exit;
    }

    // Verificar que la contraseña no esté vacía y cumpla con ciertas reglas
    if (empty($password) || strlen($password) < 4) {
        echo "La contraseña debe tener al menos 6 caracteres.";
        exit;
    }

    // Verificar si el nombre de usuario ya existe
    $checkUser = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $checkUser->execute(['username' => $username]);
    
    if ($checkUser->fetchColumn() > 0) {
        echo "El nombre de usuario ya está en uso.";
        exit; // Termina la ejecución si el usuario ya existe
    }

    // Hash de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Preparar la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);
    
    // Intentar ejecutar la consulta y manejar errores
    try {
        if ($stmt->execute(['username' => $username, 'password' => $hashedPassword])) {
            echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar: " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-image: url('avion de fondo.jpg');
            background-size: cover; /* Hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #243642;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            border: 2px solid #ccc;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Registrarse</h1>
    <form action="registro.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
</body>
</html>
