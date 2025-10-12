<?php
$link = new mysqli('localhost', 'root', 'pesadilla123', 'marketzone', 3307);

if ($link->connect_errno) {
    die('Error al conectar con la base de datos: ' . $link->connect_error);
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
$detalles = $_POST['detalles'];
$imagen = $_POST['imagen'];

$sql = "UPDATE productos 
        SET nombre='$nombre', marca='$marca', modelo='$modelo',
            precio=$precio, unidades=$unidades, detalles='$detalles', imagen='$imagen'
        WHERE id=$id";

if ($link->query($sql)) {
    echo "<script>alert('Producto actualizado correctamente.');
          window.location.href='get_productos_xhtml_v2.php';</script>";
} else {
    echo "Error al actualizar: " . $link->error;
}

$link->close();
?>
