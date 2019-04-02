//Plugin to put the values into the fields if them are empty
// jQuery.fn.fill_or_clean = function () {
//   this.each(function () {
//       if ($("#email").val() === "") {
//           $("#email").val("Escribe el correo");
//           $("#email").focus(function () {
//               if ($("#email").val() === "Escribe el correo") {
//                   $("#email").val("");
//               }
//           });
//       }
//       $("#email").blur(function () { //Onblur is activated when user changes the focus
//           if ($("#email").val() === "") {
//               $("#email").val("Escribe el correo");
//           }
//       });
//   });//End of the each
//   return this;
// };// End of fill or clean function
$(document).ready(function () {
  if (document.getElementById('table_likes')) {
    $.get("module/like/controller/controller_like.php?&op=show_like", function(data,status) {
      console.log(data);
      var json = JSON.parse(data);
      $.each(json, function(index, list) {
            var row = "<tr>"
                      + "<td>" + list.country + "</td>"
                      + "<td>" + list.destination + "</td>"
                      + "<td>" + list.price + "</td>"
                      + "<td><a id='" + list.id + "' class='del_like btn btn-danger' href='index.php?page=controller_profile&op=view'>Delete</a></td></td>"
                      + "</tr>";
            $("#table_likes").append(row);
      });
    });
}

  if (document.getElementById('table_purchases')) {
    $.get("module/cart/controller/controller_cart.php?&op=show_purchase", function(data,status) {
      console.log(data);
      var json = JSON.parse(data);
      $.each(json, function(index, list) {
            var row = "<tr>"
                      + "<td>" + list.total + "</td>"
                      + "<td>" + list.date + "</td>"
                      + "<td><a class='btn btn-info' href='#'>Download</a></td>"
                      + "</tr>";
            $("#table_purchases").append(row);
      });
    });
}

$(document).on('click','.del_like',function () {
  var id = $(this).attr("id");
  console.log(id);
  $.get("module/like/controller/controller_like.php?op=del_like&id=" + id, function (data, status) {
    datos = JSON.parse(data);
  });
});

$('#update_profile').click(function(){
    //console.log("Inside click function");
    //console.log($('input[name="packaging"]:checked').val());
    validate_profile();
});
$.get("module/profile/controller/controller_profile.php?load_data=true",
          function(response){
            if(response.profile===""){
                $("#email").val('');
                $("#name").val('');
                $("#phone").val('');
                $('#country').val('Select country');
                $('#province').val('Select province');
                $('#city').val('Select city');
            $(this).fill_or_clean();
            }else{
              $("#email").val(response.profile.email);
              $("#name").val(response.profile.name);
              $("#phone").val(response.profile.phone);
              $('#country').val(response.profile.country);
              $('#province').val(response.profile.province);
              $('#city').val(response.profile.city);
            }
          }, "json");

          var string_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
          var string_name = /^[A-Za-z0-9\s]{2,20}$/;
          var string_phone = /(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/;

          $("#email").keyup(function () {
            if ($(this).val() !== "" && string_email.test($(this).val())) {
                $(".error").fadeOut();
                return false;
            }
          });
          $("#name").keyup(function () {
            if ($(this).val() !== "" && string_name.test($(this).val())) {
                $(".error").fadeOut();
                return false;
            }
          });
          $("#phone").keyup(function () {
            if ($(this).val() !== "" && string_phone.test($(this).val())) {
                $(".error").fadeOut();
                return false;
            }
          });

load_countries_v1();
$("#province").empty();
    $("#province").append('<option value="" selected="selected">Select province</option>');
    $("#province").prop('disabled', true);
    $("#city").empty();
    $("#city").append('<option value="" selected="selected">Select city</option>');
    $("#city").prop('disabled', true);

    $("#country").change(function() {
		var country = $(this).val();
		var province = $("#province");
		var city = $("#city");

		if(country !== 'ES'){
	         province.prop('disabled', true);
	         city.prop('disabled', true);
	         $("#province").empty();
		     $("#city").empty();
		}else{
	         province.prop('disabled', false);
	         city.prop('disabled', false);
	         load_provinces_v1();
		}//fi else
	});

	$("#province").change(function() {
		var prov = $(this).val();
		if(prov > 0){
			load_cities_v1(prov);
		}else{
			$("#city").prop('disabled', false);
		}
	});

function validate_profile(){
    var result = true;

    var email = document.getElementById('email').value;
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;
    var country = document.getElementById('country').value;
    var province = document.getElementById('province').value;
    var city = document.getElementById('city').value;

    var string_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var string_name = /^[A-Za-z0-9\s]{2,20}$/;
    var string_phone = /(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/;

    $(".error").remove();
    if ($("#email").val() === "" || $("#email").val() === "Escribe el correo"){
      $("#email").focus().before("<span class='error'>Escribe el correo</span>");
      return false;
    }else if(!string_email.test($("#email").val())){
      $("#email").focus().before("<span class='error'>El correo no es valido</span>");
      return false;
    }
    if ($("#name").val() === "" || $("#name").val() === "Escribe el nombre"){
      $("#name").focus().before("<span class='error'>Escribe el nombre</span>");
      return false;
    }else if(!string_name.test($("#name").val())){
      $("#name").focus().before("<span class='error'>El nombre no es valido</span>");
      return false;
    }
    if ($("#phone").val() === "" || $("#phone").val() === "Escribe el movil"){
      $("#phone").focus().before("<span class='error'>Escribe el movil</span>");
      return false;
    }else if(!string_phone.test($("#phone").val())){
      $("#phone").focus().before("<span class='error'>El movil no es valido</span>");
      return false;
    }

    if ($("#country").val() === "" || $("#country").val() === "Select country" || $("#country").val() === null) {
      $("#country").focus().after("<span class='error'>Select one country</span>");
      return false;
    }

    if ($("#province").val() === "" || $("#province").val() === "Select province") {
      $("#province").focus().after("<span class='error'>Select one province</span>");
      return false;
    }

    if ($("#city").val() === "" || $("#city").val() === "Select city") {
      $("#city").focus().after("<span class='error'>Select one city</span>");
      return false;
    }

    //console.log("Before if result");
    if (result){
      if (province === null) {
        province = 'default_province';
      }else if (province.length === 0) {
          province = 'default_province';
      }else if (province === 'Select province') {
          return 'default_province';
      }

      if (city === null) {
          city = 'default_city';
      }else if (city.length === 0) {
          city = 'default_city';
      }else if (city === 'Select city') {
          return 'default_city';
      }
      // console.log("Inside if result");
      // var username = "ruamsa1";
      var data = {"email": email, "name": name, "phone": phone, "country": country, "province": province, "city": city};
      console.log(data); //Apleguen les dades be
      var data_profile_JSON = JSON.stringify(data);

      $.post('module/profile/controller/controller_profile.php',
          {alta_profile_json:data_profile_JSON},
      function (response){
        console.log(response);//Aqui muestra los resultados de PHP
        // console.log(response.email);
        if(response.success){
          window.location.href = response.redirect;
        }
    },"json")
    // .fail(function(xhr, textStatus, errorThrown){
          //console.log("Inside error json");
          // console.log("fail");
          // if (xhr.status === 0) {
          //       alert('Not connect: Verify Network.');
          //   } else if (xhr.status == 404) {
          //       alert('Requested page not found [404]');
          //   } else if (xhr.status == 500) {
          //       alert('Internal Server Error [500].');
          //   } else if (textStatus === 'parsererror') {
          //       alert('Requested JSON parse failed.');
          //   } else if (textStatus === 'timeout') {
          //       alert('Time out error.');
          //   } else if (textStatus === 'abort') {
          //       alert('Ajax request aborted.');
          //   } else {
          //       console.log('Uncaught Error: ' + xhr.responseText);
          //   }
          // if (xhr.responseJSON == 'undefined' && xhr.responseJSON === null )
          //         xhr.responseJSON = JSON.parse(xhr.responseText);

          // if(xhr.responseJSON.error.email)
          //   $("#error_email").focus().after("<span  class='error1'>" + xhr.responseJSON.error.email + "</span>");

          // if (xhr.responseJSON.success1) {
          //       if (xhr.responseJSON.img_avatar !== "/shop_arevert/media/default-prodpic.png") {
          //           //$("#progress").show();
          //           //$("#bar").width('100%');
          //           //$("#percent").html('100%');
          //           //$('.msg').text('').removeClass('msg_error');
          //           //$('.msg').text('Success Upload image!!').addClass('msg_ok').animate({ 'right' : '300px' }, 300);
          //       }
          //   } else {
          //       $("#progress").hide();
          //       $('.msg').text('').removeClass('msg_ok');
          //       $('.msg').text('Error Upload image!!').addClass('msg_error').animate({'right': '300px'}, 300);
          //   }

    // });//End fail function hrx
  }//End if result
}//End validate_product
var myDropzone = new Dropzone("#dropzone", {
// Dropzone.autoDiscover = false;
    // $("div#dropzone").dropzone({
        url: "module/profile/controller/controller_profile.php?upload=true",
        addRemoveLinks: true,
        maxFileSize: 1000,
        dictResponseError: "An error has occurred on the server",
        acceptedFiles: 'image/*,.jpeg,.jpg,.png,.JPEG,.JPG,.PNG',
        init: function () {
            this.on("success", function (file, response) {
                //alert(response);
                $("#progress").show();
                $("#bar").width('100%');
                $("#percent").html('100%');
                $('.msg').text('').removeClass('msg_error');
                $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '55%'}, 300);
                console.log(file.name);
                console.log("Response: "+response);
            });
        },
        complete: function (file) {
            //if(file.status == "success"){
            //alert("El archivo se ha subido correctamente: " + file.name);
            //}
        },
        error: function (file) {
            //alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function (file, serverFileName) {
            var name = file.name;
            console.log(name);
            $.ajax({
                type: "POST",
                url: "module/profile/controller/controller_profile.php?delete=true",
                data: "filename=" + name,
                success: function (data) {
                  //console.log(name);
                  console.log(data);
                    $("#progress").hide();
                    $('.msg').text('').removeClass('msg_ok');
                    $('.msg').text('').removeClass('msg_error');
                    $("#e_avatar").html("");

                    var json = JSON.parse(data);
                    //console.log(data);
                    if (json.res === true) {
                        var element;
                        if ((element = file.previewElement) !== null) {
                            element.parentNode.removeChild(file.previewElement);
                            //alert("Imagen eliminada: " + name);
                        } else {
                            return false;
                        }
                    } else { //json.res == false, elimino la imagen también
                        var element2;
                        if ((element2 = file.previewElement) !== null) {
                            element2.parentNode.removeChild(file.previewElement);
                        } else {
                            return false;
                        }
                    }

                }
            });
        }
    });//End dropzone
});









