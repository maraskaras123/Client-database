 $(document).ready(function(){
    $("img").click(function(){
        if($("#overlay").css("display") == "none")
        {
            $("#overlay").css("display", "block");
            $("#overlay").css("z-index", "20");
            var img = $(this).attr("src");
            $("#overlayimg").attr("src", img);
        }
        else
		{
            $("#overlay").css("display", "none");
            $("#overlay").css("z-index", "0");
            $("#overlayimg").attr("src", "");
		}
    });
});