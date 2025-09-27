<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Ejercicio 5</title>
</head>
<body>
    <h2>Resultado del Ejercicio 5</h2>

    <?php
    require 'src/funciones.php';

    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    echo '<p>' . ejercicio5($edad, $sexo) . '</p>';
    ?>
</body>
</html>
