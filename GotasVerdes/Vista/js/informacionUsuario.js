$(document).ready(function () {

    function actualizarTabla() {
        $.ajax({
            url: '../../Controlador/ctrlInfoUsuario.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var tableBody = '';
                for (var i = 0; i < data.length; i++) {
                    tableBody += '<tr>';
                    tableBody += '<td>' + data[i].nombre_usuario + '</td>';
                    tableBody += '<td>' + data[i].correo_usuario + '</td>';
                    tableBody += '<td>' + data[i].telefono_usuario + '</td>';
                    tableBody += '</tr>';
                }
                $('#tbody-dinamico').html(tableBody);
            }
        });
    }

    setInterval(actualizarTabla, 2000);

    actualizarTabla();
});
