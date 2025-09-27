<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Ejercicio 5</title>
</head>
<body>
    <h2>Resultado del Ejercicio 6</h2>

    <?php
    require 'src/funciones.php';

    $matricula = $_POST['matricula'];

    echo '<p>' . ejercicio6($matricula) . '</p>';
    ?>
</body>
</html>