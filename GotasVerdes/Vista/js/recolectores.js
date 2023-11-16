document.addEventListener('DOMContentLoaded', function () {
    const formBoxes = document.querySelectorAll('.form-box.nombre');

    formBoxes.forEach((formBox, index) => {
        const inputBox = formBox.querySelector('.inp');
        const continuarButton = formBox.querySelector('.btn.xd');

        // Inicialmente, deshabilita el botón de Continuar
        continuarButton.disabled = true;

        // Agrega un evento de escucha al input para habilitar o deshabilitar el botón
        inputBox.addEventListener('input', function () {
            const allInputsFilled = Array.from(formBoxes).every((fb, i) => {
                if (i <= index) {
                    const input = fb.querySelector('.inp');
                    return input.value.trim() !== '';
                }
                return true;
            });

            if (allInputsFilled) {
                continuarButton.disabled = false; // Habilita el botón si todos los inputs previos tienen contenido
            } else {
                continuarButton.disabled = true; // Deshabilita el botón si algún input previo está vacío
            }
        });

        // Agrega un evento de escucha al botón para pasar al siguiente paso
        continuarButton.addEventListener('click', function (e) {
            e.preventDefault(); // Previene la presentación del formulario (es solo para demostración)

            // Oculta el formulario actual
            formBox.classList.add('hidden');

            // Muestra el siguiente formulario si existe
            if (index + 1 < formBoxes.length) {
                formBoxes[index + 1].classList.remove('hidden');
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const formBoxes = document.querySelectorAll('.form-box.edad');

    formBoxes.forEach((formBox, index) => {
        const inputBox = formBox.querySelector('.inp');
        const continuarButton = formBox.querySelector('.btn.xd');

        // Inicialmente, deshabilita el botón de Continuar
        continuarButton.disabled = true;

        // Agrega un evento de escucha al input para habilitar o deshabilitar el botón
        inputBox.addEventListener('input', function () {
            const allInputsFilled = Array.from(formBoxes).every((fb, i) => {
                if (i <= index) {
                    const input = fb.querySelector('.inp');
                    return input.value.trim() !== '';
                }
                return true;
            });

            if (allInputsFilled) {
                continuarButton.disabled = false; // Habilita el botón si todos los inputs previos tienen contenido
            } else {
                continuarButton.disabled = true; // Deshabilita el botón si algún input previo está vacío
            }
        });

        // Agrega un evento de escucha al botón para pasar al siguiente paso
        continuarButton.addEventListener('click', function (e) {
            e.preventDefault(); // Previene la presentación del formulario (es solo para demostración)

            // Oculta el formulario actual
            formBox.classList.add('hidden');

            // Muestra el siguiente formulario si existe
            if (index + 1 < formBoxes.length) {
                formBoxes[index + 1].classList.remove('hidden');
            }
        });
    });
});

let cedulaFileUploaded = false;
let licenciaFileUploaded = false;

function checkUploads() {
    const cedulaFileInput = document.getElementById("cedula-file");
    const licenciaFileInput = document.getElementById("licencia-file");
    if (cedulaFileInput.files.length > 0) {
        cedulaFileUploaded = true;
    } else {
        cedulaFileUploaded = false;
    }

    if (licenciaFileInput.files.length > 0) {
        licenciaFileUploaded = true;
    } else {
        licenciaFileUploaded = false;
    }

    // Habilitar el botón si ambos archivos están subidos
    const continuarButton = document.getElementById("btn3");
    if (cedulaFileUploaded && licenciaFileUploaded) {
        continuarButton.removeAttribute("disabled");
    } else {
        continuarButton.setAttribute("disabled", "disabled");
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const formBoxes = document.querySelectorAll('.form-box.correo');

    formBoxes.forEach((formBox, index) => {
        const inputBox = formBox.querySelector('.inp');
        const continuarButton = formBox.querySelector('.btn.xd');

        // Inicialmente, deshabilita el botón de Continuar
        continuarButton.disabled = true;

        // Agrega un evento de escucha al input para habilitar o deshabilitar el botón
        inputBox.addEventListener('input', function () {
            const allInputsFilled = Array.from(formBoxes).every((fb, i) => {
                if (i <= index) {
                    const input = fb.querySelector('.inp');
                    return input.value.trim() !== '';
                }
                return true;
            });

            if (allInputsFilled) {
                continuarButton.disabled = false; // Habilita el botón si todos los inputs previos tienen contenido
            } else {
                continuarButton.disabled = true; // Deshabilita el botón si algún input previo está vacío
            }
        });

        // Agrega un evento de escucha al botón para pasar al siguiente paso
        continuarButton.addEventListener('click', function (e) {
            e.preventDefault(); // Previene la presentación del formulario (es solo para demostración)

            // Oculta el formulario actual
            formBox.classList.add('hidden');

            // Muestra el siguiente formulario si existe
            if (index + 1 < formBoxes.length) {
                formBoxes[index + 1].classList.remove('hidden');
            }
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const formBoxes = document.querySelectorAll('.form-box.telef');

    formBoxes.forEach((formBox, index) => {
        const inputBox = formBox.querySelector('.inp');
        const continuarButton = formBox.querySelector('.btn.xd');

        // Inicialmente, deshabilita el botón de Continuar
        continuarButton.disabled = true;

        // Agrega un evento de escucha al input para habilitar o deshabilitar el botón
        inputBox.addEventListener('input', function () {
            const allInputsFilled = Array.from(formBoxes).every((fb, i) => {
                if (i <= index) {
                    const input = fb.querySelector('.inp');
                    return input.value.trim() !== '';
                }
                return true;
            });

            if (allInputsFilled) {
                continuarButton.disabled = false; // Habilita el botón si todos los inputs previos tienen contenido
            } else {
                continuarButton.disabled = true; // Deshabilita el botón si algún input previo está vacío
            }
        });

        // Agrega un evento de escucha al botón para pasar al siguiente paso
        continuarButton.addEventListener('click', function (e) {
            e.preventDefault(); // Previene la presentación del formulario (es solo para demostración)

            // Oculta el formulario actual
            formBox.classList.add('hidden');

            // Muestra el siguiente formulario si existe
            if (index + 1 < formBoxes.length) {
                formBoxes[index + 1].classList.remove('hidden');
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const formBoxRegister = document.querySelector('.form-box.registerRec');
    const inputBoxCorreo = document.querySelector('.form-box.nombre');
    const iniciarButton = document.querySelector('.btn');

    // Initially hide the input-box.correo
    inputBoxCorreo.classList.add('hidden');

    iniciarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission, as it's just for demonstration

        // Toggle the visibility of formBoxRegister and inputBoxCorreo
        formBoxRegister.classList.add('hidden');
        inputBoxCorreo.classList.remove('hidden'); // Remove the 'hidden' class to show it
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const formBoxRegister = document.querySelector('.form-box.nombre');
    const inputBoxCorreo = document.querySelector('.form-box.edad');
    const iniciarButton = document.querySelector('#btn1');

    // Initially hide the input-box.correo
    inputBoxCorreo.classList.add('hidden');

    iniciarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission, as it's just for demonstration

        // Toggle the visibility of formBoxRegister and inputBoxCorreo
        formBoxRegister.classList.add('hidden');
        inputBoxCorreo.classList.remove('hidden'); // Remove the 'hidden' class to show it
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const formBoxRegister = document.querySelector('.form-box.edad');
    const inputBoxCorreo = document.querySelector('.form-box.doc');
    const iniciarButton = document.querySelector('#btn2');

    // Initially hide the input-box.correo
    inputBoxCorreo.classList.add('hidden');

    iniciarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission, as it's just for demonstration

        // Toggle the visibility of formBoxRegister and inputBoxCorreo
        formBoxRegister.classList.add('hidden');
        inputBoxCorreo.classList.remove('hidden'); // Remove the 'hidden' class to show it
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const formBoxRegister = document.querySelector('.form-box.doc');
    const inputBoxCorreo = document.querySelector('.form-box.correo');
    const iniciarButton = document.querySelector('#btn3');

    // Initially hide the input-box.correo
    inputBoxCorreo.classList.add('hidden');

    iniciarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission, as it's just for demonstration

        // Toggle the visibility of formBoxRegister and inputBoxCorreo
        formBoxRegister.classList.add('hidden');
        inputBoxCorreo.classList.remove('hidden'); // Remove the 'hidden' class to show it
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const formBoxRegister = document.querySelector('.form-box.correo');
    const inputBoxCorreo = document.querySelector('.form-box.telef');
    const iniciarButton = document.querySelector('#btn4');

    // Initially hide the input-box.correo
    inputBoxCorreo.classList.add('hidden');

    iniciarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission, as it's just for demonstration

        // Toggle the visibility of formBoxRegister and inputBoxCorreo
        formBoxRegister.classList.add('hidden');
        inputBoxCorreo.classList.remove('hidden'); // Remove the 'hidden' class to show it
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const formBoxRegister = document.querySelector('.form-box.telef');
    const inputBoxCorreo = document.querySelector('.form-box.pass');
    const iniciarButton = document.querySelector('#btn5');

    // Initially hide the input-box.correo
    inputBoxCorreo.classList.add('hidden');

    iniciarButton.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission, as it's just for demonstration

        // Toggle the visibility of formBoxRegister and inputBoxCorreo
        formBoxRegister.classList.add('hidden');
        inputBoxCorreo.classList.remove('hidden'); // Remove the 'hidden' class to show it
    });
});
