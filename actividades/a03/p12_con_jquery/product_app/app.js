$(document).ready(function() {
    // Variable para saber si estamos editando o agregando
    let edit = false;

    // Ocultar la barra de estado al inicio
    $('#product-result').hide();
    
    // Cargar productos al iniciar
    listarProductos();

    // --- FUNCIÓN PARA LISTAR PRODUCTOS ---
    function listarProductos() {
        // ... (Tu código de listarProductos va aquí, sin cambios) ...
    }

    // --- BÚSQUEDA (Tu lógica original) ---
    $('#search').keyup(function() {
        // ... (Tu código de búsqueda va aquí, sin cambios) ...
    });


    // --- ¡NUEVO! INSTRUCCIÓN 5: VALIDACIÓN ASÍNCRONA DE NOMBRE ---
    $('#nombre').keyup(function() {
        // Solo verificamos si hay algo escrito
        if ($('#nombre').val()) {
            let nombre = $('#nombre').val();
            // Obtenemos el ID del producto (será 0 si es nuevo, o un valor si se está editando)
            let id = $('#productId').val() || 0; 

            // Llamada AJAX al nuevo script
            $.post('./backend/product-check-name.php', { nombre: nombre, id: id }, (response) => {
                
                // Convertimos la respuesta JSON en un objeto
                let respuesta = JSON.parse(response);

                // Mostramos el mensaje de estado debajo del campo 'nombre'
                if (respuesta.existe) {
                    $('#estado_nombre').text('Este nombre de producto ya existe.');
                    $('#estado_nombre').removeClass('text-success').addClass('text-danger');
                } else {
                    $('#estado_nombre').text('Nombre disponible.');
                    $('#estado_nombre').removeClass('text-danger').addClass('text-success');
                }
            });
        } else {
            // Si el campo está vacío, limpiamos el mensaje
            $('#estado_nombre').text('');
        }
    });
    // --- FIN DE LA SECCIÓN NUEVA ---


    // --- INSTRUCCIONES 3.1 y 4: VALIDACIÓN DE CAMPOS (al salir del foco) ---
    $('#product-form input').blur(function() {
        // Evitamos que la validación de 'requerido' se active en 'nombre'
        // si ya tiene un mensaje de la validación asíncrona.
        if ($(this).attr('id') === 'nombre' && $('#estado_nombre').text() !== '') {
            return; 
        }
        validarCampo(this);
    });

    // --- FUNCIÓN DE SUBMIT DEL FORMULARIO ---
    $('#product-form').submit(e => {
        // ... (Tu código de submit va aquí, sin cambios) ...
        // ... (Asegúrate de que la validación aquí adentro siga funcionando) ...
    });

    // --- ELIMINAR PRODUCTO ---
    $(document).on('click', '.product-delete', (e) => {
        // ... (Tu código de eliminar va aquí, sin cambios) ...
    });

    // --- CARGAR PRODUCTO EN FORMULARIO ---
    $(document).on('click', '.product-item', (e) => {
        // ... (Tu código de cargar producto va aquí, sin cambios) ...
        
        // Importante: Limpiamos los estados de error al cargar un producto
        $('#product-form small').text('');
    });

    // --- FUNCIONES AUXILIARES ---

    /**
     * Valida un campo individual (Instrucción 3.1 y 4)
     */
    function validarCampo(campo) {
        let esRequerido = $(campo).prop('required');
        let valor = $(campo).val();
        let $estado = $(campo).next('small'); // El <small> asociado

        if (esRequerido && valor.trim() === '') {
            $estado.text('Este campo es requerido.'); // Muestra el mensaje
            $estado.removeClass('text-success').addClass('text-warning');
            return false;
        }

        // No borramos el mensaje del campo 'nombre' si es de la validación asíncrona
        if ($(campo).attr('id') !== 'nombre') {
             $estado.text(''); // Limpiar estado si es válido
        }
        return true;
    }

    /**
     * Reinicia el formulario al estado original (VERSIÓN CORREGIDA)
     */
    function reiniciarFormulario() {
        edit = false;
        $('#product-form').trigger('reset');
        $('#productId').val('');
        $('#btn-submit').text('Agregar Producto');
        // Se elimina la línea que borraba el estado global
        $('#product-form small').text('');
    }

});