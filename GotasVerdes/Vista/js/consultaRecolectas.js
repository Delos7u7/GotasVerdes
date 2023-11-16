$(document).ready(function () {
    var idRecolecta; // Definir la variable idRecolecta fuera de la función actualizarTabla()

    function actualizarTabla() {
        $.ajax({
            url: '../../Controlador/ctrlRecolectas.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var tableBody = '';
                for (var i = 0; i < data.length; i++) {
                    tableBody += '<tr>';
                    tableBody += '<td>' + data[i].id_recolecta + '</td>'; // Agregar ID de recolecta
                    tableBody += '<td>' + data[i].nombreUsuario_recolecta + '</td>';
                    tableBody += '<td>' + data[i].cantidad_recolecta + '</td>';
                    tableBody += '<td>' + data[i].direccion_recolecta + '</td>';
                    tableBody += '<td>' + data[i].fecha_recolecta + '</td>';
                    tableBody += '<td>' + (data[i].status_recolecta === 0 ? 'Pendiente' : 'Recolectado') + '</td>';
                    tableBody += '<td><button class="btn btn-success asignar-btn" data-bs-toggle="modal" data-bs-target="#modalAsignarRecolector" data-id-recolecta="' + data[i].id_recolecta + '">Asignar</button></td>'; // Botón en cada fila con atributo data
                    tableBody += '</tr>';
                }
                $('#tbody-dinamico').html(tableBody);

                // Agregar evento clic al botón
                $('.asignar-btn').click(function () {
                    idRecolecta = $(this).data('id-recolecta'); // Asignar el valor de idRecolecta al hacer clic en el botón
                });
            }
        });
    }

    $('#modalAsignarRecolector').on('click', '.btn-success', function () {
        var idRecolector = $('#selectRecolector').val(); // ID del recolector seleccionado
        window.location.href = "../../Controlador/ctrlSeleccion.php?idRecolecta=" + idRecolecta + "&idRecolector=" + idRecolector + "&idRecolector=" + idRecolector;
    });

    setInterval(actualizarTabla, 2000);

    actualizarTabla();
});

