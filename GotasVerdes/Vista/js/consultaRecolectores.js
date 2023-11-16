// Definir redirectToConfig fuera de $(document).ready() para que esté disponible globalmente
function redirectToConfig(nombre) {
    window.location.href = 'configuracionRecolector.php?nombre=' + nombre;
}
function redirectToHistorial(nombre) {
    nombreRecolector = nombre; // Guarda el nombre en la variable global

    // Carga el contenido del archivo en un modal usando AJAX
    $.ajax({
        url: '../administrador/historialRecolectorAdmin.php?nombre=' + nombre,
        type: 'GET',
        success: function (response) {
            $('#modal-content').html(response); // Coloca el contenido en el modal
            $('#modalHistorial').modal('show'); // Muestra el modal
        },
        error: function () {
            // Manejo de errores
            alert('Error al cargar el historial del recolector.');
        }
    });
}
$(document).ready(function () {
    let nombreRecolector; // variable para almacenar el nombre del recolector

    function updateTable() {
        $.ajax({
            url: '../../Controlador/ctrlRecolectores.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var tableContent = '<tr><th>Recolector</th><th>Estado</th><th>Historial</th><th>Configuración</th></tr>';
                $.each(data, function (index, item) {
                    tableContent += '<tr><td>' + item.nombre_recolector + '</td><td>' + (item.status_recolector === 0 ? 'Inactivo' : 'Activo') + '</td><td><button data-bs-toggle="modal" data-bs-target="#ModalHistorial" class="boton-personalizado-1" onclick="redirectToHistorial(\'' + item.nombre_recolector + '\')">ver</button></td><td><button class="boton-personalizado-2" onclick="redirectToConfig(\'' + item.nombre_recolector + '\')">Perfil</button></td></tr>';
                });
                $('#recolector-table').html(tableContent);
            }
        });
    }

    // Llama a la función para actualizar la tabla cada cierto intervalo de tiempo (por ejemplo, cada 5 segundos).
    setInterval(updateTable, 2000);
});
