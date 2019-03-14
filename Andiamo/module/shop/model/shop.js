$(document).ready(function(){
    if (document.getElementById('container_travels')) {
      var url = 
      $.get("module/shop/controller/controller_shop.php?&op=data_shop", function(data,status) {
        // console.log(data);
        var json = JSON.parse(data);
        $.each(json, function(index, list) {
              var ElementDiv = document.createElement('div');
              ElementDiv.id = "list_travels";
              ElementDiv.innerHTML = "<div id='prueba' class='block-4 text-center border'>"
                                      + "<figure class='block-4-image'>"
                                      + "<a class='details' id="+ list.id + "><img class='img-fluid' src=view/assets/images/" + list.img + "></a>"
                                      + "</figure>" 
                                      + "<div class='block-4-text p-4'>"
                                      + "<h3><a class='details'>" + list.destination + "</a></h3>"
                                      + "<p class='mb-0'>" + list.country + "</p>"
                                      + "<p class='text-primary font-weight-bold'>" + list.price +"€</p>"
                                      + "<span id='" + list.id + "' class='InsertCarr icon icon-shopping_cart'></span>"
                                      + "</div>";
                                      + "</div>";
              document.getElementById("list_travels").appendChild(ElementDiv);
        });
        for(i=1;i<=20;i++){
          $( ".qtyprod" ).append("<option value='" + i +"'>" + i +"</option>");
        }
      });
  }
    if (document.getElementById('container_travels2')) {
      $.get("module/shop/controller/controller_shop.php?&op=data_shop2", function(data,status) {
        var json = JSON.parse(data);
        $.each(json, function(index, list) {
          // console.log(list.id);
              var ElementDiv = document.createElement('div');
              ElementDiv.id = "list_travels";
              ElementDiv.innerHTML = "<div id='prueba' class='block-4 text-center border'>"
                                      + "<figure class='block-4-image'>"
                                      + "<a class='details' id="+ list.id + "><img class='img-fluid' src=view/assets/images/" + list.img + "></a>"
                                      + "</figure>" 
                                      + "<div class='block-4-text p-4'>"
                                      + "<h3><a>" + list.destination + "</a></h3>"
                                      + "<p class='mb-0'>" + list.country + "</p>"
                                      + "<p class='icon icon-shopping_cart text-primary font-weight-bold'>" + list.price +"€</p>"
                                      + "<span id='" + list.id + "' class='InsertCarr icon icon-shopping_cart'></span>"
                                      + "</div>";
                                      + "</div>";
              document.getElementById("list_travels").appendChild(ElementDiv);
        });
        for(i=1;i<=20;i++){
          $( ".qtyprod" ).append("<option value='" + i +"'>" + i +"</option>");
        }
      });
    }
    
    
    if (document.getElementById('details')) {
      $.get("module/shop/controller/controller_shop.php?&op=data_shop_details", function(data,status) {
        var json = JSON.parse(data);
        // console.log(json);
        // var id = JSON.parse(data)
        var ElementDiv = document.createElement('div');
              ElementDiv.id = "details";
              ElementDiv.innerHTML = "<div class='col-md-6'>"
                                    + "<img src=view/assets/images/" + json.img + " alt='Image' class='img-fluid'>"
                                    + "</div>"
                                    + "<div class='col-md-6'>"
                                    + "<h2 class='text-black'>"+ json.destination +"</h2>"
                                    + "<p>" + json.country + "</p>"
                                    + "<p class='mb-4'>Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p>"
                                    + "<p><strong class='icon icon-shopping_cart text-primary h4'>" + json.price + "€</strong></p>"
                                    + "<span id='" + list.id + "' class='InsertCarr icon icon-shopping_cart'></span>"
                                    + "</div>"
              document.getElementById("details").appendChild(ElementDiv);
            });
  }


  $('#buscar').click(function () {
      var origin = $('#origin').val();
      var rating = $('#rating').val();

      $.ajax({
        type: "GET",
        // https://test.api.amadeus.com/v2/shopping/hotel-offers?cityCode=LON&ratings=4
        // url: 'https://test.api.amadeus.com/v2/shopping/hotel-offers?cityCode=' + origin + '&oneWay=false&nonStop=false&maxPrice=' + price + '&currency=' + currency,
        url: 'https://test.api.amadeus.com/v2/shopping/hotel-offers?cityCode=' + origin + '&ratings=' + rating + '',
        crossDomain: true,
        contentType: "application/json",
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer w28bpZWjTMtmciq4pFm73LL2rvo5');
        },
        success: function(data){
          // console.log(data["data"]["1"]["hotel"]["media"]["0"]["uri"]);
              var html = [];
              html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3"><tbody>');
                $.each(data['data'], function(index, list) {
                  // console.log(list.hotel.name);
                  html.push("<h3>" + list.hotel.name + "</h3>"
                          + "<p>Estrellas: " + list.hotel.rating + "</p>"
                          + "<p>Contacto:</p>"
                          + "<p>Telefono: " + list.hotel.contact.phone + "</p>"
                          + "<p>Fax: " + list.hotel.contact.fax + "</p>"
                          + "</br>");
                      // html.push('<tr><td>' + '<p>' + list.hotel.name + '"</p> '+' border="0">' + '</td></tr>');
              });
              html.push('</tbody></table>');
              document.getElementById("results").innerHTML = html.join("");
        },
        error: function(){
            alert("Errorebay");
        }
    });

  });



  $(document).on('click','.details',function () {
    var id = this.getAttribute('id');
    // console.log(data);
    window.location.href = 'index.php?page=controller_shop&op=details&id=' + id;
    // console.log(id);
  });
});