<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In. Residencial</title>
    <link rel="stylesheet" href="p1.css">
</head>
<body>
    <style>
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #4CAF50;
            margin-bottom: 20px;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: block;
        }

        nav ul li a:hover {
            background-color: #45a049;
        }  

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #2980b9;
        }

        #noticias {
            margin: 30px auto;
            padding: 20px;
            width: 80%;
            background: #f9f9f9;
            border-radius: 10px;
        }

        .noticia {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .noticia img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }
    </style>

    <nav>
        <ul>
            <li><a href="pagina1.php">Inicio</a></li>

        </ul>
    </nav>

    <section>
        <h1>Integrantes del Grupo</h1>
        <dl>
            <dt><strong>Nombre:</strong></dt>
            <dd>Christopher Alexis Hernández Cabrera</dd>
            <dd>Millagui Valentin Rodríguez Mateo</dd>
        </dl>

        <h2>Descripción del Residencial</h2> 
        <p>El Residencial Alamedas de Santa Ana es un moderno complejo habitacional diseñado 
            para ofrecer comodidad, seguridad y calidad de vida a sus residentes. Ubicado en una 
            zona estratégica de la ciudad, el residencial cuenta con amplias áreas verdes, 
            juegos infantiles, salón social, y vigilancia las 24 horas. Su arquitectura combina
            elegancia y funcionalidad, ideal para familias que buscan un entorno tranquilo y bien conectado.
        </p>
        
        <h3>Ubicación: </h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.9470253589957!2d-90.51595322438995!3d14.658947785834377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8589a209e1ffbfdd%3A0x12b0303b26e4ecd6!2sUniversidad%20Mariano%20G%C3%A1lvez%20de%20Guatemala!5e0!3m2!1ses!2sgt!4v1756525526315!5m2!1ses!2sgt" 
        width="400" 
        height="300" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>

    <!-- Sección de Noticias -->
    <section id="noticias">
        <h2>Noticias Recientes</h2>
        <?php
        $conn = new mysqli("localhost", "desarrollo_web", "@Starks2025", "desarrollo_web");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT titulo, contenido, fecha_publicacion, imagen 
                FROM noticias 
                ORDER BY fecha_publicacion DESC 
                LIMIT 3";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='noticia'>";
                if (!empty($row['imagen'])) {
                    echo "<img src='" . $row['imagen'] . "' alt='Imagen de noticia'>";
                }
                echo "<h3>" . $row['titulo'] . "</h3>";
                echo "<small>" . date("d/m/Y", strtotime($row['fecha_publicacion'])) . "</small>";
                echo "<p>" . $row['contenido'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay noticias disponibles.</p>";
        }

        $conn->close();
        ?>
    </section>

    <footer>
        <a href="pagina2.html">Página 2</a>
    </footer>
</body>
</html>
