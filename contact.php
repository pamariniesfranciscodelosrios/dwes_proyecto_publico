<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!-- Pico CSS -->
    <link href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="about.php">Acerca de mí</a></li>
                <li><a href="contact.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    <main class="container">
        <h1>Contacto</h1>
        <form method="POST" action="contact.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>

            <button type="submit">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = htmlspecialchars($_POST['nombre']);
            $email = htmlspecialchars($_POST['email']);
            $mensaje = htmlspecialchars($_POST['mensaje']);

            // Aquí podrías enviar un correo o procesar el mensaje
            echo "<p>Gracias, $nombre. Hemos recibido tu mensaje y te responderemos a la brevedad.</p>";
        }
        ?>
    </main>
    
    <footer>
        <p>&copy; 2024 - [Tu Nombre]. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
