$(document).ready(function(){
    var link = "http://marozija.puslapiai.lt/visit.php?id=";
    $('.visit tbody tr').click(function(){ 
        var fullLink = link + $(this).attr('id');
        window.location = fullLink;
    });
});