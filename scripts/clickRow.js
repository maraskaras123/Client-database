$(document).ready(function(){
    var link = "http://belekas.esy.es/visit.php?id=";
    $('.visit tbody tr').click(function(){ 
        var fullLink = link + $(this).attr('id');
        window.location = fullLink;
    });
});