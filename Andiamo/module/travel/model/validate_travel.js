function validate_travel() {
  if (document.alta_travel.ref.value === "") {
    document.getElementById('error_ref').innerHTML = "Tiene que escribir la referencia";
    document.alta_travel.ref.focus();
    return 0;
  }
  document.getElementById('error_ref').innerHTML = "";

  if (document.alta_travel.price.value === "") {
    document.getElementById('error_price').innerHTML = "Tiene que escribir el precio";
    document.alta_travel.price.focus();
    return 0;
  }
  document.getElementById('error_price').innerHTML = "";

  if (document.alta_travel.country.value === "") {
    document.getElementById('error_country').innerHTML = "Tiene que escribir el pais";
    document.alta_travel.country.focus();
    return 0;
  }
  document.getElementById('error_country').innerHTML = "";

  if (document.alta_travel.destination.value === "") {
    document.getElementById('error_destination').innerHTML = "Tiene que escribir el destino";
    document.alta_travel.destination.focus();
    return 0;
  }
  document.getElementById('error_destination').innerHTML = "";

  document.alta_travel.submit();
  document.alta_travel.action = "index.php?page=controller_travel&op=create";
}
function validate_travel_update() {

  if (document.update_travel.price.value === "") {
    document.getElementById('error_price').innerHTML = "Tiene que escribir el precio";
    document.update_travel.price.focus();
    return 0;
  }
  document.getElementById('error_price').innerHTML = "";

  if (document.update_travel.country.value === "") {
    document.getElementById('error_country').innerHTML = "Tiene que escribir el pais";
    document.update_travel.country.focus();
    return 0;
  }
  document.getElementById('error_country').innerHTML = "";

  if (document.update_travel.destination.value === "") {
    document.getElementById('error_destination').innerHTML = "Tiene que escribir el destino";
    document.update_travel.destination.focus();
    return 0;
  }
  document.getElementById('error_destination').innerHTML = "";

  if (document.update_travel.ref.value === "") {
    document.getElementById('error_ref').innerHTML = "Tiene que escribir la referencia";
    document.update_travel.ref.focus();
    return 0;
  }
  document.getElementById('error_ref').innerHTML = "";

  document.update_travel.submit();
  document.update_travel.action = "index.php?page=controller_travel&op=update";
}

$(document).ready(function () {
  $('.ref').click(function () {
    console.log("Entro");
    var id = this.getAttribute('id');
    // document.getElementById("details_cars").style.visibility = "visible";
    //alert(id);
    console.log(id);
    
    $.get("module/travel/controller/controller_travel.php?op=read_modal&modal=" + id, function (data, status) {
      console.log("Entro3");
      console.log(data);
      var json = JSON.parse(data);
      console.log(json);
      //var stringdata = JSON.parse(json);
      //console.log(data);

      if (json === 'error') {
        //console.log(json);
        window.location.href = 'index.php?page=503';
      } else {
        //console.log(json.ref);
        $("#ref").html(json.ref);
        $("#tipo").html(json.type);
        $("#check_in").html(json.check_in);
        $("#check_out").html(json.check_out);
        $("#services").html(json.services);
        $("#destino").html(json.destination);
        $("#country").html(json.country);
        $("#precio").html(json.price);
        $("#descuento").html(json.discount);
        $("#details_travel").show();
        $("#travel_modal").dialog({
          width: 640, //<!-- ------------- ancho de la ventana -->
          height: 500, //<!--  ------------- altura de la ventana -->
          // show: "scale", //<!-- ----------- animación de la ventana al aparecer -->
          // hide: "scale", //<!-- ----------- animación al cerrar la ventana -->
          resizable: "false", //<!-- ------ fija o redimensionable si ponemos este valor a "true" -->
          // position: "down", //<!--  ------ posicion de la ventana en la pantalla (left, top, right...) -->
          modal: "true", //<!-- ------------ si esta en true bloquea el contenido de la web mientras la ventana esta activa (muy elegante) -->
          buttons: {
            Ok: function () {
              $(this).dialog("close");
            }
          },
          // show: {
          //      effect: "blind",
          //      duration: 1000
          //  },
          //  hide: {
          //      effect: "explode",
          //      duration: 1000
          //  }
        });
      }//end-else
    });
  });
});
