
$(document).ready(function(){
    $('.visit tbody tr').click(function(){ 
        var id = document.getElementById("person");
        id.setAttribute("value", $(this).attr('id'));
        var picker = document.getElementById("picker");
        var main = document.getElementById("main");
        picker.style = "display: none;";
        main.style = "display: block;";
    })
});