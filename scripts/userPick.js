$(document).ready(function(){
    if ($('.visit tbody').is(':parent'))
        $('p').css("display", "none");
    $('.visit tbody tr').click(function(){ 
        var id = document.getElementById("person");
        id.setAttribute("value", $(this).attr('id'));
        var picker = document.getElementById("picker").setAttribute('style', 'display: none;');
        var main = document.getElementById("main").setAttribute('style', 'display: block;');
    });
});