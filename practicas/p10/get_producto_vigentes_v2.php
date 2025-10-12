<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }

    if (isset($tope)) {
        @$link = new mysqli('localhost', 'root', 'pesadilla123', 'marketzone', 3307);

        if ($link->connect_errno) {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
        }

        if ($result = $link->query("SELECT * FROM productos WHERE eliminado = $tope")) {
            $productos = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }

        $link->close();
    }
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h3>PRODUCTOS VIGENTES</h3>
    <br/>

    <?php if(isset($productos) && count($productos) > 0) : ?>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= htmlspecialchars($row['nombre']) ?></td>
                        <td><?= htmlspecialchars($row['marca']) ?></td>
                        <td><?= htmlspecialchars($row['modelo']) ?></td>
                        <td>$<?= number_format($row['precio'], 2) ?></td>
                        <td><?= $row['unidades'] ?></td>
                        <td><?= htmlspecialchars($row['detalles']) ?></td>
                        <td><img src="<?= htmlspecialchars($row['imagen']) ?>" width="100" /></td>
                        <td>
                            <a class="btn btn-warning btn-sm" 
								href="formulario_productos_v2.php?id=<?= $row['id'] ?>&nombre=<?= urlencode($row['nombre']) ?>&marca=<?= urlencode($row['marca']) ?>&modelo=<?= urlencode($row['modelo']) ?>&precio=<?= urlencode($row['precio']) ?>&unidades=<?= urlencode($row['unidades']) ?>&detalles=<?= urlencode($row['detalles']) ?>&imagen=<?= urlencode($row['imagen']) ?>">
								Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <script>alert('No se encontraron productos vigentes.');</script>
    <?php endif; ?>
</body>
</html>
