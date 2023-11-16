document.addEventListener("DOMContentLoaded", function () {
    // Tu código JavaScript aquí
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const submitButton = document.getElementById("submitButton");
    const message = document.getElementById("message");

    function verificarContraseñas() {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

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

    confirmPasswordInput.addEventListener("input", verificarContraseñas);
});

const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const submitButton = document.querySelector('.btn');

submitButton.disabled = true; // Deshabilita el botón al principio

const checkPasswordMatch = () => {
    console.log("Input detected!");
    console.log("Password value: ", passwordInput.value);
    console.log("Confirm password value: ", confirmPasswordInput.value);

    if (passwordInput.value && confirmPasswordInput.value && passwordInput.value === confirmPasswordInput.value) {
        submitButton.disabled = false; // Habilita el botón si ambos campos tienen texto y coinciden
    } else {
        submitButton.disabled = true; // De lo contrario, deshabilita el botón
    }
};

passwordInput.addEventListener('input', checkPasswordMatch);
confirmPasswordInput.addEventListener('input', checkPasswordMatch);
