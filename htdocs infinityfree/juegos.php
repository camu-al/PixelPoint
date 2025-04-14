<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de juegos de PixelPoint</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <table class="table table-bordered">
        <thead>
            <th>Juego</th>
            <th>Precio</th>
            <th>Género</th>
        </thead>
        <tbody>
            <?php
                // Connectar a la BD
                $connexioBD = mysqli_connect("sql113.infinityfree.com", "if0_38591250", "adminPixelPoint", "if0_38591250_pixelpoint");
                
                if(!$connexioBD) {
                    die("Connexió fallida: " . mysqli_error($connexioBD));
                } else {
                    // Obtenir llistat d'usuaris
                    $sql = "SELECT nombreJuego, precio, genero FROM juegos";
                    $result = mysqli_query($connexioBD, $sql);
                    
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['nombreJuego']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['precio']) . "€</td>";
                                echo "<td>" . htmlspecialchars($row['genero']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        die("Error en la consulta: " . mysqli_error($connexioBD));
                    }
                }
            ?>
        </tbody>
    </table>

</body>
</html>