document.addEventListener('DOMContentLoaded', function () {
    const inputUsuario = document.querySelector('input[name="nom_usu"]');
    const errorMsg = document.getElementById('error-msg2');
    const continuarButton = document.querySelector('button[type="submit"]');

    if (inputUsuario && continuarButton) {
        inputUsuario.addEventListener('input', function (e) {
            const nombreUsuario = e.target.value.trim();

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controlador/verificaciones/verificacionUsuario.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;
                    if (response === 'existe') {
                        errorMsg.style.display = 'block';
                        continuarButton.disabled = true;
                    } else {
                        errorMsg.style.display = 'none';
                        continuarButton.disabled = false;
                    }
                }
            };
            xhr.send('nombreUsuario=' + nombreUsuario);
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const inputTelefono = document.querySelector('input[name="tel_usu"]');
    const errorMsg = document.getElementById('error-msg3');
    const continuarButton = document.querySelector('button[type="submit"]');

    if (inputTelefono && continuarButton) {
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
                        continuarButton.disabled = true;
                    } else {
                        errorMsg.style.display = 'none';
                        continuarButton.disabled = false;
                    }
                }
            };
            xhr.send('numeroTelefono=' + numeroTelefono);
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const inputCorreo = document.querySelector('input[name="cor_usu"]');
    const errorMsg = document.getElementById('error-msg-correo');
    const continuarButton = document.querySelector('button[type="submit"]');

    if (inputCorreo && continuarButton) {
        inputCorreo.addEventListener('input', function (e) {
            const correo = e.target.value.trim();

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controlador/verificaciones/verificarCorreoUsuario.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;
                    if (response === 'existe') {
                        errorMsg.style.display = 'block';
                        continuarButton.disabled = true;
                    } else {
                        errorMsg.style.display = 'none';
                        continuarButton.disabled = false;
                    }
                }
            };
            xhr.send('correo=' + correo);
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const inputPassword = document.querySelector('input[name="pas_usuario"]');
    const errorMsg = document.getElementById('error-msg4');
    const continuarButton = document.querySelector('button[type="submit"]');

    if (inputPassword && continuarButton) {
        inputPassword.addEventListener('input', function () {
            const password = inputPassword.value.trim();

            if (password.length < 8) {
                errorMsg.style.display = 'block';
                continuarButton.disabled = true;
            } else {
                errorMsg.style.display = 'none';
                continuarButton.disabled = false;
            }
        });
    }
});
function togglePassword() {
    const passwordField = document.getElementById('password');
    const toggleIcon = document.querySelector('.toggle-password');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    } else {
        passwordField.type = 'password';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    }
}

