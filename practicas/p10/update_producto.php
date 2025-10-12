<?php
$link = new mysqli('localhost', 'root', 'pesadilla123', 'marketzone', 3307);

if ($link->connect_errno) {
    die('Error al conectar con la base de datos: ' . $link->connect_error);
}

$id       = (int)$_POST['id'];
$nombre   = $link->real_escape_string($_POST['nombre']);
$marca    = $link->real_escape_string($_POST['marca']);
$modelo   = $link->real_escape_string($_POST['modelo']);
$precio   = (float)$_POST['precio'];
$unidades = (int)$_POST['unidades'];
$detalles = $link->real_escape_string($_POST['detalles']);
$imagen   = $link->real_escape_string($_POST['imagen']);

$sql = "UPDATE productos 
        SET nombre='$nombre', 
            marca='$marca', 
            modelo='$modelo',
            precio=$precio, 
            unidades=$unidades, 
            detalles='$detalles', 
            imagen='$imagen'
        WHERE id=$id";

if ($link->query($sql)) {
    echo "<script>alert('Producto actualizado correctamente.');</script>";
} else {
    echo "Error al actualizar: " . $link->error;
}

$link->close();
?>