function load_countries_v2(cad) {
  $.getJSON( cad, function(data) {
    //console.log( data );
    $("#country").empty();
    $("#country").append('<option value="" selected="selected">Select country</option>');

    $.each(data, function (i, valor) {
      $("#country").append("<option value='" + valor.sISOCode + "'>" + valor.sName + "</option>");
    });
  })
  .fail(function() {
      alert( "error load_countries" );
  });
}

function load_countries_v1() {
  $.get( "module/profile/controller/controller_profile.php?load_country=true",
      function( response ) {
          //console.log(response);
          if(response === 'error'){
              load_countries_v2("resources/ListOfCountryNamesByName.json");
          }else{
              load_countries_v2("module/profile/controller/controller_profile.php?load_country=true"); //oorsprong.org
          }
  })
  .fail(function(response) {
      load_countries_v2("resources/ListOfCountryNamesByName.json");
  });
}

function load_provinces_v2() {
  $.get("resources/provinciasypoblaciones.xml", function (xml) {
    $("#province").empty();
    $("#province").append('<option value="" selected="selected">Select province</option>');

      $(xml).find("provincia").each(function () {
          var id = $(this).attr('id');
          var name = $(this).find('nombre').text();
          $("#province").append("<option value='" + id + "'>" + name + "</option>");
      });
  })
  .fail(function() {
      alert( "error load_provinces" );
  });
}

