$(document).ready(function(){
    var link = "http://velniai.esy.es/visit.php?id=";
    $('.visit tbody tr').click(function(){ 
        var fullLink = link + $(this).attr('id');
        window.location = fullLink;
    });
});