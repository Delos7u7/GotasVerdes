document.addEventListener('DOMContentLoaded', function () {
    // Obtener el ID de usuario o correo/telefono del usuario logeado
    const userIdentifier = '<?php echo $userIdentifier; ?>';

    // Realizar la solicitud AJAX para obtener la última compra
    $.ajax({
        url: '../../Controlador/ctrlSeguimientoUsuario.php',
        type: 'POST',
        dataType: 'json',
        data: { userIdentifier: userIdentifier },
        success: function (data) {
            // Verificar si hay resultados
            if (data.length > 0) {
                // Iterar sobre cada detalle de la compra e imprimir en la consola
                data.forEach(function (detalle) {
                    console.log('ID Compra:', detalle.id_compra);
                    console.log('Fecha de Compra:', detalle.fecha_compra);
                    console.log('Estado de Compra:', detalle.status_compra);
                    console.log('Cantidad:', detalle.cantidad);
                    console.log('ID Producto:', detalle.id_producto);
                    console.log('Nombre del Producto:', detalle.nombre_producto);
                    console.log('---------------------');

                    // Crear una cadena con la información de los detalles
                    var detallesPedidoHtml = '<p>ID Compra: ' + detalle.id_compra + '</p>';
                    detallesPedidoHtml += '<p>Fecha de Compra: ' + detalle.fecha_compra + '</p>';
                    detallesPedidoHtml += '<p>Estado de Compra: ' + detalle.status_compra + '</p>';
                    detallesPedidoHtml += '<p>Cantidad: ' + detalle.cantidad + '</p>';
                    detallesPedidoHtml += '<p>ID Producto: ' + detalle.id_producto + '</p>';
                    detallesPedidoHtml += '<p>Nombre del Producto: ' + detalle.nombre_producto + '</p>';
                    detallesPedidoHtml += '---------------------';

                    // Actualizar el elemento con el ID "detallesPedido"
                    $('#detallesPedido').append(detallesPedidoHtml);

                    // Ajustar el estilo de los elementos según el status_compra
                    if (detalle.status_compra === 1) {
                        $('#miSvg1').show();
                        $('#miSvg2').hide();
                        $('#miSvg3').hide();
                    } else if (detalle.status_compra === 2) {
                        $('#miSvg1').hide();
                        $('#miSvg2').show().css('vertical-align', 'middle');
                        $('#miSvg3').hide();
                    } else if (detalle.status_compra === 3) {
                        $('#miSvg1').hide();
                        $('#miSvg2').hide();
                        $('#miSvg3').show().css('vertical-align', 'text-bottom');
                    }
                });
            } else {
                console.log('No se encontraron compras.');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Obtener el ID de usuario o correo/telefono del usuario logeado
    const userIdentifier = '<?php echo $userIdentifier; ?>';

    // Realizar la solicitud AJAX para obtener la dirección de recolecta
    $.ajax({
        url: '../../Controlador/ctrlSeguimientoRecolectaUsuario.php',
        type: 'POST',
        dataType: 'json',
        data: { userIdentifier: userIdentifier },
        success: function (data) {
            // Verificar si hay resultados
            if (data.direccion_recolecta) {
                console.log('Dirección de recolecta:', data.direccion_recolecta);
                $('#direccionPedido').text(data.direccion_recolecta);
            } else {
                console.log('No se encontró dirección de recolecta.');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
        }
    });
});