function load_provinces_v1() { //provinciasypoblaciones.xml - xpath
  $.get( "module/profile/controller/controller_profile.php?load_provinces=true",
      function( response ) {
        $("#province").empty();
        $("#province").append('<option value="" selected="selected">Select province</option>');

          //alert(response);
      var json = JSON.parse(response);
      var provinces=json.provinces;
      //alert(provinces);
      //console.log(provinces);

      //alert(provinces[0].id);
      //alert(provinces[0].nombre);

          if(provinces === 'error'){
              load_provinces_v2();
          }else{
              for (var i = 0; i < provinces.length; i++) {
              $("#province").append("<option value='" + provinces[i].id + "'>" + provinces[i].nombre + "</option>");
          }
          }
  })
  .fail(function(response) {
      load_provinces_v2();
  });
}

function load_cities_v2(prov) {
  $.get("resources/provinciasypoblaciones.xml", function (xml) {
  $("#city").empty();
    $("#city").append('<option value="" selected="selected">Select city</option>');

  $(xml).find('provincia[id=' + prov + ']').each(function(){
      $(this).find('localidad').each(function(){
         $("#city").append("<option value='" + $(this).text() + "'>" + $(this).text() + "</option>");
      });
      });
})
.fail(function() {
      alert( "error load_cities" );
  });
}

function load_cities_v1(prov) { //provinciasypoblaciones.xml - xpath
  var datos = { idPoblac : prov  };
$.post("module/profile/controller/controller_profile.php", datos, function(response) {
    //alert(response);
      var json = JSON.parse(response);
  var cities=json.cities;
  //alert(poblaciones);
  //console.log(poblaciones);
  //alert(poblaciones[0].poblacion);

  $("#city").empty();
    $("#city").append('<option value="" selected="selected">Select city</option>');

      if(cities === 'error'){
          load_cities_v2(prov);
      }else{
          for (var i = 0; i < cities.length; i++) {
          $("#city").append("<option value='" + cities[i].poblacion + "'>" + cities[i].poblacion + "</option>");
      }
      }
})
.fail(function() {
      load_cities_v2(prov);
  });
}