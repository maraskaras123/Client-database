/*$(document).ready(function(){
    $('p').on('click','img',function(){
        if (document.getElementById("overlay").getAttribute('style') == 'display: block; width: 100%; height: 100%; position: relative;'){
            var picker = document.getElementById("overlay").setAttribute('style', 'display: none; width: 100%; height: 100%; position: relative;');  
        }
        else {
            var picker = document.getElementById("overlay").setAttribute('style', 'display: block; width: 100%; height: 100%; position: relative;');
            var img = document.getElementById("overlayimg").setAttribute('src', $(this).attr('src'));
        }
    });
});*/
 $(document).ready(function(){
                $("img").click(function(){
                    if($("#overlay").css("display") == "none")
                    {
                        $("#overlay").css("display", "block");
                        $("#overlay").css("z-index", "20");
                        var img = $(this).attr("src");
                        $("#overlayimg").attr("src", img);
                        $("#overlayimg").css("height","80%");
                    }
                    else
					{
                        $("#overlay").css("display", "none");
                        $("#overlay").css("z-index", "0");
                        $("#overlayimg").attr("src", "");
					}
                });
            });