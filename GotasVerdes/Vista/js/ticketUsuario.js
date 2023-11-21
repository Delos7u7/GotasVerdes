function obtenerPuntosUsuario() {
    fetch('../../Controlador/ctrlTicketUsuarioEnviado.php')
    .then(response => response.json())
    .then(data => {
        // Verifica si hay datos válidos
        if (data.idCompra && data.fechaCompra && data.detallesCompra) {
            // Asigna los valores a los elementos HTML
            document.getElementById('idCompra').textContent = data.idCompra;
            document.getElementById('dateCompra').textContent = data.fechaCompra;

            // Procesa los detalles de la compra
            mostrarProductosYcantidades(data.detallesCompra);
        } else {
            // Maneja el caso en que no hay datos
            console.log('No se encontraron datos de compra para el usuario.');
        }
    })
    .catch(error => {
        console.error('Error: ' + error);
    });
}

function mostrarProductosYcantidades(detallesCompra) {
    // Obtén los elementos donde se mostrarán los productos, cantidades y el total
    var productElement = document.getElementById('product');
    var cantidadElement = document.getElementById('cantidad');
    var totalElement = document.getElementById('totaldropcoin');

    // Limpia los elementos existentes
    productElement.innerHTML = '';
    cantidadElement.innerHTML = '';

    // Inicializa la variable para el total
    var total = 0;

    // Itera sobre los detalles de la compra
    detallesCompra.forEach(detalle => {
        // Crea nuevos elementos <p> para cada producto y cantidad
        var productP = document.createElement('p');
        var cantidadP = document.createElement('p');

        // Calcula el total para cada producto
        var subtotal = detalle.precio * detalle.cantidad;

        // Asigna el texto y agrega los elementos al DOM
        productP.textContent = detalle.nombre_producto;
        cantidadP.textContent = detalle.cantidad;

        // Agrega el subtotal al total
        total += subtotal;

        productElement.appendChild(productP);
        cantidadElement.appendChild(cantidadP);
    });

    // Muestra el total en la etiqueta con id 'totaldropcoin'
    totalElement.textContent = 'Total DropCoins: ' + total;
}

// Agrega el evento para obtener puntos al cargar la página
document.addEventListener('DOMContentLoaded', obtenerPuntosUsuario);

document.getElementById('seguimiento').addEventListener('click', mandarAlaOtra);

function mandarAlaOtra() {
    window.location.href = '../usuario/seguimientoPedidoUsuario.php'
}