<?PHP
require_once("include/membersite_config.php");
require_once("include/DBInteg.php");
require_once("include/db.php");
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
        <script src="scripts/visit.js"></script>
    </head>
    <body style="font-size: 30px; font-weight: bold; text-align: center;">
        <div id="overlay" style="width:100%;z-index: 0; height: 100%;position:fixed; background-color: black; display: none;">
            <img id='overlayimg' src='' alt='unable to get photo'></img>
        </div>
        <a href='main.php'><button style="background: #3DBBFF; width: 700px; padding: 2px; height: 50px; font-size: 20px; z-index: 2;"><strong>Back to visits</strong></button></a>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 20px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
            <p>
                <?php
                    $visit = getVisitByID($db, $visitID_query, $_GET['id']);
                    $client = getClientByID($db, $clientID_query, $visit['person_id']);
                    echo ("{$client['name']} {$client['surname']} {$client['birth']}<br>");
                    echo ("{$client['number']}<br>");
                    echo ("{$visit['date']}<br>");
                    echo ("Type & amount: {$visit['type']} {$visit['amount']}<br>");
                    echo ("Price: {$visit['price']} {$visit['currency']}");
                ?>
            </p>
        </div>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 10px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
            <p>
                Before photos:
                <?
                    if($visit['before_count'] == 0){
                        echo ('<form action="include/UpdateInteg.php" method="post" enctype="multipart/form-data">');
                        echo ("<input type='hidden' name='visit' id='visit' value='{$visit['visit_id']}' />");
                        echo ("<input type='hidden' name='type' id='type' value='before' />");
                        echo ('<input type="file" name="before[]" multiple="multiple" style="background-color: #bfbfbf; width: 500px;" accept="image/*">');
                        echo ('<input type="submit" value="Submit" name="submit" style="background-color: #bfbfbf; font-weight: bold; width: 500px;" />');
                        echo ('</form>');
                    }
                    else {
                        echo ("<br>");
                        for($i = 0; $i < $visit['before_count']; $i++){
                            //echo ("<a download='{$visit['visit_id']}_before_{$i}.jpg' href='photos/{$visit['visit_id']}_before_{$i}.jpg' title='ImageName'><img alt='{$visit['visit_id']}_before_{$i}.jpg' src='photos/{$visit['visit_id']}_before_{$i}.jpg'/></a>");
                            echo ("<img alt='{$visit['visit_id']}_before_{$i}.jpg' src='photos/{$visit['visit_id']}_before_{$i}.jpg'/>");
                        }
                    }
                ?>
            </p>
        </div>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 10px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
            <p>
                After photos:
                <?
                    if($visit['after_count'] == 0){
                        echo ('<form action="include/UpdateInteg.php" method="post" enctype="multipart/form-data">');
                        echo ("<input type='hidden' name='visit' id='visit' value='{$visit['visit_id']}' />");
                        echo ("<input type='hidden' name='type' id='type' value='after' />");
                        echo ('<input type="file" name="after[]" multiple="multiple" style="background-color: #bfbfbf; width: 500px;" accept="image/*">');
                        echo ('<input type="submit" value="Submit" name="submit" style="background-color: #bfbfbf; font-weight: bold; width: 500px;" />');
                        echo ('</form>');
                    }
                    else {
                        echo ("<br>");
                        for($i = 0; $i < $visit['after_count']; $i++){
                            //echo ("<a download='{$visit['visit_id']}_after_{$i}.jpg' href='photos/{$visit['visit_id']}_after_{$i}.jpg' title='ImageName'><img alt='{$visit['visit_id']}_after_{$i}.jpg' src='photos/{$visit['visit_id']}_after_{$i}.jpg'/></a>");
                            echo ("<img alt='{$visit['visit_id']}_after_{$i}.jpg' src='photos/{$visit['visit_id']}_after_{$i}.jpg'/>");
                        }
                    }
                ?>
            </p>
        </div>
        <?
            if (!empty($client['remarks'])){
        ?>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 10px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
            <p>
                <?echo ("client remarks:<br><span>{$client['remarks']}</span>");?>
            </p>
        </div>
        <?} if (!empty($visit['remarks'])){ ?>
        <div class="form" style="width: 700px; max-width: 700px; margin-top: 10px; margin-bottom: 0px; padding: 2px; background: #ffffb3;">
            <p>
                <?echo ("visit remarks:<br><span>{$visit['remarks']}</span>");?>
            </p>
        </div>
        <? } ?>
    </body>
</html>