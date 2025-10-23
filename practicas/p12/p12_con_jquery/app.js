// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// Función init() para cargar valores iniciales
function init() {
  // Cargar JSON base en el textarea usando jQuery
  var JsonString = JSON.stringify(baseJSON,null,2);
  $('#description').val(JsonString);
  
  // Cargar productos al iniciar (Requisito 4.i)
  fetchProducts(); 
}

// Se mueve la definición de fetchProducts al ámbito global
function fetchProducts() {
  $.ajax({
    url: 'backend/product-list.php',
    type: 'GET',
    success: function(response) {
      const products = JSON.parse(response);
      let template = '';
      products.forEach(product => {
        // --- INICIO DE PLANTILLA DE TABLA (CON FORMATO DE LISTA) ---
        template += `
                <tr productId="${product.id}">
                <td>${product.id}</td>
                <td>
                <a href="#" class="product-item">
                  ${product.nombre} 
                </a>
                </td>
                <td>
                  <ul class="list-unstyled">
                    <li><strong>Precio:</strong> ${product.precio}</li>
                    <li><strong>Unidades:</strong> ${product.unidades}</li>
                    <li><strong>Modelo:</strong> ${product.modelo}</li>
                    <li><strong>Marca:</strong> ${product.marca}</li>
                    <li><strong>Detalles:</strong> ${product.detalles}</li>
                  </ul>
                </td>
                <td>
                  <button class="product-delete btn btn-danger">
                   Eliminar
                  </button>
                </td>
                </tr>
              `
        // --- FIN DE PLANTILLA DE TABLA ---
      });
      $('#products').html(template);
    }
  });
}

/**
 * Muestra un mensaje temporal sobre la tabla de productos.
 * @param {string} status - 'success' o 'error'
 * @param {string} message - El mensaje a mostrar
 */
function showApiMessage(status, message) {
  // Remover cualquier mensaje anterior
  $('#api-message').remove(); 

  // Crear el HTML del mensaje (estilo de la captura de pantalla)
  const messageHtml = `
    <div id="api-message" class="card bg-dark text-white my-2 p-3" style="font-family: monospace; white-space: pre-wrap;">status: ${status}\nmessage: ${message}</div>
  `;
  
  // Insertar el mensaje antes de la tabla
  $('table.table-bordered').before(messageHtml);

  // Hacer que desaparezca después de 3 segundos
  setTimeout(function() {
    $('#api-message').fadeOut('slow', function() {
      $(this).remove();
    });
  }, 3000); // 3 segundos
}


