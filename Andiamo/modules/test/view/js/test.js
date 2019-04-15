$(document).ready(function(){ 
    var hola = "hola";
    $.ajax({
        type: "POST",
        url: "../../test/prueba/",
        data: {"data":hola},
        success: function(response){
            console.log(response);
            // $("#results").append(response);
            // track_click++;
        }
      });
    // $(document).on('click','#pruebas',function(){
    // $.post(amigable("?module=test&function=prueba"),
    // function(data){
    //     console.log(data);
    // },"json")
    // });
  });