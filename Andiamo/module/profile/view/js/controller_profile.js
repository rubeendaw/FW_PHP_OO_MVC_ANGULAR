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
            $(this).fill_or_clean();
            }else{
              $("#email").val(response.profile.email);
              $("#name").val(response.profile.name);
              $("#phone").val(response.profile.phone);
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

function validate_profile(){
    var result = true;

    var email = document.getElementById('email').value;
    var name = document.getElementById('name').value;
    var phone = document.getElementById('phone').value;

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

    //console.log("Before if result");
    if (result){
      // console.log("Inside if result");
      // var username = "ruamsa1";
      var data = {"email": email, "name": name, "phone": phone};
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









function validate_update_profile(){
    //Mail
    var mailp = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	if(document.update_profile.email.value.length === 0){
		document.getElementById('e_email').innerHTML = "Tienes que escribir el mail";
		document.getElementById('email').focus();
		return 0;
	}
	if(!mailp.test(document.update_profile.email.value)){
		document.getElementById('e_email').innerHTML = "El formato del mail es invalido";
		document.getElementById('email').focus();
		return 0;
	}
	document.getElementById('e_email').innerHTML = "";

	//document.formlogin.click();//click
	//document.formlogin.action="index.php?page=controller_login&op=list_login";
}
// $("#update_profile").submit(function (e) {
//     e.preventDefault();
//     if (validate_update_profile() != 0) {
//         var data = $("#update_profile").serialize();
//         $.ajax({
//             type : 'POST',
//             url  : 'module/profile/controller/controller_profile.php?&op=update&' + data,
//             data : data,
//             beforeSend: function(){	
//                 // console.log(data)
//                 $("#error_register").fadeOut();
//             },
//             success: function(response){						
//                 // console.log(response);	
//                 // if(response==="ok"){
//                 //     setTimeout(' window.location.href = "index.php?page=controller_login&op=view"; ',1000);
//                 // }else if (response=="okay") {
//                 //     // alert("Debes realizar login para completar tu compra");
//                 //     setTimeout(' window.location.href = window.location.href; ',1000);
//                 // }else if(response=="error_reg"){
//                 //     document.getElementById('e_reg').innerHTML = "Usuario o email ya existen";
//                 //     document.getElementById('e_reg').focus();
//                 // }else{
//                 //     $("#error_register").fadeIn(1000, function(){						
//                 //         $("#error_register").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'</div>');
//                 //     });
//                 // }
//           }
//         });
//     }
// });