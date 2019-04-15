$(document).ready(function () {
    $.get("module/home/controller/controller_home.php?op=dropdown_types", function (data, status) {
        var json = JSON.parse(data);
        var $cboTypes = $("#cboTypes");
        $cboTypes.empty();
        $cboTypes.append("<option>Tipo</option>");
        $.each(json, function(index, types) {
            $cboTypes.append("<option>" + types.type + "</option>");
        });
    });
    $("#cboTypes").change(function() {
        var uni = $(this).val(); 
        //console.log(uni);
        $.get("module/home/controller/controller_home.php?op=dropdown_country&uni=" + uni, function (data, status) {
            var json = JSON.parse(data);
            var $cboCountry = $("#cboCountry");
            $cboCountry.empty();
            $cboCountry.append("<option>Country</option>");
            $.each(json, function(index, countries) {
                $cboCountry.append("<option>" + countries.country + "</option>");
            });
        });
        $('#service').keyup(function(){
            var country = document.getElementById('cboCountry').value;
            //console.log(tipo); 
            var service = $(this).val();    
            var dataString = {service: service};
            var types = uni;
            // var country = service; 
            $.ajax({
                type: "POST",
                url: "module/home/controller/controller_home.php?op=autocomplete&types=" + types + '&country=' + country,
                data: dataString,
                success: function(data) {
                    $('#suggestions').fadeIn(1000).html(data);
                    $('.suggest-element').on('click', function(){
                        var id = $(this).attr('id');
                        $('#service').val($('#'+id).attr('data'));
                        $('#suggestions').fadeOut(1000);
                        //window.location.href = 'index.php?page=controller_shop&op=redi';
                        var destination = document.getElementById('service').value;
                        //console.log(city);
                        window.location.href = 'index.php?page=controller_shop&op=redirect&uni=' + uni + '&country=' + country + '&destination=' + destination;
                    });
                }
            });
        });
    });
});