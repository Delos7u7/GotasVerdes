// Reemplaza con tu propia clave de API de Google Maps
const apiKey = 'AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik';

var map;
var markers = []; // Para almacenar los marcadores

function initMap() {
  var coord = { lat: 20.229817, lng: -99.214222 };
  map = new google.maps.Map(document.getElementById('mapp'), {
    zoom: 16,
    center: coord,
  });

  // Configura el icono personalizado
  var customIcon = {
    url: document.getElementById('customIcon').src,
    scaledSize: new google.maps.Size(40, 40),
};

// Agrega un evento de clic al mapa para permitir a los usuarios agregar ubicaciones
map.addListener('click', function (event) {
  addMarker(event.latLng, customIcon);
});
}

// Función para agregar un marcador
function addMarker(location, icon) {
  // Elimina marcadores anteriores
  deleteMarkers();

  var marker = new google.maps.Marker({
    position: location,
    map: map,
    icon: icon,
  });

  // Agrega el marcador al array de marcadores
  markers.push(marker);

  // Obtiene las coordenadas de latitud y longitud
  var latitud = location.lat();
  var longitud = location.lng();

  // Muestra las coordenadas en los elementos de entrada
  document.getElementById('latitud').value = latitud;
  document.getElementById('longitud').value = longitud;
}

// Función para eliminar todos los marcadores
function deleteMarkers() {
markers.forEach(function (marker) {
  marker.setMap(null);
});
markers = [];
}

// Carga el script de Google Maps API
function loadGoogleMapsScript() {
const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initMap`;
    script.async = true;
  document.head.appendChild(script);
}