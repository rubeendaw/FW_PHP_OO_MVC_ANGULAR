window.onload = function(){
    changelanguage();
};
$(document).ready(function () {
    $("#lang").click(function () {
        $.ajax({
            type: "POST",
            //data: $("#lang").serialize(),
            success: function(data) {
            var lang = document.getElementById("lang").value;
            console.log(lang);
         }
        });
    });
});
function changelanguage(lang){
    
}