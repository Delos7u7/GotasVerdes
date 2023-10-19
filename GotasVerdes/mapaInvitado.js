var map;

// Define un conjunto de ubicaciones
var locations = [
  { lat: 20.235641535251226, lng: -99.21338851191847},
  { lat: 20.23, lng: -99.22 }, // Agrega más ubicaciones según tus necesidades
  { lat: 20.24, lng: -99.21 },
  // Agrega más ubicaciones aquí
];

function iniciarMap() {
  var coord = { lat: 20.229817, lng: -99.214222 };
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16, // Ajusta el nivel de zoom según tus necesidades
    center: coord
  });

  // Configura el icono personalizado
  var customIcon = {
    url: document.getElementById('customIcon').src,
    scaledSize: new google.maps.Size(40, 40) // Ajusta el tamaño según tus necesidades
  };

  // Crea marcadores para cada ubicación y agrégalos al mapa
  for (var i = 0; i < locations.length; i++) {
    var marker = new google.maps.Marker({
      position: locations[i],
      map: map,
      icon: customIcon
    });
  }
}