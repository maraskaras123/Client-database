<?PHP
require_once("./include/membersite_config.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>
<DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" type="text/css" href="style/visit.css" />
		<title>visit info</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body style="font-size: 30px; font-weight: bold; text-align: center;">
        <div class="form" style="margin-bottom: 10px; padding: 2px;">
            Rasa Maroziene
            <br>
            2016-12-28
            <br>
            type: cba
            <br>
            amount: 1.5
            <br>
            price: €45
        </div>
        Before photos:
        <br>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <br>
        After photos:
        <br>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
    </body>
</html>