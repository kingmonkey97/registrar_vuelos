<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "<h1>Bienvenido, " . $_SESSION['username'] . "!</h1>";
echo "<p><a href='logout.php'>Cerrar sesión</a></p>";
?>
