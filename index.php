<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Abiertos BNE</title>
    <!-- Enlace a Pico CSS -->
    <link href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css" rel="stylesheet">
</head>
<body>
    <main class="container">
        <h1>Lista de Paquetes - Datos Abiertos BNE</h1>

        <?php
        // URL de la API de la Biblioteca Nacional de España
        $api_url = "https://datosabiertos.bne.es/api/3/action/package_list";
        
        // Usar cURL para obtener los datos de la API
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);

        // Decodificar el JSON de la API
        $data = json_decode($response, true);

        // Verificar si hay datos
        if ($data && isset($data['result'])) {
            $paquetes = $data['result'];

            // Mostrar la tabla si hay paquetes
            if (count($paquetes) > 0) {
                echo "<form method='POST' action=''>";
                echo "<table>";
                echo "<thead><tr><th>Nombre del Paquete</th><th>Acción</th></tr></thead>";
                echo "<tbody>";

                // Mostrar cada paquete en una fila de la tabla
                foreach ($paquetes as $paquete) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($paquete) . "</td>";
                    echo "<td><button type='submit' name='paquete' value='" . htmlspecialchars($paquete) . "'>Ver detalles</button></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</form>";
            } else {
                echo "<p>No se encontraron paquetes.</p>";
            }
        } else {
            echo "<p>Error al obtener datos de la API.</p>";
        }

        // Procesar el paquete seleccionado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paquete'])) {
            $paqueteSeleccionado = $_POST['paquete'];
            echo "<p><strong>Paquete seleccionado: </strong>" . htmlspecialchars($paqueteSeleccionado) . "</p>";

            // Aquí podrías hacer otra solicitud a la API para obtener detalles sobre el paquete seleccionado
        }
        ?>
    </main>
</body>
</html>
