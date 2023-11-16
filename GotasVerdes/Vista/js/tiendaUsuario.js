document.getElementById('carrito-boton').addEventListener('click', function () {
    // Obtiene los valores de los inputs
    var inputValues = [
        parseInt(document.getElementById('input-minus-plus-1').value, 10) || 0,
        parseInt(document.getElementById('input-minus-plus-2').value, 10) || 0,
        parseInt(document.getElementById('input-minus-plus-3').value, 10) || 0,
        parseInt(document.getElementById('input-minus-plus-4').value, 10) || 0
    ];

    // Verifica si todos los valores de los inputs son iguales a 0
    if (inputValues.every(value => value === 0)) {
        alert('Debes seleccionar al menos un producto antes de redimir puntos.');
    } else {
        // Construye el cuerpo de la solicitud POST con los valores de los productos
        var formData = new FormData();
        formData.append('input_minus_plus_1', inputValues[0]);
        formData.append('input_minus_plus_2', inputValues[1]);
        formData.append('input_minus_plus_3', inputValues[2]);
        formData.append('input_minus_plus_4', inputValues[3]);

        // Realiza la solicitud POST al servidor
        fetch('../../Controlador/ctrlTicketUsuario.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Maneja la respuesta del servidor (si es necesario)
            window.location.href = '../usuario/ticketUsuario.php';
        })
        .catch(error => {
            console.error('Error al enviar datos al servidor:', error);
        });
    }
});
// Función para obtener y actualizar los puntos de usuario
function actualizarPuntosUsuario() {
    fetch('../../Controlador/ctrlTiendaUsuario.php')
        .then(response => response.json())
        .then(data => {
            var puntosUsuario = data.puntos;
            // Actualiza el contenido del elemento 'points-user'
            var puntosElement = document.getElementById('points-user');
            puntosElement.textContent = puntosUsuario.toString();

            // Actualiza la variable 'puntosint' con el valor actual
            puntosint = parseInt(puntosUsuario, 10);
        })
        .catch(error => {
            console.error('Error al obtener puntos del usuario: ' + error);
        });
}

document.addEventListener("DOMContentLoaded", function () {
    actualizarPuntosUsuario();
});


document.querySelector('.carrito-compras-boton').addEventListener('click', function () {
    // Obtiene los puntos del usuario desde el elemento HTML
    var puntosUsuario = parseInt(document.getElementById('points-user').textContent, 10);

    // Obtiene los valores de los inputs
    var inputValues = [
        parseInt(document.getElementById('input-minus-plus-1').value, 10) || 0,
        parseInt(document.getElementById('input-minus-plus-2').value, 10) || 0,
        parseInt(document.getElementById('input-minus-plus-3').value, 10) || 0,
        parseInt(document.getElementById('input-minus-plus-4').value, 10) || 0
    ];

    // Verifica si todos los valores de los inputs son iguales a 0
    if (inputValues.every(value => value === 0)) {
        alert('Debes seleccionar al menos un producto antes de comprar.');
    } else {
        // Realiza la solicitud AJAX solo si al menos un valor de los inputs es mayor que 0
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Controlador/ctrlActualizarPuntos.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.mensaje) {
                        alert(response.mensaje);
                        // Recarga la página para reflejar los cambios
                        location.reload();
                    } else if (response.error) {
                        alert(response.error);
                    }
                }
            }
        };
        xhr.send('puntos_actualizados=' + puntosUsuario);
    }
});




// Obtén el elemento 'points-user' y almacénalo en una variable
var puntosElement = document.getElementById('points-user');
var puntosOb = puntosElement.textContent;
var puntosint = parseInt(puntosOb, 10);
var puntosactuales = 0;

// Suma y resta 1
document.getElementById('plus-1').addEventListener('click', sumar1);
document.getElementById('minus-1').addEventListener('click', restar1);
var resultado1 = 0;
var input1;
var valor = 200;
var p = document.getElementById('not-enought-coins');

