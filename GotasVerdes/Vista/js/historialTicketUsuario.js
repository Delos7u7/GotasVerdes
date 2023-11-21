const urlParams = new URLSearchParams(window.location.search);
const idCompra = urlParams.get('idCompra');

// Mostrar en la consola para verificar
console.log('ID de Compra:', idCompra);

// Enviar el ID de compra a través de una solicitud AJAX
$.ajax({
    url: '../../Controlador/ctrlHistorialTicketUsuario.php',
    type: 'POST',  // Puedes ajustar el tipo de solicitud según tus necesidades
    dataType: 'json',
    data: { idCompra: idCompra },
    success: function (response) {
        console.log('Respuesta del servidor:', response);

        // Actualizar elementos en tu interfaz con los detalles de la compra
        $('#dateCompra').text(response.fechaCompra);
        $('#idCompra').text(response.idCompra);

        // Mostrar productos y cantidades
        mostrarProductosYcantidades(response.detallesCompra);

        // Total
        $('#totaldropcoin').text('Total DropCoins: ' + response.totalCompra);

        // Puedes realizar acciones adicionales con la respuesta si es necesario
    },
    error: function (jqXHR, textStatus, errorThrown) {
        console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
    }
});

// Función para mostrar productos y cantidades en tu interfaz
function mostrarProductosYcantidades(detallesCompra) {
    // Obtén los elementos donde se mostrarán los productos, cantidades y el total
    var productElement = $('#product');
    var cantidadElement = $('#cantidad');

    // Limpia los elementos existentes
    productElement.empty();
    cantidadElement.empty();

    // Itera sobre los detalles de la compra
    detallesCompra.forEach(detalle => {
        // Crea nuevos elementos <p> para cada producto y cantidad
        var productP = $('<p>').text(detalle.nombre_producto);
        var cantidadP = $('<p>').text(detalle.cantidad);

        // Agrega los elementos al DOM
        productElement.append(productP);
        cantidadElement.append(cantidadP);
    });
}