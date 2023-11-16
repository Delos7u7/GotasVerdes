var confirmIdRecolecta;
var confirmCantidad;
var confirmStatus;

function openConfirmModal(id_recolecta, cantidad, status) {
    confirmIdRecolecta = id_recolecta;
    confirmCantidad = cantidad;
    confirmStatus = status;
    var modal = document.getElementById("confirmModal");
    modal.style.display = "block";
}

function closeConfirmModal() {
    var modal = document.getElementById("confirmModal");
    modal.style.display = "none";
}
function openModal(nombreUsuario, cantidad, direccion) {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
    var modalContent = document.querySelector(".modal-content");
    modalContent.innerHTML = "<span class='close' onclick='closeModal()'>&times;</span>" +
        "<p>Nombre: " + nombreUsuario + "</p>" +
        "<p>Cantidad: " + cantidad + "</p>" +
        "<p>Dirección: " + direccion + "</p>" +
        "<button class='btn btn-success'  onclick='saveModalData()'>Cerrar</button>";
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function saveModalData() {
    closeModal();
}
function markAsCollected(id_recolecta, cantidad, status) {
    window.location.href = `../../Controlador/ctrlpuntosUsuario.php?id_recolecta=${id_recolecta}&cantidad=${cantidad}&status=${status}`;
}
