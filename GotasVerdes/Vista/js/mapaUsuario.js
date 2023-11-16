/*var map;

// Define un conjunto de ubicaciones
var locations = [
  { lat:  20.235539265383238, lng: -99.21336168253238},
  // Agrega más ubicaciones aquí
];
var map;

function iniciarMap() {
  var coord = { lat: 20.229817, lng: -99.214222 };
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: coord
  });

  var customIcon = {
    url: document.getElementById('customIcon').src,
    scaledSize: new google.maps.Size(40, 40)
  };

  for (var i = 0; i < ubicaciones.length; i++) {
    var marker = new google.maps.Marker({
      position: { lat: parseFloat(ubicaciones[i].latitud), lng: parseFloat(ubicaciones[i].longitud) },
      map: map,
      icon: customIcon
    });

    marker.addListener('click', function () {
      // Abre el modal correspondiente al hacer clic en el marcador
      $('#exampleModal').modal('show');
    });
  }
}*/
var map;
var customIcon;

function iniciarMap() {
  console.log('La función iniciarMap se está ejecutando.');
  var coord = { lat: 20.229817, lng: -99.214222 };
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: coord
  });

  customIcon = {
    url: document.getElementById('customIcon').src,
    scaledSize: new google.maps.Size(40, 40)
  };

  // Realiza una solicitud AJAX para obtener los datos de ubicación desde el archivo PHP
  $.ajax({
    url: '../../Controlador/ctrlMapaUsuario.php',
    dataType: 'json',
    success: function (data) {
      // Maneja los datos devueltos por el servidor
      for (var i = 0; i < data.length; i++) {
        var negocio = data[i];
        agregarMarcador(negocio);
      }
    },
    error: function (error) {
      console.error(error);
    }
  });
}

function agregarMarcador(negocio) {
  var marker = new google.maps.Marker({
    position: { lat: parseFloat(negocio.latitud), lng: parseFloat(negocio.longitud) },
    map: map,
    icon: customIcon
  });

  // Abre el modal correspondiente al hacer clic en el marcador
  marker.addListener('click', function () {
    convertirLatLongADireccion(negocio.latitud, negocio.longitud, function (direccion) {
      console.log('Latitud:', negocio.latitud);
      console.log('Longitud:', negocio.longitud);
      // Personaliza el contenido del modal con la dirección
      $('.negocio-title').text(negocio.nombre_negocio);
      $('.negocio-subtitle').eq(0).text('Dirección');
      $('.negocio-text').eq(0).text(direccion);

      $('#exampleModal').modal('show');
    });
  });
}

function convertirLatLongADireccion(latitud, longitud, callback) {
  var apiKey = '088ae2a64717821f7a926d13f4a02e53';
  var latlng = latitud + ',' + longitud;
  var url = `http://api.positionstack.com/v1/reverse?access_key=${apiKey}&query=${latlng}`;
  console.log("latlng "+latlng);
  console.log("url"+url);

  $.ajax({
    url: url,
    dataType: 'json',
    success: function (data) {
      if (data.data.length > 0) {
        var location = data.data[0];
        var direccion = location.label;
        callback(direccion);
      } else {
        callback('Dirección no encontrada');
      }
    },
    error: function (error) {
      console.error(error);
      callback('Error al obtener la dirección');
    }
  });
}