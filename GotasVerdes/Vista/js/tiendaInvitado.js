// Obtén una lista de todos los elementos input en la página
var inputElements = document.querySelectorAll('input');

// Itera a través de la lista y deshabilita cada elemento
inputElements.forEach(function(input) {
    input.disabled = true;
});