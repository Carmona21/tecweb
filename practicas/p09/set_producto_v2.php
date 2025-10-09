<?php
$nombre   = $_POST['nombre_producto'];
$marca    = $_POST['marca_producto'];
$modelo   = $_POST['modelo_producto'];
$precio   = floatval($_POST['precio']);
$detalles = $_POST['detalles_producto'];
$unidades = intval($_POST['unidades']);

// Conexión a la base de datos
@$link = new mysqli('localhost', 'root', 'pesadilla123', 'marketzone', 3307);

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($marca) || empty($modelo)) {
    die('<h3>Debes llenar todos los campos obligatorios.</h3>');
}

// Validar duplicados
$check = $link->prepare("SELECT id FROM productos WHERE nombre=? OR modelo=? OR marca=?");
$check->bind_param("sss", $nombre, $modelo, $marca);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    die('<h3>El producto ya existe (nombre, modelo o marca duplicados).</h3>');
}

$check->close();

// Subir imagen
$directorio = "img/";
if (!is_dir($directorio)) {
    mkdir($directorio, 0777, true);
}

$nombreArchivo = basename($_FILES["imagen"]["name"]);
$rutaDestino = $directorio . $nombreArchivo;

$ext_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
$ext = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));

if (!in_array($ext, $ext_permitidas)) {
    die('<h3>Formato de imagen no permitido. Solo JPG, PNG o GIF.</h3>');
}

if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
    $imagen = $rutaDestino;
} else {
    die('<h3>Error al subir la imagen.</h3>');
}

// $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado)
//         VALUES (?, ?, ?, ?, ?, ?, ?, 0)";

$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $link->prepare($sql);
$stmt->bind_param("sssdsis", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen);

if ($stmt->execute()) {
    echo "<h2>Producto insertado correctamente</h2>";
} else {
    echo "<h3>Error al insertar el producto: {$stmt->error}</h3>";
}

$stmt->close();
$link->close();
?>
