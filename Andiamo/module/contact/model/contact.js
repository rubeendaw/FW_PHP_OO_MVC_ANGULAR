function initMap() {
    var Ontinyent = {lat: 38.809945, lng: -0.604642};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: Ontinyent
    });

    var contentString = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h2 id="firstHeading" class="firstHeading">Ontinyent</h2>'+
        '<div id="bodyContent">'+
        '<p><b>Oficina</b> - Avenida Ramón y Cajal, 1, Bajo, Ontinyent, 46870 (Valencia)</br> ' +
        '<b>Teléfono</b> - 960089172 </br>'+
        '<b>Horario</b> - Lunes a Viernes de 09:30 a 14:00 y 16:30 a 20:30 '+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });

    var marker = new google.maps.Marker({
      position: Ontinyent,
      map: map,
      title: 'Ontinyent'
    });
    
    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });
  }