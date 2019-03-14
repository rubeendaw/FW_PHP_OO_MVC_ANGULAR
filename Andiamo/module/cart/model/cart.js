var cart = [];
$(function () {
    if (localStorage.cart){
        cart = JSON.parse(localStorage.cart);
        showCart();
        showCart2();
    }
});

function showCart() {
    if (cart.length == 0) {
        console.log(cart);
        $("#cartBody").css("visibility", "hidden");
        return;
    }

    $("#cartBody").css("visibility", "visible");
    $("#cartBody").empty();
    for (var i in cart) {
        var item = cart[i];
        console.log(item);
        var row = "<tr>"
                    +"<td class='product-name'>"
                      +"<h2 id='prodname' class='h5 text-black'>" + item.Product + "</h2>"
                    +"</td>"
                    +"<td id='price'>" + item.Price + "</td>"
                    +"<td style='width: 162px;'>"
                    +"<div class='qty input-group mb-3' style='max-width: 120px;'>"
                      +"<div class='input-group-prepend'>"
                        +"<button class='btn btn-outline-primary js-btn-minus' type='button'>&minus;</button>"
                      +"</div>"
                      +"<input id='qty' type='text' class='qty form-control text-center' value='" + item.Qty + "' placeholder='' aria-label='Example text with button addon' aria-describedby='button-addon1' readonly='readonly'>"
                      +"<div class='input-group-append'>"
                        +"<button class='btn btn-outline-primary js-btn-plus' type='button'>&plus;</button>"
                      +"</div>"
                    +"</div>"
                    +"</td>"
                    +"<td>" + item.Qty * item.Price + "</td>"
                    +"<td onclick='deleteItem(" + i + ")' class='btn btn-primary btn-sm'>X</td>"
                  +"</tr>";
    $("#cartBody").append(row);
    }
}
function showCart2() {
    $("#total").css("visibility", "visible");
    $("#total").empty();
    var sumatotal = 0;
    for (var i in cart) {
      var item = cart[i];
      var suma = parseFloat(item.Price);
      var sumatotal = parseFloat(sumatotal) + parseFloat(suma);
    }
      console.log(item);
        var row = "<div class='row mb-5'>"
                    +"<div class='col-md-6'>"
                        +"<span class='text-black'>Total</span>"
                    +"</div>"
                    +"<div class='col-md-6 text-right'>"
                        +"<strong class='text-black'>" + sumatotal + "</strong>"
                    +"</div>"
                  +"</div>";
    $("#total").append(row);
  }

$(document).on('click','.InsertCarr',function () {
    var id = $(this).attr("id");
    console.log(id);
    $.get("module/cart/controller/controller_cart.php?op=addcart&id=" + id, function (data, status) {
      datos = JSON.parse(data);
      // console.log(datos['destination']);
    var name = datos['destination'];
    var price = datos['price'];
    var qty =  1;
    

    // update qty
    for (var i in cart) {
        if(cart[i].Product == name){
            cart[i].Qty = qty;
            showCart();
            showCart2();
            saveCart();
            return;
        }
    }
    // create
    var item = { Product: name,  Price: price, Qty: qty, ID: id }; 
    cart.push(item);
    saveCart();
    showCart();
    showCart2();
    });
});

function saveCart() {
    if ( window.localStorage){
        localStorage.cart = JSON.stringify(cart);
    }
}

function deleteItem(index){
    cart.splice(index,1); // delete item
    showCart();
    showCart2();
    saveCart();
}

function InsertCompra() {
  var datos = localStorage.cart
  console.log(datos);
    $.ajax({
           type: "GET",
           url: "module/cart/controller/controller_cart.php?op=checkout&data=" + datos,
           data: {data : datos},
           success: function(data, status) {
             var stringdata = JSON.parse(data);
             console.log(stringdata);
             if (stringdata == "correcto"){
              //  alert("Compra realizada correctamente");
               window.location.href="index.php?page=controller_cart&op=fin_compra";
               localStorage.clear();
             }else if (stringdata == "error_sesion"){
              alert("Debes iniciar sesión");
            }else{
                alert("Error interno, pruebe mas tarde");
            };
           }
         });
      }