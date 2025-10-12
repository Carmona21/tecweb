<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>

  <script>
    // ======= VALIDACIONES =======
    function verificarNombre(control) {
      const nombre = control.value.trim();
      if (nombre === '' || nombre.length > 100) {
        alert('El nombre es obligatorio y debe tener 100 caracteres o menos.');
        control.focus();
        return false;
      }
      return true;
    }

    function verificarMarca(control) {
      const marca = control.value.trim();
      if (marca === '') {
        alert('Debe seleccionar una marca de la lista.');
        control.focus();
        return false;
      }
      return true;
    }

    function verificarModelo(control) {
      const modelo = control.value.trim();
      const regex = /^[a-zA-Z0-9]+$/;
      if (modelo === '' || !regex.test(modelo) || modelo.length > 25) {
        alert('El modelo debe ser alfanumérico y tener máximo 25 caracteres.');
        control.focus();
        return false;
      }
      return true;
    }

    function verificarPrecio(control) {
      const precio = parseFloat(control.value);
      if (isNaN(precio) || precio <= 99.99) {
        alert('El precio debe ser un número mayor a 99.99.');
        control.focus();
        return false;
      }
      return true;
    }

    function verificarDetalles(control) {
      const detalles = control.value.trim();
      if (detalles.length > 250) {
        alert('Los detalles no deben exceder los 250 caracteres.');
        control.focus();
        return false;
      }
      return true;
    }

    function verificarUnidades(control) {
      const unidades = parseInt(control.value);
      if (isNaN(unidades) || unidades < 0) {
        alert('Las unidades deben ser un número mayor o igual a 0.');
        control.focus();
        return false;
      }
      return true;
    }

    function verificarImagen(control) {
      if (control.value.trim() === '') {
        control.value = "img/imagen.png";
      }
      return true;
    }

    // Validar todo el formulario antes de enviar
    function validarFormulario() {
      const nombre = document.getElementById('form-nombre');
      const marca = document.getElementById('form-marca');
      const modelo = document.getElementById('form-modelo');
      const precio = document.getElementById('form-precio');
      const detalles = document.getElementById('form-detalles');
      const unidades = document.getElementById('form-unidades');
      const imagen = document.getElementById('form-imagen');

      if (!verificarNombre(nombre)) return false;
      if (!verificarMarca(marca)) return false;
      if (!verificarModelo(modelo)) return false;
      if (!verificarPrecio(precio)) return false;
      if (!verificarDetalles(detalles)) return false;
      if (!verificarUnidades(unidades)) return false;
      if (!verificarImagen(imagen)) return false;

      return true;
    }
  </script>
</head>
<body>
  <h1>Editar Producto</h1>

  <form id="formulario" action="update_producto.php" method="post" onsubmit="return validarFormulario();">
    <fieldset>
      <legend>Detalles del Producto</legend>
      <ul style="list-style: none; padding: 0;">
        <li>
          <label for="form-nombre">Nombre:</label>
          <input type="text" name="nombre" id="form-nombre"
                 value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
        </li>

        <li>
          <label for="form-marca">Marca:</label>
          <select name="marca" id="form-marca">
            <option value="">--Seleccione una marca--</option>
            <option value="Samsung" <?= (isset($_GET['marca']) && $_GET['marca']=='Samsung')?'selected':'' ?>>Samsung</option>
            <option value="Apple" <?= (isset($_GET['marca']) && $_GET['marca']=='Apple')?'selected':'' ?>>Apple</option>
            <option value="Sony" <?= (isset($_GET['marca']) && $_GET['marca']=='Sony')?'selected':'' ?>>Sony</option>
            <option value="Huawei" <?= (isset($_GET['marca']) && $_GET['marca']=='Huawei')?'selected':'' ?>>Huawei</option>
          </select>
        </li>

        <li>
          <label for="form-modelo">Modelo:</label>
          <input type="text" name="modelo" id="form-modelo"
                 value="<?= isset($_GET['modelo']) ? htmlspecialchars($_GET['modelo']) : '' ?>">
        </li>

        <li>
          <label for="form-precio">Precio:</label>
          <input type="number" step="0.01" name="precio" id="form-precio"
                 value="<?= isset($_GET['precio']) ? htmlspecialchars($_GET['precio']) : '' ?>">
        </li>

        <li>
          <label for="form-unidades">Unidades:</label>
          <input type="number" name="unidades" id="form-unidades"
                 value="<?= isset($_GET['unidades']) ? htmlspecialchars($_GET['unidades']) : '' ?>">
        </li>

        <li>
          <label for="form-detalles">Detalles:</label><br>
          <textarea name="detalles" id="form-detalles" rows="4" cols="60"><?= isset($_GET['detalles']) ? htmlspecialchars($_GET['detalles']) : '' ?></textarea>
        </li>

        <li>
          <label for="form-imagen">Imagen (ruta o URL):</label>
          <input type="text" name="imagen" id="form-imagen"
                 value="<?= isset($_GET['imagen']) ? htmlspecialchars($_GET['imagen']) : '' ?>">
        </li>
      </ul>

      <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">

      <p>
        <input type="submit" value="Actualizar Producto">
        <input type="reset" value="Restablecer">
      </p>
    </fieldset>
  </form>
</body>
</html>
