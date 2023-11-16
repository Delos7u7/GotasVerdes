document.addEventListener('DOMContentLoaded', function () {
    const inputEdad = document.querySelector('.form-box.edad .inp');
    const continuarButton = document.querySelector('#btn2');
    const edadMensaje = document.querySelector('#edadMensaje');

    // Agrega un evento de escucha al input para validar la entrada
    inputEdad.addEventListener('input', function () {
        const valor = inputEdad.value.trim();
        const numeros = valor.replace(/\D/g, ''); // Elimina caracteres no numéricos

        // Actualiza el valor del input solo con números
        inputEdad.value = numeros;

        // Verifica si hay 2 números y habilita o deshabilita el botón
        if (numeros.length === 2) {
            const edad = parseInt(numeros);
            if (edad < 18) {
                edadMensaje.textContent = 'Es necesario ser mayor de 18';
                continuarButton.disabled = true;
            } else {
                edadMensaje.textContent = ''; // Limpia el mensaje
                continuarButton.disabled = false;
            }
        } else {
            edadMensaje.textContent = ''; // Limpia el mensaje
            continuarButton.disabled = true;
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const inputCorreo = document.querySelector('.form-box.correo .inp');
    const continuarButton = document.querySelector('.form-box.correo .btn');
    const errorMsg = document.getElementById('error-msg-correo');

    inputCorreo.addEventListener('input', function (e) {
        const correo = e.target.value.trim();

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Controlador/verificaciones/verificarCorreoUsuario.php', true); // Asegúrate de usar la ruta correcta a tu archivo PHP
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText;
                if (response === 'existe') {
                    errorMsg.style.display = 'block';
                    continuarButton.disabled = true; // Desactiva el botón si el correo ya existe
                } else {
                    errorMsg.style.display = 'none';
                    continuarButton.disabled = false; // Activa el botón si el correo no existe
                }
            }
        };
        xhr.send('correo=' + correo);
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const inputCorreo = document.getElementById('correo');
    const continuarButton = document.querySelector('#btn4');
    const errorMsg = document.getElementById('error-msg');

    inputCorreo.addEventListener('input', function () {
        const correo = inputCorreo.value.trim();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (regex.test(correo)) {
            // Si el correo electrónico es válido, oculta el mensaje de error
            errorMsg.style.display = 'none';
        }
    });

    // Agrega un evento de escucha al botón "Continuar"
    continuarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Previene la presentación del formulario (es solo para demostración)

        // Valida el formato del correo electrónico utilizando una expresión regular
        const correo = inputCorreo.value.trim();
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (regex.test(correo)) {
            // El correo electrónico es válido, permite que el usuario continúe
            const formBoxCorreo = document.querySelector('.form-box.correo');
            formBoxCorreo.classList.add('hidden');

            // Muestra el siguiente formulario si existe
            const formBoxes = document.querySelectorAll('.form-box');
            const index = Array.from(formBoxes).indexOf(formBoxCorreo);
            if (index + 1 < formBoxes.length) {
                formBoxes[index + 1].classList.remove('hidden');
            }
        } else {
            // El correo electrónico no es válido, muestra un mensaje de error
            errorMsg.style.display = 'block';

            // Regresa al formulario de correo electrónico
            const formBoxes = document.querySelectorAll('.form-box');
            formBoxes.forEach((formBox) => {
                formBox.classList.add('hidden');
            });
            const formBoxCorreo = document.querySelector('.form-box.correo');
            formBoxCorreo.classList.remove('hidden');
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const inputTelefono = document.querySelector('.form-box.telef .inp');
    const continuarButton = document.querySelector('.form-box.telef .btn');
    const errorMsg = document.getElementById('error-msg3');

    inputTelefono.addEventListener('input', function (e) {
        const numeroTelefono = e.target.value.trim();

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../../Controlador/verificaciones/verificarTeleUsuario.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = xhr.responseText;
                if (response === 'existe') {
                    errorMsg.style.display = 'block';
                    continuarButton.disabled = true; // Desactiva el botón si el número de teléfono ya existe
                } else {
                    errorMsg.style.display = 'none';
                    continuarButton.disabled = false; // Activa el botón si el número de teléfono no existe
                }
            }
        };
        xhr.send('numeroTelefono=' + numeroTelefono);
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const inputTelefono = document.querySelector('.form-box.telef .inp');
    const continuarButton = document.querySelector('#btn5');

    // Agrega un evento de escucha al input para validar la entrada
    inputTelefono.addEventListener('input', function () {
        const valor = inputTelefono.value.trim();
        const numeros = valor.replace(/\D/g, ''); // Elimina caracteres no numéricos

        // Actualiza el valor del input solo con números
        inputTelefono.value = numeros;

        // Verifica si hay 10 números y habilita o deshabilita el botón
        if (numeros.length === 10) {
            continuarButton.disabled = false;
        } else {
            continuarButton.disabled = true;
        }
    });

    // Agrega un evento de escucha al botón para pasar al siguiente paso
    continuarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Previene la presentación del formulario (es solo para demostración)

        // Oculta el formulario actual
        const formBoxTelef = document.querySelector('.form-box.telef');
        formBoxTelef.classList.add('hidden');

        // Muestra el siguiente formulario si existe
        const formBoxes = document.querySelectorAll('.form-box');
        const index = Array.from(formBoxes).indexOf(formBoxTelef);
        if (index + 1 < formBoxes.length) {
            formBoxes[index + 1].classList.remove('hidden');
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const submitButton = document.getElementById("submitButton");
    const message = document.getElementById("message");
    const errorMsg4 = document.getElementById("error-msg4");

    function verificarContraseñas() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password.length < 8) {
            errorMsg4.style.display = "block";
            submitButton.disabled = true;
        } else {
            errorMsg4.style.display = "none";
            if (password === confirmPassword) {
                message.innerText = "Las contraseñas coinciden";
                message.style.color = "green";
                submitButton.disabled = false;
            } else {
                message.innerText = "Las contraseñas no coinciden";
                message.style.color = "red";
                submitButton.disabled = true;
            }
        }
    }
    passwordInput.addEventListener("input", verificarContraseñas);
    confirmPasswordInput.addEventListener("input", verificarContraseñas);
});
