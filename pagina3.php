<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Inquilinos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f4f4f4;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: auto;
        }
        input, button {
            display: block;
            width: 90%;
            margin: 10px auto;
            padding: 10px;
            font-size: 16px;
        }
        button {
            background: #4CAF50;
            color: #f4f4f4;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #45a049;
        }
        .mensaje {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .pendiente {
            color: red;
        }
        .aldia {
            color: green;
        }
        .ingresar-boton {
            background-color: #0b4aebff;
        }
        .ingresar-boton:hover {
            background-color: #042191ff;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h2>Consulta de Inquilinos</h2>
        <input type="text" name="dpi" placeholder="DPI" required>
        <input type="text" name="numero_casa" placeholder="Número de Casa" required>
        <input type="text" name="primer_nombre" placeholder="Primer Nombre" required>
        <input type="text" name="primer_apellido" placeholder="Primer Apellido" required>
        <input type="date" name="fecha_nacimiento" required>
        <button type="submit" name="ingresar" class="ingresar-boton">Ingresar</button>
        <button type="submit" name="consultar">Consultar</button>
    </form>

    <!-- INGRESO DE INQUILINOS -->
    <?php
    if (isset($_POST["ingresar"])) {
        $dpi = $_POST["dpi"];
        $numero_casa = $_POST["numero_casa"];
        $primer_nombre = $_POST["primer_nombre"];
        $primer_apellido = $_POST["primer_apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];

        $conn = new mysqli("localhost", "desarrollo_web", "@Starks2025", "desarrollo_web");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "INSERT INTO inquilinos (dpi, numero_casa, primer_nombre, primer_apellido, fecha_nacimiento) 
                VALUES ('$dpi', '$numero_casa', '$primer_nombre', '$primer_apellido', '$fecha_nacimiento')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='mensaje aldia'>Inquilino ingresado correctamente.</div>";
        } else {
            echo "<div class='mensaje pendiente'>Error: " . $conn->error . "</div>";
        }

        $conn->close();
    }
    ?>

       <!-- CONSULTA DE INQUILINOS -->
    <?php
    if (isset($_POST["consultar"])) {
        $dpi = $_POST["dpi"];
        $numero_casa = $_POST["numero_casa"];
        $primer_nombre = $_POST["primer_nombre"];
        $primer_apellido = $_POST["primer_apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];


        $conn = new mysqli("localhost", "desarrollo_web", "@Starks2025", "desarrollo_web");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }


        $sql = "SELECT * FROM inquilinos WHERE dpi='$dpi' AND numero_casa='$numero_casa' AND primer_nombre='$primer_nombre' AND primer_apellido='$primer_apellido' AND fecha_nacimiento='$fecha_nacimiento'";   
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $mes = date('n');
            $año = date('Y');

            $sql_pago = "SELECT * FROM pagodecuotas WHERE numero_casa='$numero_casa' AND mes='$mes' AND año='$año'";

            $result_pago = $conn->query($sql_pago);

            if ($result_pago->num_rows > 0) {
                echo "<div class='mensaje aldia'>El inquilino está al día con sus pagos.</div>";
            } else {
                echo "<div class='mensaje pendiente'>El inquilino tiene pagos pendientes.</div>";
            }
        } else {
            echo "<div class='mensaje pendiente'>No se encontró ningún inquilino con los datos proporcionados.</div>";
        }

        $conn->close();
    }
    ?>
</body>
</html>