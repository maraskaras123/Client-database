<?PHP
require("include/membersite_config.php");
require("include/DBInteg.php");
require("include/DB.php");
if(!$fgmembersite->CheckLogin()) {
    $fgmembersite->RedirectToURL("index.php");
    exit;
}
?>
<DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style/Form.css" />
		<title>visit info</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <form action="include/ClientInteg.php" method="post">
            <ul class="form-style-1" style="max-width: 400px;">
                <li>
                    <label>Full Name</label>
                    <input type="text" name="name" class="field-divided" placeholder="Name" />&nbsp;<input type="text" name="surname" class="field-divided" placeholder="Surname" />
                </li>
                <li>
                    <label>Birth date</label>
                    <input type="number" name="date" class="field-long" placeholder="Year" />
                </li>
                <li>
                    <label>Sex</label>
                    <select name="sex" class="field-select">
                        <option value="woman">woman</option>
                        <option value="man">man</option>
                    </select>
                </li>
                <li>
                    <label>Number</label>
                    <select name="country" style='width: 20%;'>
                        <option value="+44">+44</option>
                        <option value="+370">+370</option>
                    </select>&nbsp;<input type="number" name="number" placeholder="Number" style="width: 78.5%;" />
                </li>
                <li>
                    <label>Remarks</label>
                    <textarea name="remarks" id="remarks" class="field-long field-textarea" placeholder="Optional" ></textarea>
                </li>
                <li>
                    <input type="submit" value="Submit" name="submit" />
                </li>
            </ul>
        </form>
    </body>
</html>