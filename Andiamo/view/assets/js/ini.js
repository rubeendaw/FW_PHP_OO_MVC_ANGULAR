$(document).ready(function(){
    // console.log("holita");						
    setInterval(function(){ 
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?&op=time',
            success :  function(response){
                console.log(response);						
                if(response=="inactivo"){
                    alert("Se ha cerrado la cuenta por inactividad")
                    setTimeout('window.location.href = "index.php?page=controller_login&op=logout";',1000);
                }
            }
        });
    }, 300000);

    setInterval(function(){ 
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?op=regenid',
            success: function(response){
            }
        });
     }, 100000);

    if (document.getElementById('avatar')){
        $.ajax({
            type : 'POST',
            url  : 'module/login/controller/controller_login.php?&op=gravatar',
            success: function(data){		
                var json = JSON.parse(data);
                var Elementli = document.createElement('li');
                Elementli.li = "avatar";
                Elementli.innerHTML = "<img title='" + json['username'] + "' id='avatar_img' src='" + json['avatar'] + "'/>"
                document.getElementById("avatar").appendChild(Elementli);
            }
        });
    }

    $(document).on('click','.sumlike',function () {
        var id = this.getAttribute('id');
        console.log(id);
        $.ajax({
            type : 'GET',
            url  : 'module/like/controller/controller_like.php?&op=ins_like&id=' + id,
            success: function(data){		
                var json = JSON.parse(data);
                console.log(json);
                // var Elementli = document.createElement('li');
                // Elementli.li = "avatar";
                // Elementli.innerHTML = "<img title='" + json['username'] + "' id='avatar_img' src='" + json['avatar'] + "'/>"
                // document.getElementById("avatar").appendChild(Elementli);
            }
        });
        // console.log(data);
        // window.location.href = 'index.php?page=controller_like&op=ins_like&id=' + id;
        // console.log(id);
      });

      $('#date').daterangepicker({
        "maxSpan": {
            "days": 7
        },
        "startDate": "03/07/2019",
        "endDate": "03/01/2019",
        "minDate": "03/01/2019",
        "opens": "center"
    }, function(start, end, label) {
      console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    });
});