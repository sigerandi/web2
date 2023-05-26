<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
        <link rel="icon" type="image/x-icon" href="https://yt3.ggpht.com/a/AGF-l7_KZ5Hw_JMujdmt1Uga3RuuIFsWxN-uLjv7zA=s900-c-k-c0xffffffff-no-rj-mo">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav>
        <div class="nav-wrapper black">
            <a href="index.html" class="brand-logo">FES Aragón</a>
        </div>
    </nav>
    <?php
    $host = "";
    $usuario = "";
    $contra = "";
    $bd = "";

    $conn = new mysqli($host, $usuario, $contra, $bd);

    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
        <form class="col s8 offset-s2" action="eliminar.php" method="post">
        <div class="form-field col s12">
        <label for="cuenta">Número de cuenta</label>
        <input placeholder="Número de cuenta" name="cuenta" type="text" class="validate" required>
    </div>
    <button type="submit" class="offset-s3 waves-effect waves-light btn blue-grey darken-4 col s6">Enviar</button>
    </form>';
        echo "<table>";
        echo "<tr><th>Número de Cuenta</th><th>Nombre Completo</th><th>Correo</th><th>Carrera</th><th>Fecha de Registro</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['cuenta'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "<td>" . $row['carrera'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No hay alumnos aún.";
    }

    $conn->close();
    ?>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>