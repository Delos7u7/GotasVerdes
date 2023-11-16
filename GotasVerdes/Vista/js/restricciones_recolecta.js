const form = document.getElementById('recolecta-form');
const inputs = form.querySelectorAll('input');
const submitBtn = document.getElementById('submitBtn');

inputs.forEach(input => {
    input.addEventListener('input', () => {
        let allFilled = true;
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                allFilled = false;
            }
        });
        submitBtn.disabled = !allFilled;
    });
});


const inputNombre = document.querySelector('input[name="nom_rec"]');
inputNombre.addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-Z- ]/, '');
});
const inputCantidad = document.querySelector('input[name="can_rec"]');
inputCantidad.addEventListener('input', function () {
    this.value = this.value.replace(/[^\d]/, '');
});

inputCantidad.addEventListener('focus', function () {
    let mensajeCantidad = document.querySelector('#mensajeCantidad');
    if (!mensajeCantidad) {
        mensajeCantidad = document.createElement('p');
        mensajeCantidad.textContent = "Especifica en litros";
        mensajeCantidad.style.color = "white"; // Cambia el color a tu preferencia
        mensajeCantidad.style.margin = '30px 0 0 0';
        mensajeCantidad.style.fontSize = "15px"; // Ajusta el tamaño de la fuente según tus preferencias
        mensajeCantidad.id = 'mensajeCantidad';
        inputCantidad.insertAdjacentElement('afterend', mensajeCantidad);
    }
});

inputCantidad.addEventListener('blur', function () {
    let mensajeCantidad = document.querySelector('#mensajeCantidad');
    if (mensajeCantidad) {
        mensajeCantidad.remove();
    }
});
const inputDireccion = document.querySelector('input[name="dir_rec"]');
inputDireccion.addEventListener('focus', function () {
    let mensaje = document.querySelector('#mensaje');
    if (!mensaje) {
        mensaje = document.createElement('p');
        mensaje.innerHTML = "Especifica tu número de casa <br> y una referencia";
        mensaje.style.color = "white"; // Cambia el color a tu preferencia
        mensaje.style.margin = '30px 0 0 0';
        mensaje.style.fontSize = "15px"; // Ajusta el tamaño de la fuente según tus preferencias
        mensaje.id = 'mensaje';
        inputDireccion.insertAdjacentElement('afterend', mensaje);
    }
});

inputDireccion.addEventListener('blur', function () {
    let mensaje = document.querySelector('#mensaje');
    if (mensaje) {
        mensaje.remove();
    }
});