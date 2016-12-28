<?PHP
require_once("include/membersite_config.php");
require_once("include/DBInteg.php");
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
        <link rel="stylesheet" type="text/css" href="style/Form.css" />
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<title>visit info</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body style="font-size: 30px; font-weight: bold; text-align: center;">
        <a href='main.php'><button style="background: #3DBBFF; width: 700px; padding: 2px; height: 50px; font-size: 20px;"><strong>Back to visits</strong></button></a>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 20px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
            <?php
                $visit = getVisitByID($db, $visitID_query, $_GET['id']);
                $client = getClientByID($db, $clientID_query, $visit['person_id']);
                echo ("{$client['name']} {$client['surname']} {$client['birth']}<br>");
                echo ("{$visit['date']}<br>");
                echo ("Type & amount: {$visit['type']} {$visit['amount']}<br>");
                /*$price = $visit['price'];
                if (strpos($price, '€') !== false) {*/
                    $price = str_replace("€", "&euro;", $visit['price']);
                /*}*/
                echo ("Price: {$price}");
            ?>
        </div>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 10px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
        Before photos:
        <br>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        </div>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 10px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
        After photos:
        <br>
        <a download="1_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="2_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="3_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="4_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="5_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="6_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="7_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="8_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="9_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        <a download="10_0.jpg" href="photos/8_0.jpg" title="ImageName"><img alt="8_0" src="photos/8_0.jpg"/></a>
        </div>
    </body>
</html>