$(document).ready(function() {
  // Llamar a la función de inicialización
  init();

  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jQuery está funcionando');
  
  // Ocultar barra de resultados de búsqueda
  $('#product-result').hide();
  
  // Evento keyup para búsqueda (Requisito 4.ii y 4.iii)
  $('#search').keyup(function() {
    if($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: 'backend/product-search.php', 
        data: {search},
        type: 'GET', // Coincide con $_GET en product-search.php
        success: function (response) {
          if(!response.error) {
            let products = JSON.parse(response);
            
            let template_list = '';
            let template_table = '';
            
            products.forEach(product => {
              // Plantilla para la lista desplegable
              template_list += `
                     <li><a href="#" class="product-item" productId="${product.id}">${product.nombre}</a></li>
                    `;
              
              // --- INICIO DE PLANTILLA DE TABLA (CON FORMATO DE LISTA) ---
              template_table += `
                <tr productId="${product.id}">
                <td>${product.id}</td>
                <td>
                <a href="#" class="product-item">
                  ${product.nombre} 
                </a>
                </td>
                <td>
                  <ul class="list-unstyled">
                    <li><strong>Precio:</strong> ${product.precio}</li>
                    <li><strong>Unidades:</strong> ${product.unidades}</li>
                    <li><strong>Modelo:</strong> ${product.modelo}</li>
                    <li><strong>Marca:</strong> ${product.marca}</li>
                    <li><strong>Detalles:</strong> ${product.detalles}</li>
                  </ul>
                </td>
                <td>
                  <button class="product-delete btn btn-danger">
                   Eliminar
                  </button>
                </td>
                </tr>
              `;
              // --- FIN DE PLANTILLA DE TABLA ---
            });
            
            $('#product-result').show();
            $('#container').html(template_list);
            $('#products').html(template_table); // Actualiza la tabla principal
          }
        } 
      })
    } else {
      // Si la búsqueda está vacía, oculta la lista y muestra todos los productos
      $('#product-result').hide();
      fetchProducts(); 
    }
  });

  // --- Evento submit para AGREGAR / EDITAR ---
  // (Coincide con product-add.php que espera JSON crudo)
  $('#product-form').submit(e => {
    e.preventDefault();

    // 1. Obtener el nombre del input
    const nombre = $('#name').val();
    
    // 2. Obtener el JSON string del textarea
    const detallesJSONString = $('#description').val();
    let productData;

    try {
      // 3. Parsear el JSON
      productData = JSON.parse(detallesJSONString);
    } catch (error) {
      console.error("El JSON en 'detalles' no es válido:", error);
      showApiMessage('error', 'El JSON en el área de texto no es válido. Por favor, corrígelo.');
      return; // No continuar si el JSON es inválido
    }

    // 4. Sobrescribir el nombre en el objeto con el del input
    productData.nombre = nombre; 
    
    // 5. Re-stringify el objeto completo
    let dataToSend;
    
    // 6. Determinar URL (para agregar o editar)
    let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php';
    
    if (edit === true) {
      productData.id = $('#productId').val();
    }
    
    dataToSend = JSON.stringify(productData);
    console.log("Enviando JSON crudo:", dataToSend, url);
    
    // 7. Usar $.ajax para enviar datos crudos
    $.ajax({
      url: url,
      type: 'POST',
      contentType: 'application/json', // Indicar que enviamos JSON
      data: dataToSend, // Enviar el string JSON
      success: function(response) {
        
        // --- Parsear respuesta y mostrar mensaje ---
        let parsedResponse;
        try {
          parsedResponse = JSON.parse(response);
        } catch (e) {
          console.error("No se pudo parsear la respuesta JSON:", response);
          showApiMessage('error', 'Respuesta inválida del servidor.');
          return;
        }

        // --- CAMBIO AQUÍ: USAR EL NUEVO CUADRO DE MENSAJE ---
        // (Cumpliendo Requisito 4.iv)
        showApiMessage(parsedResponse.status, parsedResponse.message);

        // Actuar solo si fue exitoso
        if (parsedResponse.status === 'success') {
          $('#product-form').trigger('reset');
          
          // Recargar JSON base
          var JsonString = JSON.stringify(baseJSON,null,2);
          $('#description').val(JsonString);
          
          fetchProducts();
          edit = false;
        }
        // --- Fin de la sección de mensaje ---
      },
      error: function(xhr, status, error) {
        console.error("Error al agregar/editar producto:", error);
        showApiMessage('error', 'Error de conexión con el servidor.');
      }
    });
  });

  // --- Evento click para cargar datos para EDICIÓN ---
  // (Maneja clics de la lista y la tabla)
  $(document).on('click', '.product-item', (e) => {
    e.preventDefault();
    
    const targetLink = $(e.currentTarget); 
    let id;

    if (targetLink.closest('#container').length > 0) {
      // Clic vino de la lista de búsqueda
      id = targetLink.attr('productId');
    } else {
      // Clic vino de la tabla
      const element = targetLink.closest('tr');
      id = element.attr('productId');
    }
    
    // product-single.php debe existir en tu backend
    $.post('backend/product-single.php', {id}, (response) => { 
      const product = JSON.parse(response);
      
      // Llenar el formulario para editar
      $('#name').val(product.nombre);
      $('#productId').val(product.ID); // Asegúrate que el ID se carga
      edit = true;
      
      // Crear un JSON para el textarea basado en el producto
      const editJSON = {
         "precio": product.precio,
         "unidades": product.unidades,
         "modelo": product.modelo,
         "marca": product.marca,
         "detalles": product.detalles,
         "imagen": product.imagen
      };
      $('#description').val(JSON.stringify(editJSON, null, 2));

      // Limpiar búsqueda y recargar tabla
      $('#product-result').hide();
      $('#search').val('');
      
      // Cambiar texto del botón a "Editar"
      $('#product-form button[type="submit"]').text('Editar Producto');
    });
  });

  // --- Evento click para ELIMINAR ---
  // (Coincide con product-delete.php que espera $_GET)
  $(document).on('click', '.product-delete', (e) => {
    // Usamos 'e.currentTarget' para asegurar que tomamos el botón
    const button = $(e.currentTarget); 
    if(confirm('¿Estás seguro de que quieres eliminar este producto?')) {
      const element = button.closest('tr');
      const id = element.attr('productId');
      
      // --- CAMBIO AQUÍ: de $.post a $.get ---
      $.get('backend/product-delete.php', {id}, (response) => { 
        
        // --- CAMBIO AQUÍ: USAR EL NUEVO CUADRO DE MENSAJE ---
        let parsedResponse;
        try {
            parsedResponse = JSON.parse(response);
        } catch (e) {
            console.error("No se pudo parsear la respuesta JSON:", response);
            parsedResponse = { status: 'error', message: 'Respuesta inválida del servidor.' };
        }
        
        showApiMessage(parsedResponse.status, parsedResponse.message);

        // (Cumpliendo Requisito 4.vi)
        if(parsedResponse.status === 'success') {
            fetchProducts(); 
        }
      });
    }
  });
});

