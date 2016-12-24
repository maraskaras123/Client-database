$(document).ready(function(){
    var link = "http://belekas.esy.es/view.php?id=";
    $('.visit tbody tr').click(function(){ 
        var fullLink = link + $(this).attr('id');
        window.location = fullLink;
    })
});