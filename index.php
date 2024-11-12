

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Boletos - Registro de Vuelos</title>
    <style>
        body {

            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Alinea el contenido al inicio */
            align-items: center;
            margin: 0;
            background-image: url('avion de fondo.jpg'); /* Fondo de avión */
            background-size: cover; /* Hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            min-height: 100vh; /* Asegura que el contenido ocupe al menos toda la altura de la ventana */
            padding-top: 60px; /* Espacio para la navegación */
            padding-bottom: 60px; /* Espacio para el pie de página */
        }

        nav {
            background-color: rgba(76, 175, 80, 0.8); /* Fondo verde semitransparente */
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
            display: flex; /* Flex para hacer el menú horizontal */
            justify-content: center; /* Centra el menú */
        }

        nav li {
            margin: 0 15px; /* Espaciado entre los elementos del menú */
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline; /* Subrayado al pasar el mouse */
        }

        .form-section {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semitransparente */
            border: 2px solid #ccc;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 20px auto; /* Margen para centrar el formulario */
        }


        h1 {
            text-align: center;
            color: #243642;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="radio"] {
            margin-right: 10px; /* Espacio entre el radio y el texto */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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

        footer p {
            margin: 10px 0;
        }

        /* Estilo adicional para listas */
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

    <section class="form-section">
        <form action="registro_vuelos.php" method="post">
            <label>Digite su Nombre y apellidos</label>
            <input type="text" name="nombre" size="20" placeholder="Digite nombre" required />

            <label>Digite su Direccion</label>
            <input type="text" name="direccion" size="20" placeholder="Digite Direccion" required />

            <label>Digite su Edad</label>
            <input type="number" name="Edad" min="1" max="90" required placeholder="Edad" />

            <label>Seleccione fecha de viaje </label>
            <input type="date" name="Fecha" required/>

            <label for="VIP">Es usted un cliente VIP?</label><br/>
            <input type="radio" name="VIP" value="si" required>Si<br/>
            <input type="radio" name="VIP" value="no" required>No<br/>

            <label>Seleccione Ciudad Destino</label><br/>
            <select name="Provincia" required>
                <option>Madrid</option>
                <option>Sevilla</option>
                <option>Bilbao</option>
                <option>Barcelona</option>
            </select>

            <input type="submit" value="Guardar!!" />
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Venta de Boletos. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