function sumar1() {
    if (puntosint >= valor) {
        resultado1 = resultado1 + 1;
        input1 = document.getElementById('input-minus-plus-1');
        input1.value = resultado1;
        puntosactuales = (puntosint - valor);
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    } else if (puntosint < valor) {
        p.style.display = "block";
    }
}

function restar1() {
    if (resultado1 <= 0) {
        resultado1 = resultado1 - 1;
        input1 = document.getElementById('input-minus-plus-1');
        input1.value = 0;
        resultado1 = 0;
    } else {
        p.style.display = "none";
        resultado1 = resultado1 - 1;
        input1 = document.getElementById('input-minus-plus-1');
        input1.value = resultado1;
        puntosactuales = (puntosint + valor); // Aquí hay un error
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    }
}

// Suma y resta 2
document.getElementById('plus-2').addEventListener('click', sumar2);
document.getElementById('minus-2').addEventListener('click', restar2);
var resultado2 = 0;
var input2;
var valor2 = 300;
var p2 = document.getElementById('not-enought-coins2');

function sumar2() {
    if (puntosint >= valor2) {
        resultado2 = resultado2 + 1;
        input2 = document.getElementById('input-minus-plus-2');
        input2.value = resultado2;
        puntosactuales = (puntosint - valor2);
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    } else if (puntosint < valor2) {
        p2.style.display = "block";
    }
}

function restar2() {
    if (resultado2 <= 0) {
        resultado2 = resultado2 - 1;
        input2 = document.getElementById('input-minus-plus-2');
        input2.value = 0;
        resultado2 = 0;
    } else {
        p.style.display = "none";
        resultado2 = resultado2 - 1;
        input2 = document.getElementById('input-minus-plus-2');
        input2.value = resultado2;
        puntosactuales = (puntosint + valor2); // Aquí hay un error
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    }
}



// Suma y resta 3
document.getElementById('plus-3').addEventListener('click', sumar3);
document.getElementById('minus-3').addEventListener('click', restar3);
var resultado3 = 0;
var input3;
var valor3 = 400; // Cambiar el valor según corresponda
var p3 = document.getElementById('not-enought-coins3');

function sumar3() {
    if (puntosint >= valor3) {
        resultado3 = resultado3 + 1;
        input3 = document.getElementById('input-minus-plus-3');
        input3.value = resultado3;
        puntosactuales = (puntosint - valor3);
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    } else if (puntosint < valor3) {
        p3.style.display = "block";
    }
}

function restar3() {
    if (resultado3 <= 0) {
        resultado3 = resultado3 - 1;
        input3 = document.getElementById('input-minus-plus-3');
        input3.value = 0;
        resultado3 = 0;
    } else {
        p3.style.display = "none";
        resultado3 = resultado3 - 1;
        input3 = document.getElementById('input-minus-plus-3');
        input3.value = resultado3;
        puntosactuales = (puntosint + valor3);
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    }
}

// Suma y resta 4
document.getElementById('plus-4').addEventListener('click', sumar4);
document.getElementById('minus-4').addEventListener('click', restar4);
var resultado4 = 0;
var input4;
var valor4 = 800; // Cambiar el valor según corresponda
var p4 = document.getElementById('not-enought-coins4');

function sumar4() {
    if (puntosint >= valor4) {
        resultado4 = resultado4 + 1;
        input4 = document.getElementById('input-minus-plus-4');
        input4.value = resultado4;
        puntosactuales = (puntosint - valor4);
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    } else if (puntosint < valor4) {
        p4.style.display = "block";
    }
}

function restar4() {
    if (resultado4 <= 0) {
        resultado4 = resultado4 - 1;
        input4 = document.getElementById('input-minus-plus-4');
        input4.value = 0;
        resultado4 = 0;
    } else {
        p4.style.display = "none";
        resultado4 = resultado4 - 1;
        input4 = document.getElementById('input-minus-plus-4');
        input4.value = resultado4;
        puntosactuales = (puntosint + valor4);
        puntosElement.textContent = puntosactuales.toString();
        puntosint = puntosactuales;
    }
}
