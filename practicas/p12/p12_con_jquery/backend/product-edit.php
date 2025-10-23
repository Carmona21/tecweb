<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Error al actualizar el producto'
    );
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);
        
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $conexion->set_charset("utf8");

        // --- CORRECCIÓN: Convertir explícitamente a números ---
        // Esto evita errores si el JSON envía "100.00" en lugar de 100.00
        $precio = (float) $jsonOBJ->precio;
        $unidades = (int) $jsonOBJ->unidades;
        $id = (int) $jsonOBJ->id;
        
        // Query de actualización (usando las variables convertidas)
        $sql = "UPDATE productos SET 
                    nombre = '{$jsonOBJ->nombre}', 
                    marca = '{$jsonOBJ->marca}', 
                    modelo = '{$jsonOBJ->modelo}', 
                    precio = {$precio}, 
                    detalles = '{$jsonOBJ->detalles}', 
                    unidades = {$unidades}, 
                    imagen = '{$jsonOBJ->imagen}' 
                WHERE id = {$id}";

        if($conexion->query($sql)){
            $data['status'] =  "success";
            $data['message'] =  "Producto actualizado";
        } else {
            $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
        }

        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>

