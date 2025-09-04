<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página PHP</title>
</head>
<body>
    <hr/>
    <?php
    echo "<div><h1 style=\"border-width:3px; border-style:groove; background-color:#ffcc99;\"> 
    Final de la página PHP Vínculos útiles : 
    <a href=\"php.net\">php.net</a>
    &nbsp; 
    <a href=\"mysql.org\">mysql.org</a>
    </h1></div>";

    echo "<div>Nombre del archivo ejecutado: " . $_SERVER['PHP_SELF'] . "&nbsp;&nbsp;&nbsp;";
    echo "Nombre del archivo incluido: " . __FILE__ . "</div>";
    ?>
</body>
</html>
